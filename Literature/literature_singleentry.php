
<?php
session_start();
$benutzer = $_SESSION;
include "../log.inc.php";
include "../navbar.php"; //TODO Alle Links tot!
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php
include "../begincontent.php";

include "buildLitEntry.php"; // Funktion zur Literaturkonversion

$ID = $_GET["wpid"];

/*if(isset($_SESSION["Username"])) {
?>

<?php }
else {*/ ?>

<div style="margin-top: 80px;"></div>

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


        echo "<h1 style='margin-bottom: 1rem;'>" . $ref_code["ref_sigle"]."</h1>";

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
                    <h3 style="margin-bottom:20px; margin-top: 20px;">Additional Information</h3></div>
            <div>
                <table class = "add_info_table">

                    <tr class = "ait_tr"><td class = "ait_td">Sigle</td><td class = "ait_td"><?php echo $ref_center_array["ref_sigle"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Year</td><td class = "ait_td"><?php echo $ref_center_array["ref_year"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Number Authors</td><td class = "ait_td"><?php echo $ref_center_array["ref_authors"]; ?></td></tr>

                    <?php // Authorenschleife

                    $ref_authors = mysqli_query($con, "SELECT * FROM `ref_authors` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($author = mysqli_fetch_assoc($ref_authors))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'>Author [" . $i . "]</td><td class = 'ait_td'>" . $author["ref_firstname"] . " " . $author["ref_secondname"] ."</td></tr>";

                    }

                    ?>


                    <tr class = "ait_tr"><td class = "ait_td">Number Editors</td><td class = "ait_td"><?php echo $ref_center_array["ref_editors"]; ?></td></tr>

                    <?php // Editorenschleife

                    $ref_editors = mysqli_query($con, "SELECT * FROM `ref_editors` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($editors = mysqli_fetch_assoc($ref_editors))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'>Editor [" . $i . "]</td><td class = 'ait_td'>" . $editors["ref_firstname"] . " " . $editors["ref_secondname"] ."</td></tr>";

                    }

                    ?>




                    <tr class = "ait_tr"><td class = "ait_td">Publication Type</td><td class = "ait_td"><?php echo $ref_center_array["ref_type"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Title</td><td class = "ait_td"><b><?php echo $ref_center_array["ref_title"]; ?></b></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Subtitle</td><td class = "ait_td"><?php echo $ref_center_array["ref_subtitle"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Series</td><td class = "ait_td"><?php echo $ref_center_array["ref_series"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Title Journal / Volume</td><td class = "ait_td"><?php echo $ref_center_array["ref_title_jv"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Title Shortcut</td><td class = "ait_td"><?php echo $ref_center_array["ref_shortcut_jv"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Number Publishing Locations</td><td class = "ait_td"><?php echo $ref_center_array["ref_locations"]; ?></td></tr>

                    <?php // Ortsschleife

                    $ref_loc = mysqli_query($con, "SELECT * FROM `ref_locations` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($loc = mysqli_fetch_assoc($ref_loc))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'>Location [" . $i . "]</td><td class = 'ait_td'>" . $loc["ref_location"] ."</td></tr>";

                    }

                    ?>


                    <tr class = "ait_tr"><td class = "ait_td">Number Publishing Companies</td><td class = "ait_td"><?php echo $ref_center_array["ref_companies"]; ?></td></tr>

                    <?php // Verlagsschleife

                    $ref_comp = mysqli_query($con, "SELECT * FROM `ref_companies` WHERE ref_wpid = " . $ID . ";");

                    $i = 0;

                    while ($companies = mysqli_fetch_assoc($ref_comp))
                    {

                        $i++;

                        echo "<tr class = 'ait_tr'><td class = 'ait_td'>Company [" . $i . "]</td><td class = 'ait_td'>" . $companies["ref_company"] ."</td></tr>";

                    }

                    ?>

                    <tr class = "ait_tr"><td class = "ait_td">URL</td><td class = "ait_td"><?php echo $ref_center_array["ref_url"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">URL Addendum</td><td class = "ait_td"><?php echo $ref_center_array["ref_url_add"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Number / Edition</td><td class = "ait_td"><?php echo $ref_center_array["ref_number"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td">Pages</td><td class = "ait_td"><?php echo $ref_center_array["ref_pages"]; ?></td></tr>


                    <tr class = "ait_tr"><td class = "ait_td" style="color: grey;">Wordpress-ID</td><td class = "ait_td" style="color: grey"><?php echo $ref_center_array["ref_wpid"]; ?></td></tr>
                    <tr class = "ait_tr"><td class = "ait_td" style="color: grey">Ediana-ID</td><td class = "ait_td" style="color: grey"><?php echo $ref_center_array["ref_id"]; ?></td></tr>
                </table>

            </div>



        </div>

        <div class="lit_output_4" id="2">
            <div style="cursor: pointer;" onclick="literature_plus_expand_excerpt()">
                <div class="alert alert-info">
                <h3 style="margin-bottom:20px; margin-top: 20px;">Excerpt</h3>
                </div>
            </div>
        </div>

            <div class="litplus_exc">
                <?php
                $inscr_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_inscription` WHERE ref_wpid = " . $ID . ";");
                $inscr_count_array = mysqli_fetch_assoc($inscr_count);
                echo "Inscription (" . $inscr_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Inscription</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $inscr_full = mysqli_query($con, "SELECT * FROM `exc_inscription` WHERE ref_wpid = " . $ID . ";");
                        while ($inscr = mysqli_fetch_assoc($inscr_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $inscr["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $inscr["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $inscr["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>
            </div>

            <div class="litplus_exc">
                <?php
                $signs_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_signs` WHERE ref_wpid = " . $ID . ";");
                $signs_count_array = mysqli_fetch_assoc($signs_count);
                echo "Signs (" . $signs_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Sign</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $signs_full = mysqli_query($con, "SELECT * FROM `exc_signs` WHERE ref_wpid = " . $ID . ";");
                        while ($signs = mysqli_fetch_assoc($signs_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $signs["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $signs["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $signs["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $names_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_names` WHERE ref_wpid = " . $ID . ";");
                $names_count_array = mysqli_fetch_assoc($names_count);
                echo "Names (" . $names_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Name</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $names_full = mysqli_query($con, "SELECT * FROM `exc_names` WHERE ref_wpid = " . $ID . ";");
                        while ($names = mysqli_fetch_assoc($names_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $names["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $names["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $names["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $lexemes_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_lexemes` WHERE ref_wpid = " . $ID . ";");
                $lexemes_count_array = mysqli_fetch_assoc($lexemes_count);
                echo "Lexemes (" . $lexemes_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>
                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Language</span></b></td><td class = "ait_td"><b>Form</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $lexemes_full = mysqli_query($con, "SELECT * FROM `exc_lexemes` WHERE ref_wpid = " . $ID . ";");
                        while ($lexemes = mysqli_fetch_assoc($lexemes_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><span class='titusspan'>" . $lexemes["exc_language"] . "</span></td>";
                            echo "<td class = 'ait_td'><b><span class='titusspan'>" . $lexemes["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $lexemes["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $lexemes["exc_info"] . "</td></tr>";

                        }
                        ?>


                    </table>
                </div>
            </div>

            <div class="litplus_exc">
                <?php
                $suffixes_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_suffixes` WHERE ref_wpid = " . $ID . ";");
                $suffixes_count_array = mysqli_fetch_assoc($suffixes_count);
                echo "Suffixes (" . $suffixes_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Suffix</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $suffixes_full = mysqli_query($con, "SELECT * FROM `exc_suffixes` WHERE ref_wpid = " . $ID . ";");
                        while ($suffixes = mysqli_fetch_assoc($suffixes_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $suffixes["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $suffixes["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $suffixes["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $endings_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_endings` WHERE ref_wpid = " . $ID . ";");
                $endings_count_array = mysqli_fetch_assoc($endings_count);
                echo "Endings (" . $endings_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Ending</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $endings_full = mysqli_query($con, "SELECT * FROM `exc_endings` WHERE ref_wpid = " . $ID . ";");
                        while ($endings = mysqli_fetch_assoc($endings_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $endings["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $endings["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $endings["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $keywords_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_keywords` WHERE ref_wpid = " . $ID . ";");
                $keywords_count_array = mysqli_fetch_assoc($keywords_count);
                echo "Keywords (" . $keywords_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Keyword</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $keywords_full = mysqli_query($con, "SELECT * FROM `exc_keywords` WHERE ref_wpid = " . $ID . ";");
                        while ($keywords = mysqli_fetch_assoc($keywords_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $keywords["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $keywords["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $keywords["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $sound_laws_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_sound_law` WHERE ref_wpid = " . $ID . ";");
                $sound_laws_count_array = mysqli_fetch_assoc($sound_laws_count);
                echo "Sound Laws (" . $sound_laws_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Sound Law</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $sound_laws_full = mysqli_query($con, "SELECT * FROM `exc_sound_law` WHERE ref_wpid = " . $ID . ";");
                        while ($sound_laws = mysqli_fetch_assoc($sound_laws_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $sound_laws["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $sound_laws["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $sound_laws["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

            <div class="litplus_exc">
                <?php
                $reconstructions_count = mysqli_query($con, "SELECT count(ref_id) AS counter FROM `exc_reconstructions` WHERE ref_wpid = " . $ID . ";");
                $reconstructions_count_array = mysqli_fetch_assoc($reconstructions_count);
                echo "Reconstructions (" . $reconstructions_count_array["counter"] . ")";
                ?>
                <hr class="litplus_exc_hr"/>

                <div>
                    <table class = "add_info_table">

                        <tr class = "ait_tr"><td class = "ait_td"><b>Reconstruction</span></b></td><td class = "ait_td"><b>Pages</b></td><td class = "ait_td"><b>Additional Information</b></td></tr>
                        <?php
                        $reconstructions_full = mysqli_query($con, "SELECT * FROM `exc_reconstructions` WHERE ref_wpid = " . $ID . ";");
                        while ($reconstructions = mysqli_fetch_assoc($reconstructions_full))
                        {

                            echo "<tr class = 'ait_tr'><td class = 'ait_td'><b><span class='titusspan'>" . $reconstructions["exc_form"] . "</span></b></td>";
                            echo "<td class = 'ait_td'><i>" . $reconstructions["exc_pages"] . "</i></td>";
                            echo "<td class = 'ait_td'>" . $reconstructions["exc_info"] . "</td></tr>";

                        }
                        ?>

                    </table>
                </div>

            </div>

        </div>
    </div>

    <div class="lit_output_5" id="3">
        <div style="cursor: pointer;" onclick="literature_plus_expand_fulltext()">

            <div class="alert alert-secondary">
                <h3 style="margin-bottom:20px; margin-top: 20px;">Full Text</h3>
            </div>
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

