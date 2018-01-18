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

$("#quickSearchButton").click(


    function(e){

        e.preventDefault();

        searchInput = $("#quickSearch").val();

        $.ajax({

            type: "POST",
            url: "Literature/lit_quickSearchQuery.php",
            data: "input=" + searchInput,
            success: function(output)

            {
                $("#results").html(output);
            }

        })


    });

$("#searchButton").click(


    function(e){


        e.preventDefault();

        author = $("#inputAuthor").val();
        title = $("#inputTitle").val();
        year = $("#inputYear").val();

        if($("#selectType" ).length == 0) {
            type = $("#selectType").val();
        }
        if($("#inputPublisher" ).length == 0) {
            publisher = $("#inputPublisher").val();
        }
        if($("#inputJournal" ).length == 0) {
            journal = $("#inputJournal").val();
        }


        $.ajax({

            type: "POST",
            url: "Literature/lit_search.php",
            data: "author=" + author
            + "&year=" + year
            + "&title=" + title
            + "&journal=" + journal
            + "&type=" + type
            + "&publisher=" + publisher,
            success: function(output)

            {
                $("#results").html(output);
            }

        })


    });


