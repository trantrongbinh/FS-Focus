<template>
    <div class="card-footer card-comments">
        <div :class="contentWrapperClass">
            <div :class="nullClass" v-if="comments.length == 0">
                {{ nullText }}
            </div>
            <div class="card-comment" v-for="(comment, index) in comments">
                <!-- User image -->
                <div class="post-footer d-flex align-items-center">
                    <a :href="'/user/' + comment.username" class="author d-flex align-items-center flex-wrap">
                        <div style="margin-right: 10px;">
                            <img :src="comment.avatar" alt="avatar" class="img-fluid img-circle img-sm">
                        </div>
                        <div class="title"><span>{{ comment.username }}</span></div>
                    </a>
                    <div class="date"><i class="far fa-clock"></i> {{ comment.created_at }}</div>
                    <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                </div>
                <span class="float-right operate">
                    <a href="javascript:void(0)" class="float-right btn-tool" data-toggle="dropdown" v-if="username == comment.username"><i class="fas fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:;" @click="reply(comment.username)">Edit</a>
                        <a class="dropdown-item" href="javascript:;" @click="commentDelete(index, comment.id)">Delete</a>
                    </div>
                </span>
                <span class="float-right btn-tool" v-if="username != comment.username" style="font-size: 12px;">
                    <vote-button :item="comment"></vote-button> &nbsp|&nbsp&nbsp
                    <a href="javascript:;" @click="reply(comment.username)"><i class="fas fa-share"></i></a>
                </span>
                <!-- /.username -->
                <div class="comment-body markdown" v-html="comment.content_html"></div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
            <div class="text-center" v-if="commentNumber > 2" style="padding: 10px; font-size: 12px;">
                <a v-if="!isHidden" href="javascript:void(0)" @click="loadMore(next_page_url)">Load More ...</a>
            </div>
            <!-- form comment   -->
            <form class="submit-comment" style="margin-top: 30px;" @submit.prevent="comment" v-if="canComment">
                <a :href="'/user/' + username">
                    <img class="img-fluid img-circle img-sm" :src="userAvatar" alt="Alt Text">
                </a>
                <div class="img-push">
                    <bubble-quill-editor id="content" :strategies="strategies" v-model="content" :table-type="commentableType" :element-id="commentableId" @contentUpdated="content = $event" :test="content"></bubble-quill-editor>
                    <button type="submit" :disabled="isSubmiting ? true : false" class="btn btn-primary btn-sm send">Send</button>
                </div>
            </form>
            <!-- /.card-comment -->
        </div>
    </div>
    <!-- /.card-footer -->
</template>
<script>
import { default as toastr } from 'toastr/build/toastr.min.js'
import toastrConfig from 'config/toastr'
import emojione from 'emojione'
import FineUploader from 'fine-uploader/lib/traditional'
import { stack_error } from 'config/helper'
import VoteButton from 'home/components/VoteButton'
import TextComplete from 'v-textcomplete'
import BubbleQuillEditor from 'home/components/BubbleQuillEditor'
import { default as githubEmoji } from 'vendor/github_emoji'

export default {
    components: { VoteButton, TextComplete, BubbleQuillEditor },
    props: {
        contentWrapperClass: {
            type: String,
            default () {
                return 'col-md-12'
            }
        },
        title: {
            type: String,
            default () {
                return ''
            }
        },
        username: {
            type: String,
            default () {
                return ''
            }
        },
        userAvatar: {
            type: String,
            default () {
                return ''
            }
        },
        commentableType: {
            type: String,
            default () {
                return 'discussions'
            }
        },
        commentableId: {
            type: String,
            default () {
                return 0
            }
        },
        commentNumber: {
            type: String,
            default () {
                return 0
            }
        },
        canComment: {
            type: Boolean,
            default () {
                return false
            }
        },
        nullText: {
            type: String,
            default () {
                return 'Nothing...'
            }
        },
        nullClass: {
            type: String,
            default () {
                return 'none'
            }
        }
    },
    data() {
        return {
            comments: [],
            //content: '',
            isSubmiting: false,
            next_page_url: '',
            isHidden: false,
            strategies: [{
                match: /(^|\s):([a-z0-9+\-\_]*)$/,
                search(term, callback) {
                    callback(Object.keys(githubEmoji).filter(function(name) {
                        return name.startsWith(term);
                    }).slice(0, 10))
                },
                template(name) {
                    console.log(githubEmoji[name]);
                    return '<img width="17" src="' + githubEmoji[name] + '"></img> ' + name;
                },
                replace(value) {
                    return '$1:' + value + ': '
                },
            }],
            content: [{
                
            }]
        }
    },
    mounted() {
        var url = 'commentable/' + this.commentableId + '/comment'
        this.$http.get(url, {
            params: {
                commentable_type: this.commentableType
            }
        }).then((response) => {
            response.data.data.forEach((data) => {
                data.content_html = this.parse(data.content_raw)

                return data
            })
            this.comments = response.data.data
            this.next_page_url = response.data.meta.pagination.links.next + '&commentable_type=' + this.commentableType
        }).catch(error => {
            stack_error(response)
        })
    },
    methods: {
        loadMore(next_page_url) {
            this.$http.get(next_page_url)
                .then((response) => {
                    response.data.data.forEach((data) => {
                        data.content_html = this.parse(data.content_raw)
                        return data
                    })
                    this.comments.push(...response.data.data)
                    this.next_page_url = response.data.meta.pagination.links.next + '&commentable_type=' + this.commentableType

                    if (response.data.meta.pagination.current_page === response.data.meta.pagination.total_pages) {
                        this.isHidden = true
                    }
                })

        },
        comment() {
            const data = {
                content: this.content,
                commentable_id: this.commentableId,
                commentable_type: this.commentableType
            }

            console.log(data);

            this.isSubmiting = true
            this.$http.post('comments', data)
                .then((response) => {
                    let comment = null

                    comment = response.data.data
                    comment.content_html = this.parse(comment.content_raw)

                    this.comments.push(comment)
                    this.content = ''
                    this.isSubmiting = false

                    toastr.success('You publish the comment success!')
                }).catch(({ response }) => {
                    this.isSubmiting = false
                    stack_error(response)
                })
        },
        reply(name) {
            $('#content').focus()
            this.content = '@' + name + ' '
        },
        commentDelete(index, id) {
            this.$http.delete('comments/' + id)
                .then((response) => {
                    this.comments.splice(index, 1)
                    toastr.success('You delete your comment success!')
                })
        },
        parse(html) {
            marked.setOptions({
                highlight: (code) => {
                    return hljs.highlightAuto(code).value
                }
            })

            return emojione.toImage(marked(html))
        },
    }
}

</script>
<style lang="scss" scoped>
#content {
    line-height: 30px;
    margin-left: 50px;
    max-width: 530px;
    margin-top: -40px;
    border: 1px solid #bfcbd9;
    border-radius: 4px;
    background-color: #fff;
    background-image: none;

    &:hover {
        border-color: #8391a5;
    }
}

.img-push {
    position: relative;
}

.send {
    margin-right: 0px;
    top: 0;
    position: absolute;
    right: 0;
}

@media only screen and (max-width: 750px) {
    #content {
        width: 75%;
    }
}

.card-comments {
    background: #fbfbfb;
    border-top: none !important;

    .card-comment {
        padding: 8px 0;
        border-bottom: 1px solid #eee;

        &:last-child {
            border-bottom: none !important;
        }

        &::after {
            display: block;
            clear: both;
            content: "";
        }

        &:last-of-type {
            border-bottom: 0;
        }

        &:first-of-type {
            padding-top: 0;
        }
    }

    .comment-text {
        margin-left: 40px;
        color: #555;
    }

    .username {
        color: #444;
        display: block;
        font-weight: 600;
    }

    .text-muted {
        font-weight: 400;
        font-size: 14px;
    }
}

</style>
