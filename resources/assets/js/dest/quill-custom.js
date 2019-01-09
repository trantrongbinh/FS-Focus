const fonts = ['sofia', 'slabo'];
const Font = Quill.import('formats/font');
Font.whitelist = fonts;

class Counter {
  constructor(quill, options) {
    this.quill = quill;
    this.options = options;
    this.container = document.querySelector(options.container);
    quill.on('text-change', this.update.bind(this));
    this.update();  // Account for initial contents
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

Quill.register(Font, true);
Quill.register('modules/counter', Counter);

const toolbarOptions = {
    container: [
        [{ 'font': fonts }],
        [{ 'header': [false, 6, 5, 4, 3, 2, 1] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],
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
        'emoji': function () {}
    }
}


const quill = new Quill('#full-editor .editor', {
    bounds: '#full-editor .editor',
    modules: {
        'syntax': true,
        'toolbar': toolbarOptions,
        'emoji-shortname': true,
        'emoji-toolbar': true,
        'imageDrop': true,
        'imageResize': true,
        'counter': {
          container: '#counter',
          unit: 'word'
        }
    },
    placeholder: 'Enter content...',
    theme: 'snow',
});

