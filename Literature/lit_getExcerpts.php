<?php

function buildExcerpt ($ID, $excerptType)
{
    include "../log.inc.php";
    $wp_id = $ID;
    $type = $excerptType;


    $table ='exc_' . $excerptType;

    $count  = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `" . $table . "` WHERE ref_wpid = " . $ID . ";");
    $count_array = mysqli_fetch_assoc($count);
    echo "<div></div><div class=\"alert alert-secondary\">" . $type . " (" . $count_array["counter"] . ")</div>";
    //If-Abfrage
    if ($count_array["counter"] > 0){

        echo'
        
        <div>
                    <table class = "table">';

                        $full = mysqli_query($con, "SELECT * FROM `" . $table . "` WHERE ref_wpid = " . $ID . ";");
                        while ($rows = mysqli_fetch_assoc($full))
                        {

                            echo "<tr class = \'ait_tr\'><td class = \'ait_td\'><b><span class=\'titusspan\'>" . $rows["exc_form"] . "</span></b></td>";
                            echo "<td class = \'ait_td\'><i>" . $rows["exc_pages"] . "</i></td>";
                            echo "<td class = \'ait_td\'>" . $rows["exc_info"] . "</td></tr>";

                        }


        echo'</table>
                </div>
                </div><!--Enclosing div-->
        
        ';

    }
}

