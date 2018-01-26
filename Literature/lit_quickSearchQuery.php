<?php
include"../log.inc.php";
include "buildBibCard.php";

$input = $_POST["input"];

if(strlen($input) >= 3)
{
    $ref_order = mysqli_query($con, "

        SELECT ref_center.ref_wpid FROM `ref_authors` JOIN `ref_center` ON 	ref_authors.ref_wpid = ref_center.ref_wpid
        WHERE ref_authors.ref_secondname LIKE '%" . $input . "%'
        OR ref_center.ref_title_simplex LIKE '%" . $input . "%'
        GROUP BY ref_center.ref_wpid "
    );

    $i = 0;
    while ($order = mysqli_fetch_assoc($ref_order))
    {

        $output = SQL_reference_output ($order["ref_wpid"], $i);

        echo $output;
        $i++;
    }

    if (mysqli_num_rows($ref_order)==0) {
        echo "<span class=\"text-muted\"> No results found. </span>";
    }

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";
}

?>