<template>
    <div class="form-group row">
        <div class="col-sm-12">
            <textarea id="editor" name="content"></textarea>
        </div>
    </div>
</template>

<script>
    import {default as SimpleMDE} from 'simplemde/dist/simplemde.min'
    import {stack_error} from 'config/helper'
    import FineUploader from 'fine-uploader/lib/traditional'
    import emojione from 'emojione'

    export default {
        props: {
            content: {
                type: String,
                default() {
                    return ''
                }
            }
        },
        data() {
            return {
                simplemde: ''
            }
        },
        mounted() {
            let t = this.$t
            let self = this

            this.simplemde = new SimpleMDE({
                element: document.getElementById("editor"),
                placeholder: t('form.content_placeholder', {type: t('form.article')}),
                autoDownloadFontAwesome: true,
                forceSync: true,
                previewRender(plainText, preview) {
                    preview.className += ' markdown'

                    return self.parse(plainText)
                },
            })

            this.simplemde.value(this.content)
            this.contentUploader()
        },
        methods: {
            parse(content) {
                marked.setOptions({
                    highlight: (code) => {
                        return hljs.highlightAuto(code).value
                    },
                    sanitize: true
                })

                return emojione.toImage(marked(content))
            },
            contentUploader() {
                let vm = this

                this.simplemde.codemirror.on('paste', function (editor, event) {
                    if (event.clipboardData.types.indexOf("Files") >= 0) {
                        event.preventDefault()
                    }
                })

                let contentUploader = new FineUploader.FineUploaderBasic({
                    paste: {
                        targetElement: document.querySelector('.CodeMirror')
                    },
                    request: {
                        endpoint: '/api/file/upload',
                        inputName: 'image',
                        customHeaders: {
                            'X-CSRF-TOKEN': window.Laravel.csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        params: {
                            strategy: 'article'
                        }
                    },
                    validation: {
                        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
                    },
                    callbacks: {
                        onPasteReceived(file) {
                            let promise = new FineUploader.Promise()

                            if (file == null || typeof file.type == 'undefined' || file.type.indexOf('image/')) {
                                toastr.error('Only can upload image!');
                                return promise.failure('not a image.')
                            }

                            return promise.then(() => {
                                vm.createdImageUploading('image.png')
                            }).success('image')
                        },
                        onComplete(id, name, responseJSON) {
                            vm.replaceImageUploading(name, responseJSON.url)
                        },
                    },
                });

                let dragAndDropModule = new FineUploader.DragAndDrop({
                    dropZoneElements: [document.querySelector('.CodeMirror')],
                    callbacks: {
                        processingDroppedFilesComplete(files, dropTarget) {
                            files.forEach((file) => {
                                vm.createdImageUploading(file.name)
                            })
                            contentUploader.addFiles(files); //this submits the dropped files to Fine Uploader
                        }
                    }
                })
            },
            getImageUploading() {
                return '\n![Uploading ...]()\n'
            },
            createdImageUploading(name) {
                this.simplemde.value(this.simplemde.value() + this.getImageUploading())
            },
            replaceImageUploading(name, url) {
                let result = '\n![' + name + '](' + url + ')\n'

                this.simplemde.value(this.simplemde.value().replace(this.getImageUploading(), result))
            },
        }
    }
</script>
