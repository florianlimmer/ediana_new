<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
include "begincontent.php";


?>

    <h1 style="margin-top: 1rem;">Rieken, Elisabeth (2010)</h1> <!--TODO Zentrierung Karten handy-->
    <p>
        Rieken, Elisabeth (2010): Das Zeichen <t�> im Hieroglyphen-Luwischen. In: Cohen, Yoram / Gilan, Amir / Miller, Jared L. (ed.): Pax Hethitica. Studies on the Hittites and their Neighbours in Honour of Itamar Singer. Studien zu den Bo?azk�y-Texten 51. Wiesbaden: Harrassowitz. 301-310.
    </p>
    <div class="alert alert-info">
        <h3 style="margin-bottom:20px; margin-top: 20px;">General Informaton</h3>
    </div>

<?php

?>
    <div class="row large-centered">
        <h1>World of Warcraft characters. <small>Mine and my brothers, we share.</small></h1>
    </div>
    <div class="row large-centered">
        <input type="text" id="search" placeholder="Type to search..." />
        <table id="table" width="100%">
            <thead>
            <tr>
                <th>Character name</th>
                <th>Class</th>
                <th>Realm</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Benjamin.</td>
                <td>Rogue.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Cachoito.</td>
                <td>Hunter.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Contemplario.</td>
                <td>Paladin.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Elthron.</td>
                <td>Death Knight.</td>
                <td>Agamaggan ES.</td>
            </tr>
            <tr>
                <td>Giloh.</td>
                <td>Priest.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Kitialamok.</td>
                <td>Warrior.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Magustroll.</td>
                <td>Mage.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Marselus.</td>
                <td>Mage.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Mistrala.</td>
                <td>Warrior.</td>
                <td>Uldum ES.</td>
            </tr>
            <tr>
                <td>Suavemente.</td>
                <td>Warrior.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Tittus.</td>
                <td>Monk.</td>
                <td>Agamaggan EN.</td>
            </tr>
            <tr>
                <td>Yarlokk.</td>
                <td>Warlock.</td>
                <td>Uldum ES.</td>
            </tr>
            </tbody>
        </table>
    </div>

<script>
    // Write on keyup event of keyword input element
    $("#search").keyup(function(){
        var searchText = $(this).val().toLowerCase();
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf(searchText) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });
</script>


<?php include "footer.php"; ?>