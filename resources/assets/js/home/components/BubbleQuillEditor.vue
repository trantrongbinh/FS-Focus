<template>
    <div ref="editor" v-html="value"></div>
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
        canComment: {
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
    },

    data() {
        return {
            editor: null
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
                'emoji-textarea': true,
                'emoji-shortname': true,
                syntax: {
                    highlight: text => hljs.highlightAuto(text).value
                }
            },
            placeholder: 'Black out text to use formatting',
            theme: 'bubble'
        });

        this.editor.root.spellcheck = false;
        this.editor.root.innerHTML = this.value;
        // handle image drop
        this.editor.root.addEventListener('drop', this.handleImageDrop, false);
        // We will add the update event here
        this.editor.on('text-change', () => this.update());
    },

    methods: {
        update() {
            this.$emit('contentUpdated', this.editor.getText() ? this.editor.root.innerHTML : '');
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
            formData.append('strategy', 'comment')
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
