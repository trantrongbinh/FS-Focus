<template>
    <a href="javascript:;" @click="bookMark(articleId)">
        <i :class="tmpBookmark.is_hasBookmarked ? 'fas fa-bookmark' : 'far fa-bookmark'"></i>
    </a>
</template>
<script>
    export default {
        props: {
            articleId: {
                type: String,
                default () {
                    return 0
                }
            },
            api: {
                type: String,
                default: 'article'
            },
            bookmark: {
                type: String,
                default: '{}'
            }
        },
        
        data() {
            return {
                tmpBookmark: []
            }
        },

        mounted() {
            this.tmpBookmark = JSON.parse(this.bookmark);
        },

        methods: {
            bookMark(id) {
                this.toggleBookmark(id)
            },

            toggleBookmark(id) {
                let url = this.api + '/bookmark'
                let data = {
                    'id' : id,
                    'is_hasBookmarked' : this.tmpBookmark.is_hasBookmarked
                }

                this.$http.post(url, data)
                    .then(() => {
                        this.tmpBookmark.is_hasBookmarked = !this.tmpBookmark.is_hasBookmarked
                    }).catch((response) => {
                        if (response.status == 401) {
                            window.location = '/login';
                        }
                    })
            },
        }
    }
</script>
