<?php 
include "../log.inc.php";

$ID = $_POST["lit_id"];

$pattern = '<span class="o\_ref">[<id>' . $ID . '</id>]';

$lemma_id = mysqli_query($con,
		"SELECT *
		FROM(
		SELECT L_id FROM lem_hierluw_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_cuneluw_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_hitt_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_luwgloss_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_luwhitt_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_luwoasstra_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_luwotra_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_lycia_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_lycib_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_lydi_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_misc_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_pala_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_pisi_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_recon_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_side_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		UNION ALL
		SELECT L_id FROM lem_pie_text
		WHERE L_text LIKE '%" . $pattern . "%'
		GROUP BY L_id
		) AS a
		GROUP BY a.L_id
	"); 

while ($lemma_id_result = mysqli_fetch_assoc($lemma_id))
						{
	
						$L_id = $lemma_id_result["L_id"];
						
						$lemma_full = mysqli_query($con,
						"SELECT * FROM `lem_central_head`
						WHERE L_id = " . $L_id . " AND L_order = 1"
						);
						
						$lemma_full = mysqli_fetch_assoc($lemma_full);
						
	
						echo "<a href='http://www.dwaks.gwi.uni-muenchen.de/alt/dictionary.php?lemma=" . $L_id . "' target='_blank'><div class='single_form_proposal'>" . $lemma_full["L_lemma_full"] . "</div></a>";

						} // ENDE







?>

