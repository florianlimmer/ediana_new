$("#lit_author, #lit_year, #lit_title, #lit_J_V, #lit_sigle, #lit_limit").on( 'keyup change',


    function(e){

        e.preventDefault();

        lit_author = $("#lit_author").val();
        lit_year = $("#lit_year").val();
        lit_title = $("#lit_title").val();
        if($("#inputPublisher" ).length == 0) {

        }
        lit_J_V = $("#lit_J_V").val();
        lit_sigle = $("#lit_sigle").val();
        lit_limit = $("#lit_limit").val();

        if (lit_limit == ""){lit_limit = 25}


        $.ajax({

            type: "POST",
            url: "BIBLIOGRAPHY/PHP_elements/lit_search.php",
            data: "author=" + lit_author
            + "&year=" + lit_year
            + "&title=" + lit_title
            + "&journal=" + lit_J_V
            + "&limit=" + lit_limit
            + "&sigle=" + lit_sigle,
            success: function(output)

            {
                $(".corpus_text_ext").html(output);
            }

        })


    });