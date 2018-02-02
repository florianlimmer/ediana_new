

function con_lemmaProposal(ID, counter){


    var name = "proposal_content" + toString(counter);
    lit_id = ID;

        $.ajax({
            type: "POST",
            url: "Literature/lemma_proposal.php",
            data: "lit_id=" + lit_id,
            context: this,
            success: function (output) {
                document.getElementById(name).html(output);
            }

        })};


