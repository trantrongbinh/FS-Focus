(function() {
	hljs.initHighlightingOnLoad()
    //Custom for java
    hljs.registerLanguage("java",
      function(e){
        var r="([a-zA-Z]|\\.[a-zA-Z.])[a-zA-Z0-9._]*";
        return{
          c:[e.HCM,
            {cN:"fun-param",b:"([a-zA-Z]|\\.[a-zA-Z.])[a-zA-Z0-9._]*\\s+=\\s+",r:0},
            {cN:"pipe",b:"%>%",r:0},
            {cN:"assign",b:" <- ",r:0},
            {cN:"keyword",b:"([a-zA-Z]|\\.[a-zA-Z.])[a-zA-Z0-9._]*::",r:0},
      //      {cN:"dplyr",b:"tibble|mutate|select|filter|summari[sz]e|arrange|group_by",e:"[a-zA-Z0-9._]*",r:0},
            {b:r,l:r, k:
              {keyword:"function if in break next repeat else for return switch while try tryCatch stop warning require library attach detach source setMethod setGeneric setGroupGeneric setClass ...",
              literal:"NULL NA TRUE FALSE T F Inf NaN NA_integer_|10 NA_real_|10 NA_character_|10 NA_complex_|10"},
            r:0},
            {cN:"number",b:"0[xX][0-9a-fA-F]+[Li]?\\b",r:0},
            {cN:"number",b:"\\d+(?:[eE][+\\-]?\\d*)?L\\b",r:0},
            {cN:"number",b:"\\d+\\.(?!\\d)(?:i\\b)?",r:0},
            {cN:"number",b:"\\d+(?:\\.\\d*)?(?:[eE][+\\-]?\\d*)?i?\\b",r:0},
            {cN:"number",b:"\\.\\d+(?:[eE][+\\-]?\\d*)?i?\\b",r:0},
            {b:"`",e:"`",r:0},
            {cN:"string",c:[e.BE],v:[{b:'"',e:'"'},{b:"'",e:"'"}]}
          ]
        }
      }
    );
})();