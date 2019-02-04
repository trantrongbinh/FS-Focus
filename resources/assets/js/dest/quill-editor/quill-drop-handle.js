export default class ImageDrop {
    /**
     * Instantiate the module given a quill instance and any options
     * @param {Quill} quill
     * @param {Object} options
     */
    constructor(quill, options = {}) {
        // save the quill reference
        this.quill = quill;
        // bind handlers to this instance
        this.handleDrop = this.handleDrop.bind(this);
        this.handlePaste = this.handlePaste.bind(this);
        // listen for drop and paste events
        this.quill.root.addEventListener('drop', this.handleDrop, false);
        this.quill.root.addEventListener('paste', this.handlePaste, false);
    }
    /**
     * Handler for drop event to read dropped files from evt.dataTransfer
     * @param {Event} evt
     */
    handleDrop(evt) {
        evt.preventDefault();
        if (evt.dataTransfer && evt.dataTransfer.files && evt.dataTransfer.files.length) {
            this.readFiles(evt.dataTransfer.files, this.handleSendFileToServer.bind(this));
        }
    }
    /**
     * Handler for paste event to read pasted files from evt.clipboardData
     * @param {Event} evt
     */
    handlePaste(evt) {
        if (evt.clipboardData && evt.clipboardData.items && evt.clipboardData.items.length) {
            console.log(evt.clipboardData.items);
            this.readFiles(evt.clipboardData.items, dataUrl => {
                const selection = this.quill.getSelection();
                if (selection) {
                    // we must be in a browser that supports pasting (like Firefox)
                    // so it has already been placed into the editor
                } else {
                    // otherwise we wait until after the paste when this.quill.getSelection()
                    // will return a valid index
                    setTimeout(() => this.insert(dataUrl), 0);
                }
            });
        }
    }

    /**
     * Send the image to server
     * @param {File[]} files One or more File objects
     */
    handleSendFileToServer(files) {
        const formData = new FormData();
        formData.append('image', files);
        formData.append('strategy', 'article')

        let sendFile = $.ajax({
                url: '/api/file/upload',
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
                this.insert(response.url);
            })
            .catch(error => {
                console.log('quill image upload failed');
                console.log(error);
            });
    }
    /**
     * Insert the image into the document at the current cursor position
     * @param {String} dataUrl The base64-encoded image URI
     */
    insert(dataUrl) {
        const index = (this.quill.getSelection() || {}).index || this.quill.getLength();
        this.quill.insertEmbed(index, 'image', dataUrl, 'user');
    }
    /**
     * Extract image URIs a list of files from evt.dataTransfer or evt.clipboardData
     * @param {File[]} files One or more File objects
     * @param {Function} callback A function to send each data URI to
     */
    readFiles(files, callback) {
        // check each file for an image
        [].forEach.call(files, file => {
            if (!file.type.match(/^image\/(gif|jpe?g|a?png|svg|webp|bmp|vnd\.microsoft\.icon)/i)) {
                // file is not an image
                // Note that some file formats such as psd start with image/* but are not readable
                return;
            }

            callback(files[0]);
            // // set up file reader
            // const reader = new FileReader();
            // reader.onload = (evt) => {
            //     callback(evt.target.result);
            // };
            // // read the clipboard item or file
            // const blob = file.getAsFile ? file.getAsFile() : file;
            // if (blob instanceof Blob) {
            //     reader.readAsDataURL(blob);
            // }
        });
    }
}
