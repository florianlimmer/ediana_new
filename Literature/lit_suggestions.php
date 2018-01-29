<?php
include"../log.inc.php";
//include "buildBibCard.php";

$input = $_POST["input"];



if(strlen($input) >= 3)
{
$ref_order = mysqli_query($con, "


SELECT ref_secondname AS output, GROUP_CONCAT(ref_wpid SEPARATOR ',') AS wp_id, 'search_author' AS search_type FROM `ref_authors`
WHERE ref_secondname LIKE '%" . $input . "%'
GROUP BY ref_secondname
UNION
SELECT ref_title_simplex AS output, GROUP_CONCAT(ref_wpid SEPARATOR ',') AS wp_id, 'search_title' AS search_type FROM `ref_center`
WHERE ref_title_simplex LIKE '%" . $input . "%' 
GROUP BY ref_title

LIMIT 25"



);
    while ($order = mysqli_fetch_assoc($ref_order)) {


    		echo "<option value='".$order ["output"]."'>";


        if ($order ["search_type"] == "search_author"){
            echo "(Author)</option>";
        }
            else{
                echo "</option>";
            }

    }

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";

//echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";

    //SELECT DISTINCT ref_secondname AS output, 'search_author' AS search_type FROM `ref_authors`
    //WHERE ref_secondname LIKE '%" . $input . "%'
    //UNION
    //SELECT DISTINCT ref_title AS output, 'search_title' AS search_type FROM `ref_center`
    //WHERE ref_title LIKE '%" . $input . "%' LIMIT 25"
}

?>

