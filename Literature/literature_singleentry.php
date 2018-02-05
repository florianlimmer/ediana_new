
<?php
session_start();
$benutzer = $_SESSION;
include "../log.inc.php";
include "../navbar.php"; //TODO Alle Links tot!
include "../begincontent.php";
include "lit_getExcerpts.php"; // Funktion zur Exzerpterzeugung

include "buildLitEntry.php"; // Funktion zur Literaturkonversion

$ID = $_GET["wpid"];

echo $_SESSION["Username"];

if(isset($_SESSION["Username"])) {

    echo"you're logged in";

}
else {}
?>

<!--<div class="upper_menu_int">
    <ul class="ul_upper">
        <a href="internal_wp_converter.php"><li class="li_upper">WP Converter</li></a>
        <a href="internal_excerpt.php"><li class="li_upper">Excerpt</li></a>
        <a href="internal_corpus_plus.php"><li class="li_upper">Corpus+</li></a>
        <a href="internal_literature_plus.php"><li class="li_upper">Literature+</li></a>
        <a href="internal_menu.php"><li class="li_upper">BACK</li></a>
    </ul>
    <div>
        <b>Navigation</b>
    </div>
</div> <!-- End "upper_menu_int" -->

<div class="lit_extended">
    <div>

        <?php

        $ref_order = mysqli_query($con, "SELECT * FROM `ref_center` WHERE ref_wpid = " . $ID . ";");
        $ref_code = mysqli_fetch_assoc($ref_order);


        echo "                
                    <h3 style=\"margin-top: 0.5rem; margin-bottom: 1rem;\" class=\"display-4\" >
               " . $ref_code["ref_sigle"]."</h3>";

        //Lit Entry Bibliography Style
        $output = SQL_reference_output($ID);

        echo "<div class='lit_output_1' title='Citation full'><div class='litplus_border_left'>" . $output . "</div></div>";

        //Lädt die Zusätzliche Information:
        $ref_center = mysqli_query($con, "SELECT * FROM `ref_center` WHERE ref_wpid = " . $ID . ";");
        $ref_center_array = mysqli_fetch_assoc($ref_center);
        ?>

        <div class="lit_output_3" id="1">
            <div onclick="literature_plus_expand_add()" style="cursor: pointer;">
                <div class="alert alert-info">
                    <h3 style="margin-top: 0.5rem; margin-bottom: 0.5rem;">Additional Information</h3>
                </div>
            <div>
                <table class = "table">

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


                    <tr ><td  style="color: grey;">Wordpress-ID</td><td  style="color: grey"><?php echo $ref_center_array["ref_wpid"]; ?></td></tr>
                    <tr ><td  style="color: grey">Ediana-ID</td><td  style="color: grey"><?php echo $ref_center_array["ref_id"]; ?></td></tr>
                    <tr ><td  style="color: grey">Link this page</td><td  style="color: grey"><?php echo $_SERVER['PHP_SELF']."?wpid=".$ID ?></td></tr>
                </table>
                <!--TODO make url visible for linkback to this site-->
            </div>
        </div>

            <div class="alert alert-info" >
                <h3 style="margin-top: 0.5rem;">Excerpt</h3>
            </div>



            <?php //Load Excerpts via method

            buildExcerpt ($ID, "inscription");
            buildExcerpt ($ID, "signs");
            buildExcerpt ($ID, "names");
            buildExcerpt ($ID, "lexemes");
            buildExcerpt ($ID, "suffixes");
            buildExcerpt ($ID, "endings");
            buildExcerpt ($ID, "sound_law");
            buildExcerpt ($ID, "reconstructions");
            ?>
            <div class="alert alert-info">
                <h3 style="margin-top: 0.5rem;">Full Text</h3>
            </div>

    </div> <!--TODO LogIn!-->



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

