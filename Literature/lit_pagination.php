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
        GROUP BY ref_center.ref_year_int
        "
    );

    $number = mysqli_num_rows($ref_order);

    if ($number==0) {
        echo "";
    }
    else {
        echo "
        <nav aria-label=\"Page navigation top\">
        <ul class=\"pagination pagination-sm justify-content-end\">
            <li class=\"page-item\">
                <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                    <span aria-hidden=\"true\">&laquo;</span>
                    <span class=\"sr-only\">Previous</span>
                </a>
            </li>";


        for ($i = 0; $i <= $number; $i += 15) {
            echo "<li class='page-item'><a class='page-link' href='javascript:quickSearch($i)'>";
            echo (($i/15) + 1);
            echo "</a></li>";
        }


        echo "
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
}

?>