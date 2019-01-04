(function() {
    $(document).ready(function() {
        var fonts = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
        var Font = Quill.import('formats/font');
        Font.whitelist = fonts;
        Quill.register(Font, true);

        var toolbarOptions = [
          [{ 'font': fonts }],
          [{'header': [false, 6, 5, 4, 3, 2, 1]}],
          ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
          ['blockquote', 'code-block'],
          [{'list': 'ordered'}, {'list': 'bullet'}],
          [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
          [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
          [{'color': []}, {'background': []}],          // dropdown with defaults from theme
          [ 'direction', { 'align': [] }],
          [ 'link', 'image', 'video', 'formula' ],
          ['clean']                             // remove formatting button,
      ];

        var fullEditor = new Quill('#full-container .editor', {
            bounds: '#full-container .editor',
            modules: {
                'syntax': true,
                'toolbar': toolbarOptions
            },
            theme: 'snow'
        });
    });
})();
