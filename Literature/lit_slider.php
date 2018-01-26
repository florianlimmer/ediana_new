<?php
$pdo = new PDO("mysql:host=localhost;dbname=dwaks", "root", "");

$sql_min_year = "SELECT MIN(ref_year_int) FROM ref_center";
foreach ($pdo ->query($sql_min_year) as $min){

}

$sql_max_year = "SELECT MAX(ref_year_int) FROM ref_center";
foreach ($pdo ->query($sql_max_year) as $max){

}

echo "<span style='display:none;' id='time_span' data-min='" . $min[0] . "' data-max='" . $max[0] . "'></span>";

?>

