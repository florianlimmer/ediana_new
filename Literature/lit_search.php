<?php
include "../log.inc.php";
include "buildBibCard.php";

$author = $_POST["author"];
$title = $_POST["title"];
$year = $_POST["year"];
$type = $_POST["type"];
$journal = $_POST["journal"];
$publisher = $_POST["publisher"];
$min_year = $_POST["min_year"];
$max_year = $_POST["max_year"];

if (!$type || $type == 'Choose...'){ //falls Type nicht erzeugt wurde oder auf default gesetzt ist
    $type = ''; //workaround...
}
if (!$journal){
    $journal = ''; //workaround...
}
if (!$publisher){
    $publisher = ''; //workaround...
}
if (!$year){
    $year = ''; //workaround...
}

if (!$min_year){
    $min_year = 0; //workaround...
}

if (!$max_year){
    $max_year = 3000; //workaround...
}

$offset = $_POST["offset"];

//TODO integrate publisher
$ref_order = mysqli_query($con, "

SELECT ref_center.ref_wpid FROM `ref_authors`
        JOIN `ref_center` ON ref_authors.ref_wpid = ref_center.ref_wpid
        WHERE ref_authors.ref_secondname LIKE '%" . $author . "%'
        AND ref_center.ref_year LIKE '%" . $year . "%'
        AND ref_center.ref_type LIKE '%" . $type . "%'
        AND ref_year_int BETWEEN $min_year AND $max_year
        AND ref_center.ref_title_jv LIKE '%" . $journal . "%'
        AND ref_center.ref_title_simplex LIKE '%" . $title . "%'
        ORDER BY ref_center.ref_year_int DESC
        LIMIT 15
        OFFSET $offset

");

/*       WHERE ref_authors.ref_secondname LIKE '%'
        AND ref_center.ref_year LIKE '%'
        AND ref_companies.ref_company LIKE '%'
        AND ref_center.ref_type LIKE '%'
        AND ref_year_int BETWEEN 1850 AND 2017
        AND ref_center.ref_title_jv LIKE '%'
        AND ref_center.ref_title_simplex LIKE '%'
        ORDER BY ref_center.ref_year_int DESC */

$i = 0;
while ($order = mysqli_fetch_assoc($ref_order))
{

    $output = SQL_reference_output ($order["ref_wpid"], $i);

    echo $output;
    $i++;
}

if (mysqli_num_rows($ref_order)==0) {
    echo "<span class=\"text-muted\"> No results found.</span>";
}

//echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";


?>
