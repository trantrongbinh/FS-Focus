class Counter {
  constructor(quill, options) {
    this.quill = quill;
    this.options = options;
    this.container = document.querySelector(options.container);
    quill.on('text-change', this.update.bind(this));
    this.update(); // Account for initial contents
  }

  calculate() {
    let text = this.quill.getText();
    if (this.options.unit === 'word') {
      text = text.trim();
      // Splitting empty text returns a non-empty array
      return text.length > 0 ? text.split(/\s+/).length : 0;
    } else {
      return text.length;
    }
  }

  update() {
    var length = this.calculate();
    var label = this.options.unit;
    if (length !== 1) {
      label += 's';
    }
    this.container.innerText = length + ' ' + label;
  }
}

const fonts = ['times-new-roman', 'arial'];
const size = ['', '12px', '14px', '16px', '18px'];
const Font = Quill.import('formats/font');
const Size = Quill.import('attributors/style/size');
Size.whitelist = size;
Font.whitelist = fonts;

Quill.register(Size, true);
Quill.register(Font, true);
Quill.register('modules/counter', Counter);

function quill_img_handler() {
  let fileInput = this.container.querySelector('input.ql-image[type=file]');

  if (fileInput == null) {
    fileInput = document.createElement('input');
    fileInput.setAttribute('type', 'file');
    fileInput.setAttribute('accept', 'image/png, image/gif, image/jpeg, image/bmp, image/x-icon');
    fileInput.classList.add('ql-image');
    fileInput.addEventListener('change', () => {
      const files = fileInput.files;
      const range = this.quill.getSelection(true);

      if (!files || !files.length) {
        console.log('No files selected');
        return;
      }

      const formData = new FormData();
      formData.append('image', files[0]);
      formData.append('strategy', 'article')

      console.log(formData.get('image'))

      this.quill.enable(false);

      let saveFile = $.ajax({
          url: '/api/file/upload2',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
          },
        })
        .then(response => {
          this.quill.enable(true);
          this.quill.editor.insertEmbed(range.index, 'image', response.url);
          this.quill.setSelection(range.index + 1, Quill.sources.SILENT);
          fileInput.value = '';
        })
        .catch(error => {
          console.log('quill image upload failed');
          console.log(error);
          this.quill.enable(true);
        });
    });
    this.container.appendChild(fileInput);
  }
  fileInput.click();
}

const toolbarOptions = {
  container: [
    [{ 'font': fonts }],
    [{ 'header': ['', 6, 5, 4, 3, 2, 1] }],
    [{ 'size': size }],
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'script': 'sub' }, { 'script': 'super' }],
    [{ 'indent': '-1' }, { 'indent': '+1' }],
    [{ 'direction': 'rtl' }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'align': [] }],
    ['link', 'image', 'video', 'formula'],
    ['clean'],
    ['emoji']
  ],
  handlers: {
    'emoji': function() {},
    'image': quill_img_handler
  }
}

const quill = new Quill('#full-editor .editor', {
  modules: {
    'syntax': true,
    'toolbar': toolbarOptions,
    'emoji-shortname': true,
    'emoji-toolbar': true,
    'imageResize': true,
    'imageDrop': true,
    'counter': {
      container: '#counter',
      unit: 'word'
    }
  },
  placeholder: 'Enter content...',
  theme: 'snow',
});
