<template>
  <span class="vote-button">
    <a href="javascript:;" class="claps_button btn-tool" @click="upVote( item.id )">
        <i :class="item.is_up_voted ? 'fas fa-thumbs-up text-success' : 'far fa-thumbs-up'"> <span v-if="item.vote_count > 0" class="number">&nbsp {{ item.vote_count }}</span></i>
    </a>
    <br>
  </span>
</template>

<script>
    export default {
        props: {
            item: {
                type: Object,
                default() {
                    return {}
                }
            },
            api: {
                type: String,
                default: 'articles'
            },
        },
        data() {
            return {
                isVoted: false,
                voteCount: ''
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
                let url = this.api + '/vote/' + type
                let upType = 'is_up_voted'
                let downType = 'is_down_voted'
                let checkType = type == 'up' ? downType : upType
                let votingType = type == 'up' ? upType : downType

                this.$http.post(url, {id: id})
                    .then(() => {
                        if (this.item[checkType]) {
                            this.item[upType] = !this.item[upType]
                            this.item[downType] = !this.item[downType]
                            type == 'up' ? this.item.vote_count++ : this.item.vote_count--
                        } else {
                            this.item[votingType] = !this.item[votingType]
                            if (type == 'up') this.item[upType] ? this.item.vote_count++ : this.item.vote_count--
                        }
                        console.log(this.item.is_up_voted)
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
