function SearchAuthor() {
    this.init = function() {
        this.search();
    };

    this.search = function() {
        $('#submit').click(function(event) {
            event.preventDefault();
            let text = $('#name').val().replace(/\s\s+/g, ' ');

            if (text != '' && text != ' ') {
                $.ajax({
                        url: 'all-auther/search',
                        type: 'GET',
                        data: {
                            'data': text
                        },
                        dataType: 'JSON',
                    })

                    .done(function(data) {
                        $('#authors').html(data.html);
                    })
            }
        });
    }
}
let Search = new SearchAuthor();

Search.init();
