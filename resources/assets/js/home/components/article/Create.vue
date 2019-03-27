<template>
    <div class="create-wrapper">
        <form @submit.prevent="onSubmit">
            <div class="clear"></div>
            <div id="editor-container">
                <a class="btn btn-outline-info btn-sm float-right border__none" href="#" data-toggle="modal" data-target="#draftModal"></i><b>Drafts ({{ countDrafts }})</b></a>
                <div class="modal fade" id="draftModal" style="color: #000">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Your drafts ({{ countDrafts }})</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div v-if="drafts.length == 0">
                                    You do not have any articles.
                                </div>
                                <div v-for="(draft, index) in drafts" v-else>
                                    <h2 class="h3">{{ draft.title }}</h2>
                                    <div>{{ draft.content }}</div>
                                    <div>
                                        {{ draft.created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editor-wrapper">
                    <div id="title-container">
                        <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="TITLE YOUR POST" rows="1" id="title" name="title" v-model="article.title"></textarea>
                    </div>
                    <div class="clear"></div>
                    <div class="row">
                        <div class="col-sm-5">
                            <multiselect v-model="selected" :options="options" label="name" :placeholder="$t('form.select_category')" track-by="name">
                            </multiselect>
                        </div>
                        <div class="col-sm-7">
                            <multiselect v-model="tags" :options="allTag" :multiple="true" :searchable="true" :hide-selected="true" :close-on-select="false" :clear-on-select="false" :max="4" :placeholder="$t('form.select_tag')" label="tag" track-by="tag">
                            </multiselect>
                        </div>
                    </div>
                    <div id="content_wrapper" ref="editor" v-html="value"></div>
                </div>
                <hr>
                <div class="action-save text-right">
                    <span class="far fa-check-circle" v-if="!saved"> Đã cập nhật</span>
                    <span class="far fa-save" v-else> Đang lưu ...</span>
                </div>
                <div class="content__save text-center">
                    <button type="submit" class="btn btn-info btn-sm">{{ $t('form.create') }}</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import 'quill/dist/quill.bubble.css';
import hljs from 'highlight.js';
import Quill from 'quill';
window.Quill = Quill;
import ImageResize from 'quill-image-resize-module';
import Emoji from 'quill-emoji/dist/quill-emoji';
import { stack_error } from 'config/helper'
import Multiselect from 'vue-multiselect'
import ArticleMixin from './ArticleMixin'

export default {
    mixins: [ArticleMixin],
    components: {
        Multiselect
    },
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
        },
        article: {
            type: Object,
            default () {
                return {
                    page_image: ''
                }
            }
        },
        userId: {
            type: String,
            default () {
                return 0
            }
        }
    },

    data() {
        return {
            editor: null,
            contents: '',
            saved: false,
            timeout: null,
            countDrafts: 0,
            drafts: []
        };
    },

    computed: {
        mode() {
            return this.article.id ? 'update' : 'create'
        },
    },

    mounted() {
        Quill.register('modules/imageResize', ImageResize);

        const toolbarOptions = {
            container: [
                [{ 'header': [false, 6, 5, 4, 3, 2, 1] }],
                ['bold', 'italic', 'underline'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                ['link', 'image', 'video', 'formula'],
                ['emoji']
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
        // Fix toolbar at top
        window.onscroll = () => this.addClassFixed();

        //Get draft post
        var url = 'article/' + this.userId + '/drafts'
        this.$http.get(url).then((response) => {
            this.countDrafts = Object.keys(response.data.data).length;
            this.drafts = response.data.data
        })
    },

    watch: {
        'article.title': function() {
            clearTimeout(this.timeout);

            var self = this;
            this.timeout = setTimeout(function() {
                self.saveDraft()
            }, 5000);
        },

        contents: function() {
            clearTimeout(this.timeout);

            var self = this;
            this.timeout = setTimeout(function() {
                self.saveDraft()
            }, 5000);
        }
    },

    methods: {
        update() {
            let src_regex = /<img.*?src="(.*?)"/;

            if (!(this.editor.getText().trim().length === 0 && this.editor.container.firstChild.innerHTML.includes("img") === false && this.editor.container.firstChild.innerHTML.includes('class="ql-emojiblot"') === false)) {
                this.contents = this.editor.root.innerHTML;
                let src_image = src_regex.exec(this.editor.container.firstChild.innerHTML);
                this.article.page_image = (src_image !== null) ? src_image[1] : '';
            };
        },

        onSubmit() {
            if (!this.tags || !this.selected) {
                toastr.error('Category and Tag must select one or more.')
                return;
            }

            let tagIDs = []
            let url = 'article' + (this.article.id ? '/' + this.article.id : '')
            let method = this.article.id ? 'patch' : 'post'

            for (var i = 0; i < this.tags.length; i++) {
                tagIDs[i] = this.tags[i].id
            }

            this.article.content = this.contents
            this.article.category_id = this.selected.id
            this.article.tags = JSON.stringify(tagIDs)

            this.$http[method](url, this.article)
                .then((response) => {
                    toastr.success('You ' + this.mode + 'd the article success!')
                    window.location.href = '/'
                }).catch(({ response }) => {
                    stack_error(response)
                })
        },

        getKeyByValue(object, childKey, value) {
          return Object.keys(object).find(key => object[key][childKey] === value);
        },

        saveDraft: function() {
            let url = 'article/draft' + (this.article.id ? '/' + this.article.id : '')
            let method = this.article.id ? 'patch' : 'post'

            if (this.tags) {
                let tagIDs = []

                for (var i = 0; i < this.tags.length; i++) {
                    tagIDs[i] = this.tags[i].id
                }

                this.article.tags = JSON.stringify(tagIDs)
            }

            if (this.selected) {
                this.article.category_id = this.selected.id
            }

            if (this.article.title || this.contents) {
                this.article.content = this.contents
                this.saved = true;

                this.$http[method](url, this.article)
                    .then((response) => {
                        this.article.id = response.data.data.id;

                        if (method === 'post') {
                            this.countDrafts += 1;
                            this.drafts.unshift(response.data.data)
                        } else {
                            let keyCurrentDraft = this.getKeyByValue(this.drafts, 'id', response.data.data.id)
                            this.drafts.splice(keyCurrentDraft, 1, response.data.data)
                        }

                        var self = this;
                        setTimeout(function() {
                            self.saved = false;
                        }, 2000);
                    }).catch(({ response }) => {
                        console.log(response)
                    })
            };
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
            formData.append('strategy', 'article')

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
        },

        addClassFixed() {
            let toolbar = document.getElementsByClassName('ql-toolbar')[0];
            let content_wrapper = document.getElementById('content_wrapper');
            let editor_sticky = parseInt(content_wrapper.offsetTop);

            if (window.pageYOffset > editor_sticky) {
                toolbar.classList.add('sticky-editor');

            } else {
                toolbar.classList.remove("sticky-editor");
            }
        }
    }
}

</script>
