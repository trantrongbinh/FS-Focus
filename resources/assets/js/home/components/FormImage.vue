<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-md-12 text-center"><img id="image-post" v-if="page_image != null && page_image != ''" :src="page_image" alt="FS-Focus"></div>
                <div class="col-sm-10 offset-md-1 text-center">
                    <input type="text" id="page_image" class="form-control" name="page_image" v-model="page_image" placeholder="Paste path file here - ex: /uploads/default_avatar.png">
                </div>
                <div class="col-sm-6  offset-md-3 text-center">
                    <div class="cover-upload">
                        <a href="javascript:;" class="btn btn-success file">
                            <span>{{ $t('form.upload_file') }}</span>
                            <input type="file" @change="coverUploader">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {stack_error} from 'config/helper'
    import FineUploader from 'fine-uploader/lib/traditional'

    export default {
        data: function () {
            return {
                page_image: '',
            }
        },
        methods: {
            coverUploader(event) {
                let files = event.target.files

                let formData = new FormData()

                formData.append('image', files[0])
                formData.append('strategy', 'cover')

                this.$http.post('file/upload', formData)
                    .then((response) => {
                        toastr.success('You upload a file success!')

                        this.page_image = response.data.url
                    }).catch(({response}) => {
                    if (response.data.error) {
                        toastr.error(response.data.error.message)
                    } else {
                        toastr.error(response.status + ' : Resource ' + response.statusText)
                    }
                })
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

    #page_image{
        margin-top: 10px;
        text-align: center;
        border: none;
    }

    #image-post{
        margin-top: -30px;
        max-width: 1000px;
        max-height: 450px;
    }
</style>
