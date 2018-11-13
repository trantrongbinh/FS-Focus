<template>
  <span class="vote-button">
    <a href="javascript:;" class="claps_button btn-tool" @click="upVote( articleId )">
        <i :class="vote.is_up_voted ? 'fas fa-thumbs-up text-success' : 'far fa-thumbs-up'"> <span v-if="vote.vote_count > 0" class="number">&nbsp {{ vote.vote_count }}</span></i>
    </a>
    <br>
  </span>
</template>

<script>
    export default {
        props: {
            articleId: {
                type: String,
                default() {
                    return 0
                }
            },
            api: {
                type: String,
                default: ''
            },
        },
        data() {
            return {
                vote: []
            }
        },
        mounted() {
            var url = this.api + '/' + this.articleId + '/vote'
            this.$http.get(url, {votetableType: 'articles'}).then((response) => {
                this.vote = response.data
            })
        },
        methods: {
            upVote(id) {
                this.toggleVote(id, 'up')
            },
            downVote(id) {
                this.toggleVote(id, 'down')
            },
            toggleVote(id, type) {
                let url = this.api + '/vote/' + type
                let upType = 'is_up_voted'
                let downType = 'is_down_voted'
                let checkType = type == 'up' ? downType : upType
                let votingType = type == 'up' ? upType : downType

                this.$http.post(url, {id: id})
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
                    console.log(response)
                    if (response.status == 401) {
                        window.location = '/login';
                    }
                })
            },
        }
    }
</script>

<style lang="scss" scoped>

    @keyframes clap {
        0% {
            opacity: 0;
        }
        60% {
            opacity: 1;
            transform: translateY(-100px) scale(1);
        }
        80% {
            transform: translateY(-190px) scale(0.6);
        }
        100% {
            opacity: 0;
        }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0;
        }
        70% {
            box-shadow: 0 0 5px 10px rgba(255, 255, 255, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
        }
    }

    .claps_button {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 50%;
        background-color: #fff;
        border: 1px solid #02b875;
        width: 60px;
        height: 60px;
        outline: 0;
        cursor: pointer;
        filter: drop-shadow(0 3px 12px rgba(0, 0, 0, 0.05));
        transform: scale(1);
        transition: all .1s ease-in;
        z-index: 1;
        fill: #02B875;
        pointer-events: visible;
    }

    .number{
        font-size: 12px !important;
        margin-top: 5px;
    }

    a.claps_button {
        border-color: #02b875;
        color: #00ab6b;
        fill: #00ab6b;
        animation: pulse 3s infinite;
        position: absolute;
        margin-left: -23px;
    }

    a.claps_button:hover {
        width: 65px;
        height: 65px;
        border-color: #02b875;
        color: #00ab6b;
        fill: #00ab6b;
        animation: pulse 2s infinite;
    }
</style>
