<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="text" id="page_image" class="form-control" name="page_image"
                           v-model="article.page_image" placeholder="ex: /uploads/default_avatar.png">
                </div>
                <div class="col-sm-4">
                    <img v-if="article.page_image != null && article.page_image != ''" :src="article.page_image"
                         alt="FS-Focus" width="35" height="35">
                    <div class="cover-upload pull-right">
                        <a href="javascript:;" class="btn btn-success file">
                            <span>{{ $t('form.upload_file') }}</span>
                            <input type="file" @change="coverUploader">
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group row type">
                <div class="col-sm-2">
                    <div class="togglebutton" style="margin-top: 6px">
                        <label>
                            <input type="checkbox" name="type" checked>
                            <span class="toggle"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea id="editor" name="content"></textarea>
                </div>
            </div>
        </div>
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
            article: {
                type: Object,
                default() {
                    return {
                        page_image: ''
                    }
                }
            }
        },
        data() {
            return {
                simplemde: '',
                content: ''
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
            coverUploader(event) {
                let files = event.target.files

                let formData = new FormData()

                formData.append('image', files[0])
                formData.append('strategy', 'cover')

                this.$http.post('file/upload', formData)
                    .then((response) => {
                        toastr.success('You upload a file success!')

                        this.article.page_image = response.data.url
                    }).catch(({response}) => {
                    if (response.data.error) {
                        toastr.error(response.data.error.message)
                    } else {
                        toastr.error(response.status + ' : Resource ' + response.statusText)
                    }
                })
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

<style lang="scss" scoped>
    .cover-upload {
        display: inline-block;

        .file {
            position: relative;
            margin: 0 auto;
            display: block;
            width: 100px;
            height: 35px;
            line-height: 35px;
            font-size: 12px;

            span {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
            }
            input {
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                width: 100px;
                height: 35px;
                opacity: 0;
            }
        }
    }

    .type {
        display: none;
    }
</style>
