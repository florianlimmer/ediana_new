<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
?>
    <!--Quick search bar-->
    <div style="background-color: #f8f9fa; margin-top: -16px; min-height: 4rem; margin-bottom: 1rem;">
        <div class="container" style="padding-top: 1rem;">


            <div class="form-group row">
                <div class="col-8">
                    <input class="form-control" type="text" id="quickSearch" list="optionsQuickSearch" placeholder="Quick search">
                    <datalist id="optionsQuickSearch"> <!--TODO: Breite der Options anpassen-->

                    </datalist>
                </div>
                <button type="submit" class="btn btn-primary mb-1" id="quickSearchButton">Search</button>
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

                    <!--default options-->
                    <form>
                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="inputTitle" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputAuthor" class="col-sm-2 col-form-label col-form-label-sm">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="inputAuthor" placeholder="Author">
                            </div>
                        </div>
                        <div class="form-group row"><!--Special Feature Range Slider-->
                            <label for="inputYear" class="col-sm-2 col-form-label col-form-label-sm">Year</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="inputYear" placeholder="Year">
                            </div>
                            <button class="btn btn-secondary btn-sm"  type="button"
                                    data-toggle="collapse" href="#rangeSlider" role="button" aria-expanded="false"
                                    aria-controls="collapseRangeSlider" id="button_range">
                                <i class="fa fa-sliders" aria-hidden="true"></i> Time Range
                            </button>
                        </div>
                    </form>
                    <!--Range Slider Collapse -->
                    <div class="collapse" id="rangeSlider" style="margin-top: 1rem; margin-bottom: 1rem;">
                        <p>
                            <label for="label_timerange" class="col-form-label" for="amount">Time range:</label>
                            <input type="text" id="amount" class="text-muted col-form-label" readonly style="border:0;">
                        </p>

                        <div id="slider-range"></div>
                    </div>


                    <!-- Space where more can be added into-->
                    <hr>
                    <div id="add_target">
                        <form class="form-inline well" >
                        </form>

                    </div>


                    <!--Addmore-button-->

                    <div class="btn-group justify-content-end" style="margin-bottom: 5px;">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="button_add">
                                + more options
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="click_type">Type</a>
                                <a class="dropdown-item" id="click_publisher">Publisher</a>
                                <a class="dropdown-item" id="click_journal">Journal</a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm" id="searchButton">Search</button><!--Search Button-->

                </div><!--card-body-->
            </div><!--/End Collapse-->
        </div><!--/End Container-->
    </div>

<?php include "begincontent.php"; //Beginnt Content-Container
?>


<nav aria-label="Page navigation top">
    <ul class="pagination pagination-sm justify-content-end">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<div id="results"></div>



<?php
include "footer.php";
?>
<script src="Literature/js/literature_functions.js"></script>
<script src="Literature/js/quicksearch_functions.js"></script>



