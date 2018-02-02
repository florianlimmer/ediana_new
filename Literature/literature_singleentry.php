
<?php
session_start();
$benutzer = $_SESSION;
include "../log.inc.php";
include "../navbar.php"; //TODO Alle Links tot!
include "../begincontent.php";
include "lit_getExcerpts.php";

include "buildLitEntry.php"; // Funktion zur Literaturkonversion

$ID = $_GET["wpid"];

/*if(isset($_SESSION["Username"])) {
?>

<?php }
else {*/ ?>

<div style=""></div>

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
                    <h3 style=\"margin-top: 0.5rem;\" class=\"display-4\" >
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

                    <tr class = "ait_tr"><td class = "ait_td"><b>Sigle</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_sigle"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Year</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_year"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Number Authors</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_authors"]; ?></td></tr>

                    <?php // Authorenschleife

                    $ref_authors = mysqli_query($con, "SELECT * FROM `ref_authors` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($author = mysqli_fetch_assoc($ref_authors))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Author [" . $i . "]</b></td><td class = 'ait_td'>" . $author["ref_firstname"] . " " . $author["ref_secondname"] ."</td></tr>";

                    }

                    ?>


                    <tr class = "ait_tr"><td class = "ait_td"><b>Number Editors</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_editors"]; ?></td></tr>

                    <?php // Editorenschleife

                    $ref_editors = mysqli_query($con, "SELECT * FROM `ref_editors` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($editors = mysqli_fetch_assoc($ref_editors))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Editor [" . $i . "]</b></td><td class = 'ait_td'>" . $editors["ref_firstname"] . " " . $editors["ref_secondname"] ."</td></tr>";

                    }

                    ?>




                    <tr class = "ait_tr"><td class = "ait_td"><b>Publication Type</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_type"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Title</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_title"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Subtitle</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_subtitle"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Series</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_series"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Title Journal / Volume</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_title_jv"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Title Shortcut</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_shortcut_jv"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Number Publishing Locations</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_locations"]; ?></td></tr>

                    <?php // Ortsschleife

                    $ref_loc = mysqli_query($con, "SELECT * FROM `ref_locations` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($loc = mysqli_fetch_assoc($ref_loc))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Location [" . $i . "]</b></td><td class = 'ait_td'>" . $loc["ref_location"] ."</td></tr>";

                    }

                    ?>


                    <tr class = "ait_tr"><td class = "ait_td"><b>Number Publishing Companies</td><td class = "ait_td"><?php echo $ref_center_array["ref_companies"]; ?></td></tr>

                    <?php // Verlagsschleife

                    $ref_comp = mysqli_query($con, "SELECT * FROM `ref_companies` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($companies = mysqli_fetch_assoc($ref_comp))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'><b>Company [" . $i . "]</b></td><td class = 'ait_td'>" . $companies["ref_company"] ."</td></tr>";

                    }

                    ?>

                    <tr class = "ait_tr"><td class = "ait_td"><b>URL</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_url"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>URL Addendum</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_url_add"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Number / Edition</b></td><td class = "ait_td"><?php echo $ref_center_array["ref_number"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td"><b>Pages</td></b><td class = "ait_td"><?php echo $ref_center_array["ref_pages"]; ?></td></tr>


                    <tr class = "ait_tr"><td class = "ait_td" style="color: grey;">Wordpress-ID</td><td class = "ait_td" style="color: grey"><?php echo $ref_center_array["ref_wpid"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td" style="color: grey">Ediana-ID</td><td class = "ait_td" style="color: grey"><?php echo $ref_center_array["ref_id"]; ?></td></tr>
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

    </div>



    <div class="lit_output_5" id="3">
        <div style="cursor: pointer;" onclick="literature_plus_expand_fulltext()">

        </div>
        <div style="text-align: center;">
            <object data="LITERATURE/<?php echo $ref_center_array["ref_wpid"]; ?>.pdf" type="application/pdf" class="litplus_pdf"></object>
        </div>
        <br/>
    </div>

    </br>

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

