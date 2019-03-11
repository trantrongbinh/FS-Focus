<template>
    <div class="container">
        <div class="row comment">
            <div class="col-md-12">
                <h5>{{ title }}</h5>
            </div>
            <div :class="contentWrapperClass">
                <div :class="nullClass" v-if="comments.length == 0">
                    {{ nullText }}
                </div>
                <div class="media" v-for="(comment, index) in comments" v-else>
                    <div class="media-body box-body">
                        <div class="heading">
                            <a class="media-left" :href="'/user/' + comment.username">
                                <img :src="comment.avatar" class="img-fluid img-circle avatar">
                                {{ comment.username }}
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-clock"></i>
                            {{ comment.created_at }}
                            <span class="float-right operate" style="font-size: 12px;">
                                <vote-button v-if="username != comment.username" :item="comment"></vote-button>
                                <a href="javascript:;" @click="commentDelete(index, comment.id)" v-if="username == comment.username"><i class="fas fa-trash-alt"></i>
                                </a> &nbsp|&nbsp&nbsp<a href="javascript:;" @click="reply(comment.username)"><i class="fas fa-share"></i></a>
                            </span>
                        </div><br>
                        <div class="comment-body markdown" :class="comment.is_down_voted ? 'downvoted' : ''" v-html="comment.content_html"></div>
                    </div>
                </div>
                <div class="text-center" v-if="commentNumber > 2" style="padding: 10px; font-size: 12px; margin-top: 10px;">
                    <a v-if="!isHidden" href="javascript:void(0)" @click="loadMore(next_page_url)">Load More ...</a>
                </div>
                <form class="form mt-4" style="margin-top: 30px;" @submit.prevent="comment" v-if="canComment">
                    <div class="form-group row">
                        <!--  <label class="col-sm-2 col-form-label own-avatar">
                            <a :href="'/user/' + username">
                                <img width="60" class="rounded-circle" :src="userAvatar"/>
                            </a>
                        </label> -->
                        <div class="col-sm-12">
                            <snow-quill-editor id="content" :table-type="commentableType" strategy="comment" :element-id="commentableId" :status="isSubmiting" @contentUpdated="getContent"></snow-quill-editor>
                        </div>
                    </div>
                    <div class="clear2"></div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" :disabled="isSubmiting ? true : false" class="btn btn-success">
                                {{ $t('form.submit_comment') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { default as toastr } from 'toastr/build/toastr.min.js'
import toastrConfig from 'config/toastr'
import { stack_error } from 'config/helper'
import VoteButton from 'home/components/VoteButton'
import SnowQuillEditor from 'home/components/SnowQuillEditor'

export default {
    components: { VoteButton, SnowQuillEditor },
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
        }
    },

    mounted() {
        var url = 'commentable/' + this.commentableId + '/comment'
        this.$http.get(url, {
            params: {
                commentable_type: this.commentableType
            }
        }).then((response) => {
            console.log(response);
            response.data.data.forEach((data) => {
                console.log(data.content_html);
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

            return marked(html)
        },
    }
}

</script>
