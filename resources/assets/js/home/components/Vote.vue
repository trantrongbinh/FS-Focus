<template>
    <div class="vote">
        <div class="up" @click="upVote(objectId)">
            <a href="javascript:;">
                <i aria-hidden="true" class="fa fa-caret-up fa-2x" :style="{ color: tmpVote.is_up_voted ? '#22c7a9' : '#aaa' }"></i>
            </a>
        </div>
        <div class="votes">{{ tmpVote.vote_count }}</div>
        <div class="down" @click="downVote(objectId)">
            <a href="javascript:;">
                <i aria-hidden="true" class="fa fa-caret-down fa-2x" :style="{ color: tmpVote.is_down_voted ? '#f56262': '#aaa' }"></i>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        objectId: {
            type: String,
            default () {
                return 0
            }
        },
        api: {
            type: String,
            default: 'article'
        },
        vote: {
            type: String,
            default: '{}'
        }
    },

    data() {
        return {
            tmpVote: []
        }
    },

    mounted() {
        this.tmpVote = JSON.parse(this.vote)
    },

    methods: {
        upVote(id) {
            this.toggleVote(id, 'up')
        },
        downVote(id) {
            if (this.tmpVote.is_down_voted) {
                return;
            } else {
                this.toggleVote(id, 'down')
            }
        },
        toggleVote(id, type) {
            let url = this.api + '/vote/' + type

            let upType = 'is_up_voted'
            let downType = 'is_down_voted'
            let checkType = type == 'up' ? downType : upType
            let votingType = type == 'up' ? upType : downType

            this.$http.post(url, { id: id })
                .then(() => {
                    if (this.tmpVote[checkType]) {
                        this.tmpVote[upType] = !this.tmpVote[upType]
                        this.tmpVote[downType] = !this.tmpVote[downType]
                        type == 'up' ? this.tmpVote.vote_count++ : this.tmpVote.vote_count--
                    } else {
                        this.tmpVote[votingType] = !this.tmpVote[votingType]
                        if (type == 'up') {
                            this.tmpVote[upType] ? this.tmpVote.vote_count++ : this.tmpVote.vote_count--
                        }
                    }
                }).catch((response) => {
                    if (response.status == 401) {
                        window.location = '/login';
                    }
                })
        }
    }
}

</script>
<style lang="scss" scoped>
.vote {
    float: left;
    margin-top: 5px;
    text-align: center;
}
</style>
