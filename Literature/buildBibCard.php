<?php
//Diese Funktion holt Reference-Information aus der Datenbank und schreibt sie in die EDIANA-Datenbank

function SQL_reference_output ($ID, $counter)
{
//Einbindung Login

						include "log.inc.php";


//Definition der Wordpress-ID.
						
						$wp_id = $ID;

						//Zentralstring ermitteln:
						
						$center_1  = mysqli_query($con, "SELECT * FROM `ref_center` WHERE ref_wpid =  " . $wp_id . ";");
						$center_2 = mysqli_fetch_assoc($center_1);
						
//Erste DIV und Link öffnen.

$online_text = "<div class='card' style='margin-bottom: 1rem;'> "; //href gegebenenfalls austauschen!


						//Sigle
						$online_text .= "<div class='card-header'><span class='sigle_lit_plus'>" . $center_2["ref_sigle"] . "</span></div><div class='card-body' data-lit_id='" . $wp_id . "'>";
						
						//Autoren herausholen:
						
						
						$authors = mysqli_query($con, "SELECT ref_firstname, ref_secondname, ref_order FROM `ref_authors` WHERE ref_wpid =  " . $wp_id . ";");
						
						while ($authors_result = mysqli_fetch_assoc($authors))
						{
	
						$online_text .= "<span class='authors_lit_plus'>" . $authors_result["ref_secondname"] . "</span>, " . $authors_result["ref_firstname"];
						
						if ($authors_result["ref_order"] < $center_2["ref_authors"])
						
							{
							$online_text .= " / ";
							} else { $online_text .= "";}

						} // ENDE: Autorenschleife

						
						//Jahreszahl:
						
						$online_text .= " (" . $center_2["ref_year"] . "): ";
						
						//Titel: 
						
						$online_text .= "<i>" . $center_2["ref_title"] . "</i>. ";
						
						//Untertitel;
						
						if ($center_2["ref_subtitle"] != "") {$online_text .= "<span class='subtitle_lit_plus'>" . $center_2["ref_subtitle"] . "</span>. ";}
						
						//Setzen des In:
						if ($center_2["ref_type"] == "journal article" || $center_2["ref_type"] == "volume article") {$online_text .= "In: ";}
						
						//Editoren:
						
						if ($center_2["ref_editors"] != 0)
						
						
						{
						
						
						$editors = mysqli_query($con, "SELECT ref_firstname, ref_secondname, ref_order FROM `ref_editors` WHERE ref_wpid =  " . $wp_id . ";");
						
						while ($editors_result = mysqli_fetch_assoc($editors))
						{
	
						$online_text .= "<span class='authors_lit_plus'>" . $editors_result["ref_secondname"] . "</span>, " . $editors_result["ref_firstname"];
						
						if ($editors_result["ref_order"] < $center_2["ref_editors"])
						
							{
							$online_text .= " / ";
							} else { $online_text .= "";}

						} // ENDE: Editorenschleife
						
						$online_text .= " (ed.): ";
						
						}
						
						//Journal / Volume - Title
						
						if ($center_2["ref_title_jv"] != "") {$online_text .= "<span class='title_lit_plus'>" . $center_2["ref_title_jv"] . "</span>";} //Hier Probleme mit der Punktsetzung und der ref_number !!!!!
						
						if ($center_2["ref_shortcut_jv"] != "" && $center_2["ref_title_jv"] != "") {$online_text .= " ";}
						
						//Journal / Volume - Shortcut
						
						if ($center_2["ref_shortcut_jv"] != "") {$online_text .= "[" . $center_2["ref_shortcut_jv"] . "] ";}
						
						//Series
						
						if ($center_2["ref_series"] != "" && $center_2["ref_title_jv"] != "") {$online_text .= ". ";}
						
						if ($center_2["ref_series"] != "") {$online_text .= $center_2["ref_series"] . "";} //Hier Probleme mit der Punktsetzung und der ref_number !!!!!
						
						
						if ($center_2["ref_number"] != "" && $center_2["ref_title_jv"] != "") {$online_text .= " ";} else 
						
						if ($center_2["ref_number"] != "" && $center_2["ref_shortcut_jv"] != "") {$online_text .= " ";} else
						
						if ($center_2["ref_number"] != "" && $center_2["ref_series"] != "") {$online_text .= " ";}

						else  {$online_text .= ". ";}
						
						
						//Seriennummer.
						
						if ($center_2["ref_number"] != "") {$online_text .= "" . $center_2["ref_number"] . ". ";} //Hier Probleme mit der Punktsetzung und der ref_number !!!!!
						
						//ref_locations:
						
						if ($center_2["ref_locations"] != 0)
						
						{
						
					
						$locations = mysqli_query($con, "SELECT * FROM `ref_locations` WHERE ref_wpid =  " . $wp_id . ";");
						
						while ($locations_result = mysqli_fetch_assoc($locations))
						{
	
						$online_text .= $locations_result["ref_location"];
						
						if ($locations_result["ref_order"] < $center_2["ref_locations"])
						
							{
							$online_text .= " / ";
							} else { $online_text .= ": ";}

						} // ENDE: Editorenschleife
						
						}
						
						//ref_companies:
						
						if ($center_2["ref_companies"] != 0)
						
						{
						
					
						$companies = mysqli_query($con, "SELECT * FROM `ref_companies` WHERE ref_wpid =  " . $wp_id . ";");
						
						while ($companies_result = mysqli_fetch_assoc($companies))
						{
	
						$online_text .= $companies_result["ref_company"];
						
						if ($companies_result["ref_order"] < $center_2["ref_companies"])
						
							{
							$online_text .= " / ";
							} else { $online_text .= ". ";}

						} // ENDE: Editorenschleife
						
						}
						//Seiten
						
						if ($center_2["ref_pages"] != "") {$online_text .= "" . $center_2["ref_pages"] . ". ";}
						
$number = (string) $counter;
$online_text .= "
    <div id='exampleAccordion$number' class='collapse' role='tabpanel'>
    <hr>
    <h6 class=\"card-subtitle mb-2 text-muted\">Referenced Lemmata</h6>
   <div>
   
   <div id='proposal_content$number'></div>
   
  </div>
  
    </ul>
    </div>
</div>
	<div class=\"card-footer text-muted \">
    <ul class=\"nav nav-pills card-header-pills pull-right\">
    <li class='nav-item'>";

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

    if (mysqli_num_rows($lemma_id)==0) {
        $online_text .= "
    <a  class='nav-link lemma disabled' data-toggle='collapse' id='lemma_nav' data-lit_id ='" . $ID . "' data-switch = 'off' data-parent='#results'
    href='#exampleAccordion$number' role='button'  aria-expanded='true' aria-controls='exampleAccordion$number'> 
                            <i class=\"fa fa-info-circle\"></i> Referenced Lemmata</a>";
    }
    else{
        $online_text .= "
    <a  class='nav-link lemma' data-toggle='collapse' id='lemma_nav' data-lit_id ='" . $ID . "' data-switch = 'off' data-parent='#results'
    href='#exampleAccordion$number' role='button' onclick='con_lemmaProposal($ID, $number)'  aria-expanded='true' aria-controls='exampleAccordion$number'> 
                            <i class=\"fa fa-info-circle\"></i> Referenced Lemmata</a>";
	}

    $online_text .= "
       </li>
      <li class=\"nav-item\">
        <a href='literature_singleentry.php?wpid=".$wp_id."' class=\"nav-link nav-link\" target='_blank' ><i class=\"fa fa-arrow-circle-right\"></i> Full Bibliography Entry</a>
      </li>
    </ul>

  </div>
  
  
</div><!-- Card Ende-->

";
						
						$deletion_1 = array(". .", " :", " </span>,", "?</span>.", "<b>", "</b>", " </span>.", " .", "<br />");
						$deletion_2 = array(".", ":", "</span>,", "?</span>", "", "", "</span>.",  ".", "");
						
						$online_text = str_replace($deletion_1, $deletion_2, $online_text);
						
						
						$result = $online_text;
						
						
						/*
						mysqli_query($con, "INSERT INTO `dwaks`.`ref_complete` (`ref_wpid`, `full_ref`) VALUES ('". $ID . "', \"" . $result. "\");");
						*/
						
												
						return $result;


} // ENDE: function SQL_reference_output






?>



