$("#quickSearch").on( 'keyup change',


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

