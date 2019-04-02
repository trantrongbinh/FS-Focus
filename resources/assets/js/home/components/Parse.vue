<template>
    <div>
        <div class="markdown" v-html="html"></div>
        <a v-if="!isHidden" href="javascript:void(0)" @click="readMore(content.length)"><strong>Xem thêm</strong></a>
    </div>
</template>
<script>
export default {
    props: {
        content: {
            type: String,
            default () {
                return null
            }
        },

        endPoint: {
            type: String,
            default () {
                return ''
            }
        },

        minLimit: {
            type: String,
            default () {
                return 0
            }
        },

        maxLimit: {
            type: String,
            default () {
                return 0
            }
        },
    },

    data() {
        return {
            html: '',
            isHidden: false,
        }
    },

    created() {
        this.html = this.parse(this.content, this.minLimit)
    },

    methods: {
        parse(content, limit) {
            if (limit != 0 && content.length > limit) {
                content = content.substring(0, limit) + '<div class="text-orange">...</div>';
            } else {
                this.isHidden = true;
            }

            return content;
        },

        readMore(lengthContent) {
            if (lengthContent > this.maxLimit) {
                window.location = this.endPoint;
            } else {
                this.html = this.parse(this.content, 0)
            }
        }
    },
}

</script>
