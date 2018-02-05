

function con_lemmaProposal(ID, counter){

    var name = "#proposal_content" + counter;
    lit_id = ID;

        $.ajax({
            type: "POST",
            url: "Literature/lemma_proposal.php",
            data: "lit_id=" + lit_id,
            context: this,
            success: function (output) {
                $(name).append(output);

            }

        })};
