<template>
    <div class="card-footer card-comments">
        <div :class="contentWrapperClass">
            <div :class="nullClass" v-if="comments.length == 0">
                {{ nullText }}
            </div>
            <div class="card-comment" v-for="(comment, index) in comments" v-else>
                <!-- User image -->
                <div class="post-footer d-flex align-items-center">
                    <a :href="'/user/' + comment.username" class="author d-flex align-items-center flex-wrap">
                        <div class="img-avatar">
                            <img :src="comment.avatar" alt="avatar" class="img-fluid img-circle img-sm">
                        </div>
                        <div class="title"><span>{{ comment.username }}</span></div>
                    </a>
                    <div class="date"><i class="far fa-clock"></i> {{ comment.created_at }}</div>
                </div>
                <div class="vote-cmt">
                    <vote></vote>
                </div>
               <!--  <span class="float-right btn-tool font-size_12" v-if="username != comment.username">
                    <vote-button :item="comment"></vote-button> &nbsp|&nbsp&nbsp
                    <a href="javascript:;" @click="reply(comment.username)"><i class="fas fa-share"></i></a>
                </span> -->
                <span class="float-right operate">
                    <a href="javascript:void(0)" class="float-right btn-tool" data-toggle="dropdown" v-if="username == comment.username"><i class="fas fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:;" @click="edit(index, comment.id)">Edit</a>
                        <a class="dropdown-item" href="javascript:;" @click="commentDelete(index, comment.id)">Delete</a>
                    </div>
                </span>
                <!-- /.username -->
                <div class="comment-body markdown" :class="comment.is_down_voted ? 'downvoted' : ''" v-html="comment.content_html"></div>
                <!-- /.comment-text -->
                <div class="float-right" v-if="username !== comment.username">
                    <a href="javascript:;" @click="reply(comment.username)"><i class="fas fa-share"> Reply</i></a>
                </div>
            </div>
            <!-- /.card-comment -->
            <div class="text-center font-size_12 comment-number" v-if="commentNumber > 2">
                <a v-if="!isHidden" href="javascript:void(0)" @click="loadMore(next_page_url)">Load More ...</a>
            </div>
            <!-- form comment   -->
            <form class="submit-comment" @submit.prevent="comment" v-if="canComment">
                <a :href="'/user/' + username">
                    <img class="img-fluid img-circle img-sm" :src="userAvatar" alt="Alt Text">
                </a>
                <div class="img-push">
                    <bubble-quill-editor id="content" :table-type="commentableType" :element-id="commentableId" strategy="comment" :status="isSubmiting" @contentUpdated="getContent" :reply.sync="author"></bubble-quill-editor>
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
import { stack_error } from 'config/helper'
import VoteButton from 'home/components/VoteButton'
import BubbleQuillEditor from 'home/components/BubbleQuillEditor'

export default {
    components: { VoteButton, BubbleQuillEditor },
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
                return 'articles'
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
            content: '',
            isSubmiting: false,
            next_page_url: '',
            isHidden: false,
            author: '',
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
                data.content_html = this.parse(data.content_html)

                return data
            })
            this.comments = response.data.data
            this.next_page_url = response.data.meta.pagination.links.next + '&commentable_type=' + this.commentableType
        })

        toastr.options = toastrConfig
    },

    methods: {
        getContent(value) {
            this.content = value;
        },

        loadMore(next_page_url) {
            this.$http.get(next_page_url)
                .then((response) => {
                    response.data.data.forEach((data) => {
                        data.content_html = this.parse(data.content_html)
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
            if (this.content.trim().length !== 0) {
                const data = {
                    content: this.content,
                    commentable_id: this.commentableId,
                    commentable_type: this.commentableType
                }
                this.isSubmiting = true

                this.$http.post('comments', data)
                    .then((response) => {
                        let comment = null

                        comment = response.data.data
                        comment.content_html = this.parse(comment.content_html)

                        this.comments.push(comment)
                        this.content = ''
                        this.isSubmiting = false

                        toastr.success('You publish the comment success!')
                    }).catch(({ response }) => {
                        this.isSubmiting = false
                        stack_error(response)
                    })
            } else {
                console.log('nhap content baby!!!')
            }
        },

        reply(name) {
            this.author = name
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

            return marked(html)
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

    .img-avatar {
        margin-right: 10px;
    }

    .title {
        font-size: 13px !important;
    }

    .comment-number {
        padding: 10px;
    }

    .submit-comment {
        margin-top: 30px;
    }

    .date::after {
        display: none;
    }

    .vote-cmt {
        margin-left: 5px;
    }
}

</style>
