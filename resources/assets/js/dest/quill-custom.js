import Quill from 'quill';
import { ImageResize } from 'quill-image-resize-module';
import { ImageDrop } from 'quill-image-drop-module';
import 'quill-emoji/dist/quill-emoji';

window.Quill = Quill;

const fonts = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu', 'font-test'];
const Font = Quill.import('formats/font');
Font.whitelist = fonts;

window.Quill.register(Font, true);
window.Quill.register({
    'modules/imageResize': ImageResize,
    'modules/imageDrop': ImageDrop,
});

const toolbarOptions = {
    container: [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],
        [{ 'indent': '-1' }, { 'indent': '+1' }],
        [{ 'direction': 'rtl' }],
        [{ 'header': [false, 6, 5, 4, 3, 2, 1] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': fonts }],
        [{ 'align': [] }],
        ['clean'],
        ['emoji'],
        ['link', 'image', 'video']
    ],
    handlers: {
        'emoji': function () {}
    }
}

const imageResize = {
    displaySize: true,
    parchment: Quill.import('parchment'),
    modules: [ 'Resize', 'DisplaySize', 'Toolbar' ],
    handleStyles: {
        backgroundColor: 'black',
        border: 'none',
        color: white
    },
    displayStyles: {
        backgroundColor: 'black',
        border: 'none',
        color: white
    }
}


const quill = new Quill('#full-container .editor', {
    // bounds: '#full-container .editor',
    modules: {
        'syntax': true,
        'toolbar': toolbarOptions,
        'emoji-toolbar': true,
        'emoji-shortname': true,
        'emoji-textarea': true,
        'imageDrop': true
        // 'imageResize': imageResize
    },
    placeholder: 'Enter content...',
    theme: 'snow',
});

export { quill };
