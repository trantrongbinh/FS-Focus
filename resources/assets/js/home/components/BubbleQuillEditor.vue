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
import ImageDrop from './../../dest/quill-editor/quill-drop-handle';

export default {
    props: {
        value: {
            type: String,
            default: ''
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
        ImageDrop.prototype.handleDrop = (evt) => {
            if (evt.dataTransfer && evt.dataTransfer.files && evt.dataTransfer.files.length) {
                console.log(ImageDrop.prototype);
                ImageDrop.prototype.readFiles(evt.dataTransfer.files, this.uploadImages.bind(ImageDrop.prototype));
            }
        };
        Quill.register('modules/imageDrop', ImageDrop);

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
                syntax: true,
                toolbar: toolbarOptions,
                imageResize: true,
                imageDrop: true,
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

        // We will add the update event here
        this.editor.on('text-change', () => {});
    },
    methods: {
        update() {
            this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
        },

        uploadImages(files = null) {
            let fileInput = document.querySelector('input.ql-image[type=file]');

            if (fileInput == null) {
                fileInput = document.createElement('input');
                fileInput.setAttribute('type', 'file');
                fileInput.setAttribute('accept', 'image/png, image/gif, image/jpeg, image/bmp, image/x-icon');
                fileInput.classList.add('ql-image');
                fileInput.addEventListener('change', () => {
                    const files = fileInput.files;
                    const range = this.editor.getSelection(true);

                    if (!files || !files.length) {
                        console.log('No files selected');
                        return;
                    }

                    const formData = new FormData();
                    formData.append('image', files[0]);
                    formData.append('strategy', 'comment')
                    formData.append('element_id', this.elementId)
                    formData.append('table_type', this.tableType)

                    this.editor.enable(false);

                    this.$http.post('file/upload', formData)
                    .then(response => {
                        this.editor.enable(true);
                        this.editor.insertEmbed(range.index, 'image', response.data.url);
                        this.editor.setSelection(range.index + 1, Quill.sources.SILENT);
                        fileInput.value = '';
                    })
                    .catch(error => {
                        console.log('quill image upload failed');
                        console.log(error);
                        this.editor.enable(true);
                    });
                });
            }
            fileInput.click();
        }
    }
}

</script>

