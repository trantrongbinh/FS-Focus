var toolbarOptions = [
    [{'font': []}],
    [{'header': [false, 6, 5, 4, 3, 2, 1]}],
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],
    [{'list': 'ordered'}, {'list': 'bullet'}],
    [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
    [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
    [{'color': []}, {'background': []}],          // dropdown with defaults from theme
    [{'align': []}],
    ['clean'],                             // remove formatting button,
    ['link', 'image']
];

var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow',
    placeholder: 'Content'
});
