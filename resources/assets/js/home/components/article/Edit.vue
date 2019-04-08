<template>
    <div class="create-wrapper">
        <article-create :article-original="article"></article-create>
    </div>
</template>
<script>

export default {
    props: {
        slug: {
            type: String,
            default: ''
        }
    },

    data() {
        return {
            article: undefined
        }
    },

    created() {
        this.$http.get('article/' + this.slug + '/edit-post?include=category,tags')
            .then((response) => {
                this.article = response.data.data
            })
    }
}

</script>
