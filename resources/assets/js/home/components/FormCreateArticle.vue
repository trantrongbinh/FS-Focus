<template>
	<div class="form-group row">
		<label for="title" class="col-sm-1 col-form-label">Content</label>
		<div class="col-sm-11">
			<textarea id="editor" name="text"></textarea>
		</div>
	</div>
</template>

<script>
import { default as SimpleMDE } from 'simplemde/dist/simplemde.min'
import { stack_error } from 'config/helper'
import emojione from 'emojione'

export default {
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
  	}
}
</script>
