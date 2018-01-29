
$(".concordance_text").click(

	function(){


	lit_id = $(this).data("lit_id");


	$.ajax({
		
					type: "POST",
					url: "BIBLIOGRAPHY/PHP_elements/lemma_proposal.php",
					data: "lit_id=" +  lit_id,
					success: function(output)
					
						{
						$(".proposal_content").html(output);
						}
		
		})
});