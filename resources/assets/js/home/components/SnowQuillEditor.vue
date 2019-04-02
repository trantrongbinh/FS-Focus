<template>
    <div ref="editor" v-html="value"></div>
</template>
<script>
import 'quill/dist/quill.snow.css';
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
        status: {
            type: Boolean,
            default () {
                return false
            }
        },
        tableType: {
            type: String,
            default () {
                return 'trash'
            }
        },
        elementId: {
            type: String,
            default () {
                return 0
            }
        },
        strategy: {
            type: String,
            default () {
                return 'comment'
            }
        },
        reply: {
            type: String,
            default () {
                return ''
            }
        },
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
            placeholder: 'Enter content',
            theme: 'snow'
        });

        this.editor.root.spellcheck = false;
        this.editor.root.innerHTML = this.value;
        // handle image drop
        this.editor.root.addEventListener('drop', this.handleImageDrop, false);
        // We will add the update event here
        this.editor.on('text-change', () => this.update());
    },

    watch: {
        status: function() {
            this.editor.setContents([]);
            let elem = document.querySelector('.ql-tooltip').nextSibling;
            if (elem !== null) elem.style.display = 'none';
        },

        reply: function() {
            if (this.reply.length > 0) {
                this.editor.insertText(0, '@' + this.reply, {
                    'link': '/user/' + this.reply,
                    'color': '#00b5ad'
                });

                this.editor.insertText(this.reply.length + 1, '\n', { 'color': '#000' }, true);
            }

            this.$emit('update:reply', '')
        }
    },

    methods: {
        update() {
            if (!(this.editor.getText().trim().length === 0 && this.editor.container.firstChild.innerHTML.includes("img") === false && this.editor.container.firstChild.innerHTML.includes('class="ql-emojiblot"') === false)) {
                this.contents = this.editor.root.innerHTML;
            } else {
                this.contents = '';
            };

            this.$emit('contentUpdated', this.contents);
        },

        uploadImages() {
            let fileInput = document.querySelector('input.ql-image[type=file]');

            if (fileInput == null) {
                fileInput = document.createElement('input');
                fileInput.setAttribute('type', 'file');
                fileInput.setAttribute('accept', 'image/png, image/gif, image/jpeg, image/bmp, image/x-icon');
                fileInput.classList.add('ql-image');
                fileInput.addEventListener('change', () => {
                    const files = fileInput.files;

                    if (!files || !files.length) {
                        console.log('No files selected');
                        return;
                    }

                    this.handleSaveFile(files);
                });
            }
            fileInput.click();
        },

        handleImageDrop(evt) {
            evt.preventDefault();
            if (evt.dataTransfer && evt.dataTransfer.files && evt.dataTransfer.files.length) {
                [].forEach.call(evt.dataTransfer.files, file => {
                    if (!file.type.match(/^image\/(gif|jpe?g|a?png|svg|webp|bmp|vnd\.microsoft\.icon)/i)) {
                        return;
                    }

                    this.handleSaveFile(evt.dataTransfer.files);
                });
            }
        },

        handleSaveFile(files) {
            const formData = new FormData();

            formData.append('image', files[0]);
            formData.append('strategy', this.strategy)
            formData.append('element_id', this.elementId)
            formData.append('table_type', this.tableType)

            this.editor.enable(false);
            this.$http.post('file/upload', formData)
                .then(response => {
                    this.editor.enable(true);
                    this.insertImage(response.data.url);
                })
                .catch(error => {
                    console.log('quill image upload failed');
                    console.log(error);
                    this.editor.enable(true);
                });
        },

        insertImage(dataUrl) {
            const index = (this.editor.getSelection() || {}).index || this.editor.getLength();
            this.editor.insertEmbed(index, 'image', dataUrl, 'user');
        }
    }
}

</script>
