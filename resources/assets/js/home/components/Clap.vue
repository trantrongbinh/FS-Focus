<template>
    <span class="vote-button">
        <a href="javascript:;" class="claps_button btn-tool" @click="upVote( articleId )">
            <i :class="vote.is_up_voted ? 'fas fa-thumbs-up text-success' : 'far fa-thumbs-up'">
                <span v-if="vote.vote_count > 0 && canVote" class="number">&nbsp {{ vote.vote_count }}</span>
                <span v-else class="number">&nbsp {{ voteCount }}</span>
            </i>
        </a>
        <br>
    </span>
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
            default: ''
        },
        voteCount: {
            type: String,
            default () {
                return 0
            }
        },
        canVote: {
            type: Boolean,
            default () {
                return false
            }
        }
    },
    data() {
        return {
            vote: []
        }
    },
    mounted() {
        if (this.canVote) {
            var url = this.api + '/' + this.articleId + '/vote'
            this.$http.get(url, { votetableType: 'articles' }).then((response) => {
                this.vote = response.data
            })
        }
    },
    methods: {
        upVote(id) {
            this.toggleVote(id, 'up')
        },
        downVote(id) {
            this.toggleVote(id, 'down')
        },
        toggleVote(id, type) {
            if (this.canVote) {
                let url = this.api + '/vote/' + type
                let upType = 'is_up_voted'
                let downType = 'is_down_voted'
                let checkType = type == 'up' ? downType : upType
                let votingType = type == 'up' ? upType : downType
                this.$http.post(url, { id: id })
                    .then(() => {
                        if (this.vote[checkType]) {
                            this.vote[upType] = !this.vote[upType]
                            this.vote[downType] = !this.vote[downType]
                            type == 'up' ? this.vote.vote_count++ : this.vote.vote_count--
                        } else {
                            this.vote[votingType] = !this.vote[votingType]
                            if (type == 'up') this.vote[upType] ? this.vote.vote_count++ : this.vote.vote_count--
                        }
                    }).catch((response) => {
                        if (response.status == 401) {
                            window.location = '/login';
                        }
                    })
            } else {
                window.location = '/login';
            }
        },
    }
}

</script>
