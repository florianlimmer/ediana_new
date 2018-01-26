<?php
include"../log.inc.php";
include "buildBibCard.php";

$min_year = $_POST["min_year"];
$max_year = $_POST["max_year"];


    $ref_order = mysqli_query($con, "

        SELECT ref_center.ref_wpid FROM ref_center WHERE ref_year_int BETWEEN $min_year AND $max_year 
        GROUP BY ref_center.ref_year_int "
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

?>