<?php




/**
 * Created by IntelliJ IDEA.
 * User: kathi
 * Date: 08.11.17
 * Time: 09:12
 */


// SQL query
$documentation = mysqli_query($con, "SELECT * FROM `documentation`");

// SQL query
$papers = mysqli_query($con, "SELECT * FROM `ediana_papers`");


echo'

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