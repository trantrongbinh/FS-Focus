<template>
    <div id="flex">
        <div ref="editor" v-html="value"></div>
    </div>
</template>
<script>
import 'quill/dist/quill.bubble.css';
import hljs from 'highlight.js';
import Quill from 'quill';
window.Quill = Quill;
import ImageResize from 'quill-image-resize-module';
import Emoji from 'quill-emoji/dist/quill-emoji';

export default {
    props: {
        value: {
            type: String,
            default: ''
        },
        oldContent: {
            type: String,
            default () {
                return ''
            }
        }
    },

    data() {
        return {
            editor: null,
            contents: ''
        };
    },

    mounted() {
        Quill.register('modules/imageResize', ImageResize);

        const toolbarOptions = {
            container: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean'],
                ['emoji'],
            ],
            handlers: {
                'emoji': function() {},
                'image': this.uploadImages
            }
        }

        this.editor = new Quill(this.$refs.editor, {
            modules: {
                toolbar: toolbarOptions,
                imageResize: true,
                'emoji-toolbar': true,
                syntax: {
                    highlight: text => hljs.highlightAuto(text).value
                }
            },
            placeholder: 'Black out text to use formatting',
            theme: 'snow'
        });

        this.editor.root.spellcheck = false;
        this.editor.root.innerHTML = this.oldContent;
        // We will add the update event here
        this.editor.on('text-change', () => this.update());
    },

    methods: {
        update() {
            if (!(this.editor.getText().trim().length === 0 && this.editor.container.firstChild.innerHTML.includes("img") === false && this.editor.container.firstChild.innerHTML.includes('class="ql-emojiblot"') === false)) {
                this.contents = this.editor.root.innerHTML;
            } else {
                this.contents = '';
            };

            this.$emit('contentUpdated', this.contents);
        }
    }
}

</script>

