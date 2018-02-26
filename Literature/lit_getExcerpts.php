<?php

function buildExcerpt ($ID, $excerptType)
{
    include "../log.inc.php";
    $wp_id = $ID;
    $type = $excerptType;


    $table ='exc_' . $excerptType;

    $count  = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `" . $table . "` WHERE ref_wpid = " . $ID . ";");
    $count_array = mysqli_fetch_assoc($count);
    //If-Abfrage
    if ($count_array["counter"] > 0){

        //builds excerpt table
        echo"
        
        <div>
                    <table class='table' id='".$excerptType."'>
                             <thead class=\"thead \" id='".$excerptType."'>
                                <tr class='table-secondary'>
                                  <th scope=\"col\">Form</th>
                                  <th scope=\"col\">Pages</th>
                                  <th scope=\"col\">Information</th>
                                </tr>
                              </thead>
                              <tbody>";


        $full = mysqli_query($con, "SELECT * FROM `" . $table . "` WHERE ref_wpid = " . $ID . ";");
                        while ($rows = mysqli_fetch_assoc($full))
                        {

                            echo "<tr><td><b><span>" . $rows["exc_form"] . "</span></b></td>";
                            echo "<td><i>" . $rows["exc_pages"] . "</i></td>";
                            echo "<td>" . $rows["exc_info"] . "</td></tr>";

                        }


        echo'</tbody></table>
                </div><!--Enclosing div-->
                
        
        ';

    }
}

function getNumber($ID, $excerptType){ //returns true if excerpts exist for this category

    include "../log.inc.php";

    $table ='exc_' . $excerptType;

    $count  = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `" . $table . "` WHERE ref_wpid = " . $ID . ";");
    $count_array = mysqli_fetch_assoc($count);
    //If-Abfrage
    if ($count_array["counter"] > 0){
        return $count_array["counter"];
    }else{
        return 0;
    }


}

function getAllExcerpts($ID){//returns true if any excerpts exist

    $inscription = getNumber($ID, "inscription");
    $signs = getNumber($ID, "signs");
    $names = getNumber($ID, "names");
    $lexemes = getNumber($ID, "lexemes");
    $suffixes= getNumber($ID, "suffixes");
    $endings = getNumber($ID, "endings");
    $soundlaw= getNumber($ID, "sound_law");
    $reconstr = getNumber($ID, "reconstructions");


    if($inscription == 0
        && $signs == 0
        && $names == 0
        && $lexemes == 0
        && $suffixes == 0
        && $endings == 0
        && $soundlaw == 0
        && $reconstr == 0){
        return false;
    }
    else{
        return true;
    }



}
