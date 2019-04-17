<template>
    <div class="vote">
        <div class="up" @click="upVote">
            <i aria-hidden="true" class="fa fa-caret-up fa-2x" :style="{ color: green ? '#22c7a9' : '#aaa' }">
            </i>
        </div>
        <div class="votes">{{ voteCount }}</div>
        <div class="down" @click="downVote">
            <i aria-hidden="true" class="fa fa-caret-down fa-2x" :style="{ color: red ? '#f56262': '#aaa' }">
            </i>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            voteCount: 0,
            green: false,
            red: false,
        }
    },

    methods: {
        upVote() {
            if (this.red) {
                return;
            } else if (!this.green) {
                this.voteCount += 1;
                this.green = !this.green;
            } else {
                this.voteCount -= 1;
                this.green = !this.green;
            }
        },
        downVote() {
            if (this.green) {
                return;
            } else if (!this.red) {
                this.voteCount -= 1;
                this.red = !this.red;
            } else {
                this.voteCount += 1;
                this.red = !this.red;
            }
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
