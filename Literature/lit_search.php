<?php
include "../log.inc.php";
include "buildBibCard.php";

$author = $_POST["author"];
$title = $_POST["title"];
$year = $_POST["year"];
$type = $_POST["type"];
$journal = $_POST["journal"];
$publisher = $_POST["publisher"];
if (!$type || $type == 'Choose...'){ //falls Type nicht erzeugt wurde oder auf default gesetzt ist
    $type = ''; //workaround...
}
if (!$journal){
    $journal = ''; //workaround...
}
if (!$publisher){
    $publisher = ''; //workaround...
}




$ref_order = mysqli_query($con, "

SELECT ref_center.ref_wpid FROM `ref_authors` JOIN `ref_center` ON 	ref_authors.ref_wpid = ref_center.ref_wpid
WHERE ref_authors.ref_secondname LIKE '%" . $author . "%'
AND ref_center.ref_year LIKE '%" . $year . "%'
AND ref_center.ref_type LIKE '%" . $type . "%'
AND ref_center.ref_title_jv LIKE '%" . $journal . "%'
AND ref_center.ref_title_simplex LIKE '%" . $title . "%'
GROUP BY ref_center.ref_wpid
LIMIT 25

");


while ($order = mysqli_fetch_assoc($ref_order))
{

    $output = SQL_reference_output ($order["ref_wpid"]);

    echo $output;
}

if (mysqli_num_rows($ref_order)==0) {
    echo "<span class=\"text-muted\"> No results found. </span>";
}

//echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";


?>
