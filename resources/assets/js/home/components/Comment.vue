<template>
    <div class="cmt">
        <div class="comments">
        	<h5 class="cmt-title">{{ title }}</h5>
            <div class="comment-wrap" v-for="(comment, index) in comments" v-if="comments.length > 0">
                <div class="photo">
                    <div class="avatar" :style="{ backgroundImage: 'url(' + comment.avatar + ')' }"></div>
                    <div class="vote-cmt">
                        <vote></vote>
                    </div>
                </div>
                <div class="comment-block">
                    <div class="author-comment">
                        <a class="display-name" :href="'/user/' + comment.username">
                            {{ comment.username }}
                        </a>
                        <a class="btn btn-outline-info btn-sm btn-follow" title="Theo dõi Huskywannafly">Theo dõi</a>
                        <div class="comment-date">{{ comment.created_at }}</div>
                    </div>
                    <div class="ql-editor markdown comment-text" :class="comment.is_down_voted ? 'downvoted' : ''" v-html="comment.content_html">
                    </div>
                    <div class="bottom-comment">
                        <div class="comment-interactive">
                        </div>
                        <ul class="comment-actions">
                            <li class="complain" v-if="username == comment.username">
                            	<a href="javascript:;" @click="commentDelete(index, comment.id)">
                            		<i class="fas fa-trash-alt"> Xóa</i>
                            	</a>
                            </li>
                            <li class="reply" v-else>
                            	<a href="javascript:;" @click="reply(comment.username)">
                            		<i class="fas fa-share"> Trả lời</i>
                            	</a>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center font-size_14 mb__20" v-if="commentNumber > 2">
            	<a v-if="!isHidden" href="javascript:void(0)" @click="loadMore(next_page_url)">Load More ...</a>
            </div>
            <div class="comment-wrap">
                <div class="photo">
                    <a :href="'/user/' + username" class="avatar" :style="{ backgroundImage: 'url(' + userAvatar + ')' }"></a>
                </div>
                <div class="comment-block">
                    <form @submit.prevent="comment" v-if="canComment">
                    	<snow-quill-editor id="content" :table-type="commentableType" strategy="comment" :element-id="commentableId" :status="isSubmiting" @contentUpdated="getContent" :reply.sync="author"></snow-quill-editor>
                        <button type="submit" :disabled="isSubmiting ? true : false" class="btn btn-outline-info btn-sm float-right">
                            {{ $t('form.submit_comment') }}
                        </button>
                    </form>
                    <textarea cols="30" rows="3" :placeholder="title" v-else></textarea>
                </div>
            </div>
        </div>
        <div class="mb__100"></div>
        <div class="pb__150"></div>
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
                console.log('Please enter content!!!')
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
.cmt {
    padding: 10px;
    background-color: #fafafa;
    -webkit-font-smoothing: antialiased;

    textarea {
        outline: none;
        border: none;
        display: block;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
        font-size: 1rem;
        color: #000;
    }

    textarea::-webkit-input-placeholder {
        color: #999;
    }

    .comments {
        margin: 2.5rem auto 0;
        max-width: 60.75rem;
        padding: 0 1.25rem;

        .cmt-title {
        	margin-left: 60px;
    		padding-bottom: 35px;
        }

        .comment-wrap {
            margin-bottom: 1.25rem;
            display: table;
            width: 100%;
            min-height: 5.3125rem;

            .photo {
                padding-top: 0.625rem;
                display: table-cell;
                width: 4rem;

                .avatar {
                    height: 3rem;
                    width: 3rem;
                    border-radius: 50%;
                    background-size: contain;
                }

            }

            .comment-block {
                background: #fff;
                padding: 1.7rem;
                border: 1px solid rgba(0, 0, 0, .09);
                display: table-cell;
                vertical-align: top;
                border-radius: 0.1875rem;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04);
                color: #000;
                max-width: 870px;

                textarea {
                    width: 100%;
                    resize: none;
                }

                .comment-text {
                    font-size: 18px;
                    margin-bottom: 1.25rem;
                }

                .bottom-comment {
                    color: #999;
                    font-size: 0.875rem;
                }

                .comment-interactive {
                    float: left;
                }

                .comment-actions {
                    float: right;

                    li {
                        display: inline;
                        margin: -2px;
                        cursor: pointer;
                    }

                    li.complain {
                        padding-right: 0.75rem;
                    }

                    li.reply {
                        padding-left: 0.75rem;
                        padding-right: 0.125rem;
                    }

                    li:hover {
                        color: #0095ff;
                    }
                }

                .author-comment {
					padding-bottom: 20px;
					margin-top: -15px;

					.display-name {
						color: #03a87c;
						text-decoration: none;
						font-size: 16px;
						line-height: 1.4;
						cursor: pointer;
						text-rendering: auto;
					}

					.btn-follow {
						color: #4da9ea;
						padding: 0 5px 0 5px;
						margin-left: 20px;
						border-radius: 5px !important;

						&:hover {
							color: #fff;
						}
					}

					.comment-date {
						color: #999;
						font-size: 0.75rem;
					}
                }
            }
        }
    }

    .vote-cmt {
        margin-left: 16px;
        font-size: 16px;
    }
}

</style>
