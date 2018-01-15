<?php 
include "log.inc.php";
include "ref_function.inc.php";

$author = $_POST["author"];
$title = $_POST["title"];
$year = $_POST["year"];
$journal = $_POST["journal"];
$sigle = $_POST["sigle"];
$limit = $_POST["limit"];

if ($limit == "")
{
$limit = 25;
}

if(strlen($author) >= 3 || strlen($title) >= 3 || strlen($year) >= 3 || strlen($journal) >= 3 || strlen($sigle) >= 3)
{
$ref_order = mysqli_query($con, "

SELECT ref_center.ref_wpid FROM `ref_authors` JOIN `ref_center` ON 			ref_authors.ref_wpid = ref_center.ref_wpid
WHERE ref_authors.ref_secondname LIKE '%" . $author . "%'
AND ref_center.ref_year LIKE '%" . $year . "%'
AND ref_center.ref_title LIKE '%" . $title . "%'
AND ref_center.ref_title_jv LIKE '%" . $journal . "%'
AND ref_center.ref_sigle LIKE '%" . $sigle . "%'
GROUP BY ref_center.ref_wpid


LIMIT " . $limit . "
;");


while ($order = mysqli_fetch_assoc($ref_order))
						{
						
						$output = SQL_reference_output ($order["ref_wpid"]);	
						
						echo $output;
						}
						
echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";
}

?>
