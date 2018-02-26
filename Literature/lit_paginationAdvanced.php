<?php
include "../log.inc.php";
include "buildBibCard.php";

$offset = $_POST["offset"];
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

");

$number = mysqli_num_rows($ref_order);

$prev = $offset-60; //offset comes in 15s, so the previous button links back 60/15 = 4 pages
$next = $offset+60; //
$max = ceil($number/15); //the maximum number of pages is rounded up from how many times the offset can be
// fitted in the overall number of results

if ($number==0) {
    echo ""; //if the search yields no results, no pagination is displayed
}

else {
    echo "
        <nav aria-label=\"Page navigation top\">
        <ul class=\"pagination pagination-sm justify-content-end\">
            
            ";

    //previous-button functionality
    if (($prev/15)<0){ //if previous would link back beyond page 0, previous-button is disabled
        echo"
            <li class='page-item disabled'>
                <a class='page-link' aria-label=\"Previous\">
                    <span aria-hidden=\"true\">&laquo;</span>
                    <span class=\"sr-only\">Previous</span>
                </a>
            </li>";
    }
    else{
        echo"
             <li class='page-item'>   
                <a class=\"page-link\" href='javascript:advancedSearch($prev)' aria-label=\"Previous\">
                    <span aria-hidden=\"true\">&laquo;</span>
                    <span class=\"sr-only\">Previous</span>
                </a>
             </li>";
    }

    //pagination
    for ($i = 0; $i <= $number; $i += 15) {//iterates over the entire results lists in offsets of 15
        if($i >= $offset-45 && $i <= $offset+45){//displays pagination only for a range of +-45 around current offset
            if($i == $offset){//marks current offset button as active
                echo "<li class='page-item active'><a class='page-link' href='javascript:advancedSearch($i)'>";
                echo (($i/15) + 1);
                echo "</a></li>";
            }else{//all other buttons are displayed as-is
                echo "<li class='page-item'><a class='page-link' href='javascript:advancedSearch($i)'>";
                echo(($i / 15) + 1);
                echo "</a></li>";
            }
        }

    }

    //next-button functionality
    if (($next/15)>$max) {//if next would link further than $max number of pages, next-button is disabled
        echo "
            <li class='page-item disabled'>
                <a class=\"page-link\" href='javascript:advancedSearch($next)' aria-label=\"Next\">
                    <span aria-hidden=\"true\">&raquo;</span>
                    <span class=\"sr-only\">Next</span>
                </a>
            </li>";
    }else{
        echo "
            <li class=\"page-item\">
                <a class=\"page-link\" href='javascript:advancedSearch($next)' aria-label=\"Next\">
                    <span aria-hidden=\"true\">&raquo;</span>
                    <span class=\"sr-only\">Next</span>
                </a>
            </li>";
    }

    //displays overall number of pages
    echo"
            <li class='page-item'>
                <a class='page-link text-muted' aria-label='Next'>
        <span aria-hidden='true'>out of ".$max." pages</span>
                </a>
            </li>
        </ul></nav>
        ";

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";
}

?>