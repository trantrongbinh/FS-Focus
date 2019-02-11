<template>
    <div ref="editor" v-html="value" @blur="onEditorBlur($event)" @focus="onEditorFocus($event)" @ready="onEditorReady($event)"></div>
</template>
<script>
import 'quill/dist/quill.snow.css';
import hljs from 'highlight.js';
import Quill from 'quill';

export default {
    props: {
        value: {
            type: String,
            default: ''
        }
    },

    data() {
        return {
            editor: null
        };
    },

    mounted() {
        this.editor = new Quill(this.$refs.editor, {
            modules: {
                syntax: true,
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image']
                ],
                syntax: {
                    highlight: text => hljs.highlightAuto(text).value
                }
            },
            theme: 'snow'
        });

        this.editor.root.spellcheck = false;
        // this.editor.root.focus();
        // this.editor.root.blur();

        this.editor.root.innerHTML = this.value;

        // We will add the update event here
        this.editor.on('text-change', () => { console.log('dm') });
    },
    methods: {
        onEditorBlur(editor) {
            console.log('editor blur!', this.editor)
        },
        onEditorFocus(editor) {
            console.log('editor focus!', this.editor)
        },
        onEditorReady(editor) {
            console.log('editor ready!', this.editor)
        },
        update() {
            this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
        }
    }
}

</script>
<style lang="scss" scoped>
.ql-editor p {
    font-family: 'Arial';
    font-size: 18px;
}

</style>
