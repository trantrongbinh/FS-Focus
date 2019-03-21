<template>
    <div class="create-wrapper">
        <div class="text-center">
            <a class="nav-link btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#draftModal"></i><b>Drafts (0)</b></a>
            <div class="modal fade" id="draftModal" style="color: #000">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Your drafts (0)</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">You do not have any articles.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div id="editor-container">
            <div id="editor-wrapper" >
                <div id="title-container">
                    <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="TITLE YOUR POST" rows="1" id="title" name="title"></textarea>
                </div>
                <div class="clear"></div>
                <div class="row">
                    <div class="col-sm-5">
                        <multiselect v-model="selected" :options="options"></multiselect>
                    </div>
                    <div class="col-sm-7">
                        <multiselect v-model="tags" :options="allTag" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :multiple="true" :taggable="true" :max="4">
                        </multiselect>
                    </div>
                </div>
                <div ref="editor" v-html="value"></div>
            </div>
            <hr>
            <div class="action-save text-right">
                <span class="far fa-check-circle"> Đã cập nhật</span>
                <span class="far fa-save"> Đang lưu ...</span>
            </div>
            <div class="content__save text-center">
                <button type="submit" class="btn btn-info btn-sm">Đăng bài</button>
            </div>
        </div>
    </div>
</template>
<script>
import 'quill/dist/quill.bubble.css';
import hljs from 'highlight.js';
import Quill from 'quill';
window.Quill = Quill;
import ImageResize from 'quill-image-resize-module';
import Emoji from 'quill-emoji/dist/quill-emoji';

import Multiselect from 'vue-multiselect'

export default {
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
        }
    },

    data() {
        return {
            editor: null,
            contents: '',
            selected: '',
            tags: '',
            options: ['Select option', 'options', 'selected', 'mulitple', 'label', 'searchable', 'clearOnSelect', 'hideSelected', 'maxHeight', 'allowEmpty', 'showLabels', 'onChange', 'touched'],
            allTag: [
                { name: 'Vue.js', code: 'vu' },
                { name: 'Javascript', code: 'js' },
                { name: 'PHP', code: 'php' },
                { name: 'Node JS', code: 'nodejs' },
                { name: 'HTML', code: 'html' },
                { name: 'Open Source', code: 'os' }
            ]
        };
    },

    mounted() {
        Quill.register('modules/imageResize', ImageResize);

        const toolbarOptions = {
            container: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'super' }, { 'script': 'sub' }],
                [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
                [ 'direction', { 'align': [] }],
                [ 'link', 'image', 'video', 'formula' ],
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
