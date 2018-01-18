<?php
include "../log.inc.php";
include "buildBibCard.php";

$author = $_POST["author"];
$title = $_POST["title"];
$year = $_POST["year"];
$journal = $_POST["journal"];
$type = $_POST["type"];
$publisher = $_POST["publisher"];


    $ref_order = mysqli_query($con, "

SELECT ref_center.ref_wpid FROM `ref_authors` JOIN `ref_center` ON 			ref_authors.ref_wpid = ref_center.ref_wpid
WHERE ref_authors.ref_secondname LIKE '%" . $author . "%'
AND ref_center.ref_year LIKE '%" . $year . "%'
AND ref_center.ref_title LIKE '%" . $title . "%'
GROUP BY ref_center.ref_wpid
LIMIT 25

");


    while ($order = mysqli_fetch_assoc($ref_order))
    {

        $output = SQL_reference_output ($order["ref_wpid"]);



        echo $output;
    }

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";


?>
