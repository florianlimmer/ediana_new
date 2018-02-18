<?php
$ID = $_GET["wpid"];
session_start();
$benutzer = $_SESSION;
include "../log.inc.php";
include "../navbar.php"; //TODO Alle Links tot!
include "lit_getExcerpts.php"; // Funktion zur Exzerpterzeugung
include "buildLitEntry.php"; // Funktion zur Literaturkonversion
?>
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<style>
    /*TODO match colour (also with navpills below) */
    .nav-pills > li > a.active {
        background-color: #491217!important;
        color: #FFFFFF;
    }



    .nav-pills > li > a {
        color: #ffffff;!important;
    }

    .nav-pills > a.active {
        background-color: #491217!important;
        color: #FFFFFF;
    }

    .nav-pills > a {
        color: #491217;!important;
    }

</style>
<?php

$ref_order = mysqli_query($con, "SELECT * FROM `ref_center` WHERE ref_wpid = " . $ID . ";");
$ref_code = mysqli_fetch_assoc($ref_order);


echo "     <div class=\"jumbotron jumbotron-fluid\" style=\"margin-top: -16px;\">
                <div class=\"container\">
                    <h1 class=\"display-3\">
               " . $ref_code["ref_sigle"]."</h1>";

//Lit Entry Bibliography Style
$output = SQL_reference_output($ID);
echo $output;

//Navigation Pills
//TODO Color nav pills
echo' 
<div class="container">
 <ul class="nav nav-pills red" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#addinfo" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-arrow-down"></i> <b>Additional Information</b></a>
            </li>
            <li class="nav-item">';

//if no excerpts are available for that lit entry, the excerpt tab is disabled
            if(getAllExcerpts($ID)!= true){
                echo "<a class=\"nav-link disabled\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#excerpts\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\"><b>Excerpts</b></a>";
            }else{
                echo "<a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#excerpts\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\"><i class=\"fa fa-arrow-down\"></i> <b>Excerpts</b></a>";
            }

echo'
                </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="contact-tab" data-toggle="tab" href="#fulltext" role="tab" aria-controls="contact" aria-selected="false"><b>Full Text</b></a>
            </li>
        </ul>  
        </div> 
    </div>
</div>';

            ?>





<?php
//echo $_SESSION["Username"];

if(isset($_SESSION["Username"])) {

    echo"you're logged in";

}
else {}
?>

<!-- Lädt tatsächliche Inhalte -->



<div class="lit_extended">


        <?php

        //Lädt die Zusätzliche Information:
        $ref_center = mysqli_query($con, "SELECT * FROM `ref_center` WHERE ref_wpid = " . $ID . ";");
        $ref_center_array = mysqli_fetch_assoc($ref_center);
        ?>

        <!-- Tabs der Einzelnen Inhalte -->
        <div class="tab-content" id="myTabContent" style="margin-top: 1rem;">

            <!-- Tab Allgemeine Infos -->
            <div class="tab-pane fade show active" id="addinfo" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <div class="content">

                        <table class="table table-striped">

                            <tr><td><b>Sigle</b></td><td ><?php echo $ref_center_array["ref_sigle"]; ?></td></tr>
                            <tr><td><b>Year</b></td><td ><?php echo $ref_center_array["ref_year"]; ?></td></tr>
                            <tr><td><b>Number Authors</b></td><td ><?php echo $ref_center_array["ref_authors"]; ?></td></tr>

                            <?php // Authorenschleife

                            $ref_authors = mysqli_query($con, "SELECT * FROM `ref_authors` WHERE ref_wpid = " . $ID . ";");

                            $i = 0;

                            while ($author = mysqli_fetch_assoc($ref_authors))
                            {

                                $i++;

                                echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Author [" . $i . "]</b></td><td class = 'ait_td'>" . $author["ref_firstname"] . " " . $author["ref_secondname"] ."</td></tr>";

                            }

                            if($ref_center_array["ref_editors"] != 0){
                                echo '<tr><td ><b>Number Editors</td></b><td>' . $ref_center_array["ref_editors"] . '</td></tr>';
                            }

                            // Editorenschleife

                            $ref_editors = mysqli_query($con, "SELECT * FROM `ref_editors` WHERE ref_wpid = " . $ID . ";");

                            $i = 0;

                            while ($editors = mysqli_fetch_assoc($ref_editors))
                            {

                                $i++;

                                echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Editor [" . $i . "]</b></td><td class = 'ait_td'>" . $editors["ref_firstname"] . " " . $editors["ref_secondname"] ."</td></tr>";

                            }

                            //Type, Title, Subtitle, etc.

                            if($ref_center_array["ref_type"] != ""){
                                echo '<tr><td ><b>Type</td></b><td>' . $ref_center_array["ref_type"] . '</td></tr>';
                            }


                            if($ref_center_array["ref_title"] != ""){
                                echo '<tr><td ><b>Title</td></b><td>' . $ref_center_array["ref_title"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_subtitle"] != ""){
                                echo '<tr><td ><b>Subtitle</td></b><td>' . $ref_center_array["ref_subtitle"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_series"] != ""){
                                echo '<tr><td ><b>Series</td></b><td>' . $ref_center_array["ref_series"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_title_jv"] != ""){
                                echo '<tr><td ><b>Title Journal / Volume</td></b><td>' . $ref_center_array["ref_title_jv"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_shortcut_jv"] != ""){
                                echo '<tr><td ><b>Title Shortcut</td></b><td>' . $ref_center_array["ref_shortcut_jv"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_locations"] != ""){
                                echo '<tr><td ><b>No. of Publishing Locations</td></b><td>' . $ref_center_array["ref_locations"] . '</td></tr>';
                            }

                            // Ortsschleife

                            $ref_loc = mysqli_query($con, "SELECT * FROM `ref_locations` WHERE ref_wpid = " . $ID . ";");

                            $i = 0;

                            while ($loc = mysqli_fetch_assoc($ref_loc))
                            {

                                $i++;

                                echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Location [" . $i . "]</b></td><td class = 'ait_td'>" . $loc["ref_location"] ."</td></tr>";

                            }



                            if($ref_center_array["ref_companies"] != ""){
                                echo '<tr><td ><b>No. of Publishing Companies</td></b><td>' . $ref_center_array["ref_companies"] . '</td></tr>';
                            }

                            // Verlagsschleife

                            $ref_comp = mysqli_query($con, "SELECT * FROM `ref_companies` WHERE ref_wpid = " . $ID . ";");

                            $i = 0;

                            while ($companies = mysqli_fetch_assoc($ref_comp))
                            {

                                $i++;

                                echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Company [" . $i . "]</b></td><td class = 'ait_td'>" . $companies["ref_company"] ."</td></tr>";

                            }

                            if($ref_center_array["ref_url"] != ""){
                                echo '<tr><td ><b>URL</td></b><td>' . $ref_center_array["ref_url"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_url_add"] != ""){
                                echo '<tr><td ><b>URL Addendum</td></b><td>' . $ref_center_array["ref_url_add"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_number"] != ""){
                                echo '<tr><td ><b>Number/Edition</td></b><td>' . $ref_center_array["ref_number"] . '</td></tr>';
                            }

                            if($ref_center_array["ref_pages"] != ""){
                                echo '<tr><td ><b>Pages</td></b><td>' . $ref_center_array["ref_pages"] . '</td></tr>';
                            }

                            ?>


                            <tr><td><b>Wordpress-ID</b></td><td><?php echo $ref_center_array["ref_wpid"]; ?></td></tr>
                            <tr><td><b>Ediana-ID</b></td><td><?php echo $ref_center_array["ref_id"]; ?></td></tr>
                            <tr><td><b>Link this page</b></td><td><?php echo $_SERVER['PHP_SELF']."?wpid=".$ID ?></td></tr>
                        </table>
                <!--TODO make url visible for linkback to this site-->
                    </div>
                </div>
            </div>


            <!-- Excerpt Tab -->

            <!--Excerpt Search Bar -->

            <div class="tab-pane fade" id="excerpts" role="tabpanel" aria-labelledby="profile-tab">
                <nav class="navbar navbar-light" style="background-color: #491217; margin-top: -50px;">
                    <div class="container justify-content-end">
                        <form class="form-inline">
                            <input class="form-control" style="width: 20rem;" id="excerptSearch" type="text" placeholder="Search through selected excerpt type" aria-label="Search">
                            <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>-->
                        </form>
                    </div>
                </nav>
                <div class="container">
                    <div class="content">

                        <div class="row" style="margin-top: 1rem;">
                            <div class="col-lg-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-inscr" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <?php buildExcerpt ($ID, "inscription");?>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-signs" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php buildExcerpt ($ID, "signs");?></div>
                                    <div class="tab-pane fade" id="v-pills-names" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php buildExcerpt ($ID, "names");?></div>
                                    <div class="tab-pane fade show active" id="v-pills-lexemes" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <?php buildExcerpt ($ID, "lexemes");?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-suffixes" role="tabpanel" aria-labelledby="v-pills-profile-tab"><?php buildExcerpt ($ID, "suffixes");?></div>
                                    <div class="tab-pane fade" id="v-pills-endings" role="tabpanel" aria-labelledby="v-pills-messages-tab"><?php buildExcerpt ($ID, "endings");?></div>
                                    <div class="tab-pane fade" id="v-pills-soundlaw" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?php buildExcerpt ($ID, "sound_law");?></div>
                                    <div class="tab-pane fade" id="v-pills-reconstr" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?php buildExcerpt ($ID, "reconstructions");?></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link <?php if(getNumber($ID, "inscription") == 0) {echo"disabled";} ?>" id="inscription" data-toggle="pill" href="#v-pills-inscr"
                                       role="tab" aria-controls="v-pills-home" aria-selected="true">Inscriptions <?php echo"(".getNumber($ID, "inscription").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "signs") == 0) {echo"disabled";} ?>" id="signs" data-toggle="pill" href="#v-pills-signs"
                                       role="tab" aria-controls="v-pills-home" aria-selected="true">Signs <?php echo"(".getNumber($ID, "signs").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "names") == 0) {echo"disabled";} ?>" id="names" data-toggle="pill" href="#v-pills-names"
                                       role="tab" aria-controls="v-pills-home" aria-selected="true">Names <?php echo"(".getNumber($ID, "names").")"; ?></a>
                                    <a class="nav-link active <?php if(getNumber($ID, "lexemes") == 0) {echo"disabled";} ?>" id="lexemes" data-toggle="pill" href="#v-pills-lexemes"
                                       role="tab" aria-controls="v-pills-home" aria-selected="true">Lexemes <?php echo"(".getNumber($ID, "lexemes").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "suffixes") == 0) {echo"disabled";} ?>" id="suffixes" data-toggle="pill" href="#v-pills-suffixes"
                                       role="tab" aria-controls="v-pills-home" aria-selected="true">Suffixes <?php echo"(".getNumber($ID, "suffixes").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "endings") == 0) {echo"disabled";} ?>" id="endings" data-toggle="pill" href="#v-pills-endings"
                                       role="tab" aria-controls="v-pills-profile" aria-selected="false">Endings <?php echo"(".getNumber($ID, "endings").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "sound_law") == 0) {echo"disabled";} ?>" id="sound_law" data-toggle="pill" href="#v-pills-soundlaw"
                                       role="tab" aria-controls="v-pills-messages" aria-selected="false">Sound Law <?php echo"(".getNumber($ID, "sound_law").")"; ?></a>
                                    <a class="nav-link <?php if(getNumber($ID, "reconstructions") == 0) {echo"disabled";} ?>" id="reconstructions" data-toggle="pill" href="#v-pills-reconstr"
                                       role="tab" aria-controls="v-pills-settings" aria-selected="false">Reconstructions <?php echo"(".getNumber($ID, "reconstructions").")"; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="fulltext" role="tabpanel" aria-labelledby="contact-tab">
                <div class="alert alert-info">
                    <h3 style="margin-top: 0.5rem;">Full Text</h3>
                </div>
            </div>
        </div>

        <!--Detailed Table -->

        <!-- old code <div class="lit_output_3" id="1">
            <div onclick="literature_plus_expand_add()" style="cursor: pointer;">

            <div>

            </div>
        </div>-->



<!--TODO LogIn!-->



        <!--<div class="lit_output_5" id="3">
            <div style="cursor: pointer;" onclick="literature_plus_expand_fulltext()">

            </div>
            <div style="text-align: center;">
                <object data="LITERATURE/<?php echo $ref_center_array["ref_wpid"]; ?>.pdf" type="application/pdf" class="litplus_pdf"></object>
            </div>
            <br/>
        </div>-->
</div> <!-- End "lit_extended" -->









        <!-- LOGIN FORM

        <div class="login_div">


            <span style="margin-left: -5%;">Internal area, access denied...</span>
            <form autocomplete="off" method="post" action="login.php">
                <input type="text" class="login_field" name="user" placeholder="User" /><br/>
                <input type="password" class="login_field" name="password" placeholder="Password" /><br/>
                <input type="submit" class="login_button" value="Login" class="pure-button" /><br/>
                <input type="reset" class="login_button" value="Reset" /><br/>
            </form>



        </div>-->





    <?php
//} ?>

<?php include "../footer.php"; ?>
<script>

</script>
<script src="js/singleEntry_functions.js"></script>

