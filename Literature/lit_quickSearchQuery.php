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
        GROUP BY ref_center.ref_year_int"
    );

    $i = 0;
    while ($order = mysqli_fetch_assoc($ref_order))
    {
        if($i <= 25){
            $output = SQL_reference_output ($order["ref_wpid"], $i);

            echo $output;
            $i++;
        }


    }

    if (mysqli_num_rows($ref_order)==0) {
        echo "<span class=\"text-muted\"> No results found. </span>";
    }

    $number = mysqli_num_rows($ref_order);

    echo"
    <nav aria-label=\"Page navigation top\">
    <ul class=\"pagination pagination-sm justify-content-end\">
        <li class=\"page-item\">
            <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                <span aria-hidden=\"true\">&laquo;</span>
                <span class=\"sr-only\">Previous</span>
            </a>
        </li>";

    for($i=1; $i<=$number/25; $i++){
        echo" <li class='page-item'><a class='page-link' href=''>";
        echo $i;
        echo"</a></li>";
    }
    echo"
        <li class=\"page-item\">
            <a class=\"page-link\" href=\"#\" aria-label=\"Next\">
    <span aria-hidden=\"true\">&raquo;</span>
                <span class=\"sr-only\">Next</span>
            </a>
        </li>
    </ul>
    </nav>";

    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";
}

?>