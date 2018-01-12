<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
?>
    <div style="background-color: #f8f9fa; margin-top: -16px; min-height: 4rem; margin-bottom: 1rem;">
        <div class="container" style="padding-top: 1rem;">


            <div class="form-group row">
                <div class="col-9">
                    <input class="form-control form-control" type="text" placeholder="Quick search">
                </div>
                <div class="col-3">
                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <label for="colFormLabelSm" class="col-sm col-form-label col-form-label">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            advanced search
                        </label>
                    </a>
                </div>
            </div>


                <!--Collapse class="collapse" id="collapseExample" -->
            <div  style="margin-top: 1rem; margin-bottom: 1rem;">
                <div class="card card-body">


                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="inputEmail3" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label col-form-label-sm">Author</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="inputEmail3" placeholder="Author">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label col-form-label-sm">Year</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="inputEmail3" placeholder="Year">
                            </div>
                        </div>
                    </form>

                    <!--Add more button-->

                    <div class="btn-group justify-content-end" style="margin-bottom: 5px;">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="button_add">
                                + Add
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="click_type">Type</a>
                                <a class="dropdown-item" id="click_publisher">Publisher</a>
                                <a class="dropdown-item" id="click_journal">Journal</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="click_timespan">Timespan</a>
                            </div>
                        </div>
                    </div>

                    <!-- more added forms-->
                    <div id="add_target">

                        <!--<div class="form-group">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">Category</span>
                                <input type="text" class="form-control form-control-sm bfh-number" id="product_price" placeholder="Price" data-min="0" data-max="9999999">
                            </div>
                        </div>-->
                    </div>
                    <button type="button" class="btn btn-primary btn-sm">Search</button>
                </div><!--card-body-->
            </div><!--/End Collapse-->
        </div><!--/End Container-->
    </div>

<?php include "begincontent.php";?>

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


<?php
include "footer.php";
?>

<!-- Optional JavaScript -->
<script src="js/literature_functions.js"></script>
