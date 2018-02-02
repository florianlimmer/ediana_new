$("#quickSearch").on('keyup change',


	function(e){


	
	e.preventDefault();

	input = $("#quickSearch").val();

	$.ajax({

					type: "POST",
					url: "Literature/lit_suggestions.php",
					data: "input=" + input,
					success: function(output)

						{
						$("#optionsQuickSearch").html(output);
						}

		})


});


function quickSearch(offset_value){

    searchInput = $("#quickSearch").val();
    offset= offset_value;

    $.ajax({

        type: "POST",
        url: "Literature/lit_quickSearchQuery.php",
        data: "input=" + searchInput
        + "&offset=" + offset,
        success: function(output) {
            $("#results").html(output);

        }
    })

    $.ajax({

        type: "POST",
        url: "Literature/lit_pagination.php",
        data: "input=" + searchInput,
        success: function(output){
            $("#pagination").html(output);
        }

    })


}

$("#searchButton").click(


    function(e){


        e.preventDefault();

        author = $("#inputAuthor").val();
        title = $("#inputTitle").val();

        if(document.getElementById('inputYear').disabled){
            min_year = $( "#slider-range" ).slider( "values", 0 );
            max_year = $( "#slider-range" ).slider( "values", 1 );
            year = 0;
        } else {
            year = $("#inputYear").val();
            min_year = 0;
            max_year = 0;
        }


        if($("#selectType" ).length != 0) {
            type = $("#selectType").val();
        } else {
            type = 0; //workaround... sonst ist type undefiniert und kann nicht übergeben werden
        }
        if($("#inputPublisher" ).length != 0) {
            publisher = $("#inputPublisher").val();
        }
        else {
            publisher = 0; //workaround...
        }
        if($("#inputJournal" ).length != 0) {
            journal = $("#inputJournal").val();
        }
        else {
            journal = 0; //workaround...
        }



            $.ajax({

                type: "POST",
                url: "Literature/lit_search.php",
                data: "author=" + author
                + "&year=" + year
                + "&min_year=" + min_year
                + "&max_year=" + max_year
                + "&title=" + title
                + "&journal=" + journal
                + "&publisher=" + publisher
                + "&type=" + type,
                success: function (output) {
                    $("#results").html(output);
                }

            })



    });



