<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";

include "header.php";

?>

<h1>Collection of Resources</h1> <!--TODO Zentrierung Karten handy-->
<?php




/**
 * Created by IntelliJ IDEA.
 * User: kathi
 * Date: 08.11.17
 * Time: 09:12
 */


// SQL query
$documentation = mysqli_query($con, "SELECT * FROM `documentation`");


    echo'
        
            <div class="alert alert-info">
                <h3 style="margin-bottom:20px;margin-top: 20px;">eDiAna Documentation</h3>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                         <th scope="col">Name</th>
                         <th scope="col">Language</th>
                         <th scope="col">File</th>
                     </tr>
                </thead>
                <tbody>
    

        
        ';

    while ($doc_mainbox = mysqli_fetch_assoc($documentation)) {

        echo '                            
                      
                        <tr>
                          <td>' . $doc_mainbox["name"] . '</td>
                          <td>' . $doc_mainbox["language"] . '</td>
                          <td><a href="' . $doc_mainbox["path"] . '" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></td>
                        </tr>


                                       
                                                
        ';/** End of echo */


    }/** End of while loop */

    echo '
                </tbody>
            </table>
    ';

// SQL query
$papers = mysqli_query($con, "SELECT * FROM `ediana_papers`");


echo'

            <div class="alert alert-info">
                <h3 style="margin-bottom:20px;margin-top: 20px;">eDiAna List of Talks/Papers</h3>
            </div>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Language</th>
                    <th scope="col">File</th>
                </tr>
                </thead>
                <tbody>



    ';
    $i = 1;
    while ($papers_mainbox = mysqli_fetch_assoc($papers)) {

    echo '

    <tr>
        <th scope="row">'. $i.'</th>
        <td>' . $papers_mainbox["date"] . '</td>
        <td>' . $papers_mainbox["author"] . ': <i>' . $papers_mainbox["title"] . ' ' . $papers_mainbox["conference"] . '. ' . $papers_mainbox["adress"] . '.</td>
        <td>' . $papers_mainbox["language"] . '</td>
        <td><a href="' . $papers_mainbox["path"] . '" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></td>
    </tr>




    ';/** End of echo */

    $i++;

    }/** End of while loop */

    echo '
    </tbody>
</table>
';

?>
    <div class="alert alert-info">
        <h3 style="margin-bottom:20px; margin-top: 20px;">eDiAna Associated Institutions</h3>
    </div>

<table class="table">
    <tbody>

    <tr>
        <td><i class="fa fa-external-link" aria-hidden="true"></i></td>
        <td><a href="http://www.itg.uni-muenchen.de/index.html" target="_blank">IT-Group for the Humanities (LMU)</a></td>
    </tr>

    <tr>
        <td><img src="images/Links/HPM.png" style="object-fit: cover; height:1rem;"></td>
        <td><a href="https://www.hethport.uni-wuerzburg.de/HPM/index-en.html" target="_blank">Hethitologie Portal Mainz: HPM</a></td>
    </tr>


    </tbody>
</table>


<?php include "footer.php"; ?>

