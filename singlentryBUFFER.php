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
$test = $_GET["wpid"];

echo $test;
?>

    <table class="table">
        <tbody>

        <tr>
            <td>Author:</td>
            <td>Rieken, Elisabeth</td>
        </tr>

        <tr>
            <td>Jahr:</td>
            <td>2010</td>
        </tr>

        <tr>
            <td>Titel:</td>
            <td>Das Zeichen <t�> im Hieroglyphen-Luwischen</td>
        </tr>

        <tr>
            <td>Buchtitel:</td>
            <td> Pax Hethitica. Studies on the Hittites and their Neighbours in Honour of Itamar Singer.</td>
        </tr>
        <tr>
            <td>Author:</td>
            <td>Rieken, Elisabeth</td>
        </tr>

        <tr>
            <td>Jahr:</td>
            <td>2010</td>
        </tr>

        <tr>
            <td>Titel:</td>
            <td>Das Zeichen <t�> im Hieroglyphen-Luwischen</td>
        </tr>

        <tr>
            <td>Buchtitel:</td>
            <td> Pax Hethitica. Studies on the Hittites and their Neighbours in Honour of Itamar Singer.</td>
        </tr>

        <!--TODO Extrazeile Hyperlink-->


        </tbody>
    </table>

    <div class="alert alert-info">
        <a href> <h3 style="margin-bottom:20px; margin-top: 20px;">Read Excerpt</h3></a>
    </div>
    <div class="alert alert-secondary">
        <a href class="disabled"><h3 style="margin-bottom:20px; margin-top: 20px;">Read Full Version</h3></a>
    </div>


<?php include "footer.php"; ?>