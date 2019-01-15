(function() {
    quill.on("text-change", function(delta, source) {
        let html = quill.container.firstChild.innerHTML;
        $("#content-html").text(html);
    });

    // quill.getModule("toolbar").addHandler("image", function(a){
    //     console.log(a);
    // });

    window.onscroll = function() {addClassFixed()};
    var toolbar = document.getElementsByClassName('ql-toolbar')[0];
    var content = document.getElementById('content');
    var sticky = parseInt(content.offsetTop) + 120;

    function addClassFixed() {
      if (window.pageYOffset > sticky) {
        toolbar.classList.add("sticky");
      } else {
        toolbar.classList.remove("sticky");
      }
    }
})();