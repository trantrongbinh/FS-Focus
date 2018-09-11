<template>
  <div class="row">
	  	<div class="col-sm-12">
			<div class="form-group row">
			  <label for="title" class="col-sm-1 col-form-label">{{ $t('form.title') }}</label>
			  <div class="col-sm-11">
				<input type="text" id="title" name="title" v-model="article.title" class="form-control">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="subtitle" class="col-sm-1 col-form-label">{{ $t('form.subtitle') }}</label>
			  <div class="col-sm-11">
				<input type="text" id="subtitle" name="subtitle" v-model="article.subtitle" class="form-control">
			  </div>
			</div>
			<div class="form-group row">
			  	<label for="page_image" class="col-sm-1 col-form-label">{{ $t('form.page_image') }}</label>
			  	<div class="col-sm-7">
					<input type="text" id="page_image" class="form-control" name="page_image" v-model="article.page_image" placeholder="ex: /uploads/default_avatar.png">
			  	</div>
			  	<div class="col-sm-4">
					<img v-if="article.page_image != null && article.page_image != ''" :src="article.page_image" alt="Idist" width="35" height="35">
					<div class="cover-upload pull-right">
				  		<a href="javascript:;" class="btn btn-success file">
					  		<span>{{ $t('form.upload_file') }}</span>
					  		<input type="file" @change="coverUploader">
				  		</a>
					</div>
			  	</div>
			</div>
			<div class="form-group row">
			  <label for="title" class="col-sm-1 col-form-label">{{ $t('form.content') }}</label>
			  <div class="col-sm-11">
				<textarea id="editor"></textarea>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="meta_description" class="col-sm-1 col-form-label">{{ $t('form.meta_description') }}</label>
			  <div class="col-sm-11">
				<textarea id="meta_description" name="meta_description" v-model="article.meta_description" class="form-control"></textarea>
			  </div>
			</div>
			<div class="form-group row">
			  <div class="col-sm-2 col-form-label">
				{{ $t('form.is_draft') }}
			  </div>
			  <div class="col-sm-2">
				<div class="togglebutton" style="margin-top: 6px">
				  <label>
					<input type="checkbox" name="is_draft" v-model="article.is_draft">
					<span class="toggle"></span>
				  </label>
				</div>
			  </div>
			  <div class="col-sm-2 col-form-label">
				{{ $t('form.is_original') }}
			  </div>
			  <div class="col-sm-2">
				<div class="togglebutton" style="margin-top: 6px">
				  <label>
					<input type="checkbox" name="is_original" v-model="article.is_original">
					<span class="toggle"></span>
				  </label>
				</div>
			  </div>
			</div>
	  	</div>
  </div>
</template>

<script>
import { default as SimpleMDE } from 'simplemde/dist/simplemde.min'
import { stack_error } from 'config/helper'
import FineUploader from 'fine-uploader/lib/traditional'
import emojione from 'emojione'

export default {
  	props: {
		article: {
	  		type: Object,
	  		default () {
				return {
		  			page_image: ''
				}
	  		}
		}
  	},
  	data() {
		return {
	  		simplemde: '',
	  		content: '',
		}
  	},
  	computed: {
		mode() {
	  		return this.article.id ? 'update' : 'create'
		},
  	},
  	mounted() {
		let t = this.$t
		let self = this

		this.simplemde = new SimpleMDE({
	  		element: document.getElementById("editor"),
	  		placeholder: t('form.content_placeholder', { type: t('form.article') }),
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
			}).catch(({ response }) => {
		  		if (response.data.error) {
					toastr.error(response.data.error.message)
		  		} else {
					toastr.error(response.status + ' : Resource ' + response.statusText)
		  		}
			})
		},
		contentUploader() {
	  		let vm = this

	  		this.simplemde.codemirror.on('paste', function(editor, event) {
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
</style>
