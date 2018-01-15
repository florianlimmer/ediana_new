


$("#quick").on( 'keyup change',


	function(e){
	
	e.preventDefault();

	lit_author = $("#lit_author").val();



	$.ajax({
		
					type: "POST",
					url: "../lit_search.php",
					data: "author=" + lit_author,
					success: function(output)
					
						{
						$("#results").html(output);
						}
		
		})


});