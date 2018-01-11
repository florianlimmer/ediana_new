<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
?>
    <div style="background-color: #dcdcdc; margin-top: -16px; height: 40 rem;">
        <div class="container">
            suchleiste
        </div>
    </div>
<?php include "begincontent.php";?>
    <h1>Impressum</h1>
    <div class="row">
        <div class="col-lg">
            <h3>Anschrift</h3>
            <p>Ludwig-Maximilians-Universität München<br/>
                Geschwister-Scholl-Platz 1<br/>
                80539 München<br/>
                <br/>
                Telefon: +49 (0) 89 / 2180 - 0<br/>
                <br/>
                Die Ludwig-Maximilians-Universität München ist eine Körperschaft des Öffentlichen Rechts. Sie wird durch den Präsidenten Prof. Dr. Bernd Huber gesetzlich vertreten.<br/>
            </p>
            <h3>Zuständige Aufsichtsbehörde</h3>
            <p>Bayerisches Staatsministerium für Bildung und Kultus, Wissenschaft und Kunst<br/>
                80327 München<br/></p>
            <h3>Umsatzsteuer-Identifikationsnummer der LMU</h3>
            <p>Umsatzsteuer-Identifikationsnummer gemäß §27a Umsatzsteuergesetz: DE 811205325<br/></p>
        </div>
        <div class="col-lg">
            <h3>Verantwortlich für den Inhalt</h3>
            <p>Für die angebotenen Inhalte sind die jeweiligen Einrichtungen verantwortlich.<br/></p>
            <h3>Verantwortlich für die Umsetzung</h3>
            <p>Für die technische Realisierung sind die Webmaster der Einrichtungen verantwortlich.<br/></p>
            <h3>Freistellungserklärung</h3>
            <p>Die Angaben wurden nach bestem Wissen erstellt, Fehler können jedoch nicht mit letzter Sicherheit ausgeschlossen werden. Rechtlich verbindlich sind ausschließlich die Festlegungen in den einschlägigen Rechtsgrundlagen (Gesetze, Verordnungen, Satzungen).<br/></p>
        </div>
    </div>
<?php
include "footer.php";
?>