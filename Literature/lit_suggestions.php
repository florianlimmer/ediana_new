<?php
include"../log.inc.php";
//include "buildBibCard.php";

$input = $_POST["input"];



if(strlen($input) >= 3)
{
$ref_order = mysqli_query($con, "

SELECT DISTINCT ref_secondname AS output, 'search_author' AS search_type FROM `ref_authors`
WHERE ref_secondname LIKE '%" . $input . "%'
UNION
SELECT DISTINCT ref_title AS output, 'search_title' AS search_type FROM `ref_center`
WHERE ref_title LIKE '%" . $input . "%' LIMIT 25"

);
    while ($order = mysqli_fetch_assoc($ref_order)) {

    		echo "<option value='";
    		echo $order ["output"];
    		echo "'>";

        if ($order ["search_type"] == "search_author"){
            echo "(Autorennachname) </option>";
        }
            else{
                echo "</option>";
            }

    }

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";

//echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";
}

?>
