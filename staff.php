<?php
		session_start();
		$benutzer = $_SESSION;
		include "log.inc.php";

        include "header.php";

?>

<h1>Staff</h1>
<?php




/**
 * Created by IntelliJ IDEA.
 * User: kathi
 * Date: 08.11.17
 * Time: 09:12
 */

$array = array(

    $team_right_1 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 1  ORDER BY `order` ASC;"),
    $team_right_2 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 2  ORDER BY `order` ASC;"),
    $team_right_3 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 3  ORDER BY `order` ASC;"),
    $team_right_4 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 4  ORDER BY `order` ASC;"),
    $team_right_5 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 5  ORDER BY `order` ASC;"),
    $team_left = mysqli_query($con, "SELECT * FROM `team_info` WHERE `Institution` NOT LIKE 'retired' ORDER BY `part`, `order`  ASC;"),
    $team_right_5 = mysqli_query($con, "SELECT * FROM `team_info` WHERE `part` = 5  ORDER BY `order` ASC;"),
);

// SQL query
$headings = mysqli_query($con, "SELECT * FROM `headings`");


$i = 0;
while($heading = mysqli_fetch_assoc($headings)) {



    echo'
        
            <h3 style="margin-bottom:20px;">' . $heading["name"] . '</h3>
            <div class="card-deck card-deck-md-2 card-deck-lg-3 justify-content-sm-center justify-content-md-start">
        
        ';

    while ($team_mainbox_a = mysqli_fetch_assoc($array[$i])) {

        echo '                            
                            
                                    <div class="card text-left" style="min-width: 16rem; max-width: 20rem; margin-bottom: 20px;">
                                      <img class="card-img-top" src="images/user_custom.svg" alt="Card image cap">
                                      <div class="card-body">
                                        <h4 class="card-title">' . $team_mainbox_a["Name"] . ' <small class="text-muted">' . $team_mainbox_a["sigle"] . '</small></h4>
                                        <h6 class="card-subtitle mb-2 text-muted">' . $team_mainbox_a["Institution"] . '</h6>
                                        <p class="card-text text-left" style="text-align: left;">' . $team_mainbox_a["Description"] . '</p>
                                      </div>
                                      <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <abbr title="Assignment"><img src="images/octicons-6.0.1/lib/svg/briefcase.svg"></abbr>
                                                </div>
                                                <div class="col-sm-10">
                                                ' . $team_mainbox_a["assignment"] . '
                                                </div>
                                            </div>
                                        </li>
                                                ';/** End of echo */

        if ($team_mainbox_a["contact"] != null)
                                                echo '
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-2"> 
                                                    <img src="images/octicons-6.0.1/lib/svg/mail.svg">
                                                </div>
                                                <div class="col-sm-10">
                                                    <a href="mailto:' . $team_mainbox_a["contact"] . '" target="_top">' . $team_mainbox_a["contact"] . '</a>
                                                </div>
                                            </div>
                                        </li>
                                        ';/** End of echo */

        echo'

                                        </ul>
                                    </div>
            ';


        }/** End of while loop */

    echo'
        
            </div>
        
        ';
    $i++;
}/** End of while loop */


?>

<?php include "footer.php"; ?>

