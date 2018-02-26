<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
include "Literature/lit_slider.php"
?>

    <!--Quick search bar-->
    <div style="background-color: #f8f9fa; margin-top: -16px; min-height: 4rem; margin-bottom: 1rem;">
        <div class="container" style="padding-top: 1rem;">


            <div class="form-group row">
                <div class="col-lg-7">
                    <input class="form-control" style="margin-bottom: 1rem;" type="text" id="quickSearch" list="optionsQuickSearch" placeholder="Quick search">
                    <!--TODO 1rem margin nur beim small Bildschirmen-->
                    <datalist id="optionsQuickSearch"> <!--TODO: Breite der Options anpassen-->

                    </datalist>
                </div>
                <div class="col-lg-2">
                    <button type="submit" data-loading-text="Loading..." class="btn btn-primary form-control" onclick='quickSearch(0)' id="quickSearchButton">Search</button>
                </div>
                <div class="col-lg-3">
                    <a data-toggle="collapse" id="advancedSearchLink" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <label for="colFormLabelSm" class="col-sm col-form-label col-form-label">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            advanced search
                        </label>
                    </a>
                </div>
            </div>


                <!--Collapse   -->

            <div class="collapse" id="collapseExample" style="margin-top: 1rem; margin-bottom: 1rem;">
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
                                <input type="text" style="margin-bottom: 1rem;" class="form-control form-control-sm" id="inputYear" placeholder="Year">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-secondary btn-sm form-control form-control-sm"  type="button"
                                        data-toggle="collapse" href="#rangeSlider" role="button" aria-expanded="false"
                                        aria-controls="collapseRangeSlider" id="button_range">
                                    <i class="fa fa-sliders" aria-hidden="true"></i> Time Range
                                </button>
                            </div>
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

                    <button type="submit" class="btn btn-primary btn-sm" onclick='advancedSearch(0)' id="searchButton">Search</button><!--Search Button-->

                </div><!--card-body-->
            </div><!--/End Collapse-->
        </div><!--/End Container-->
    </div>

<?php include "begincontent.php"; //Beginnt Content-Container
?>




<div id="results" data-children=".card-footer">

</div>

<div id="pagination">

</div>



<?php
include "footer.php";
?>
<script src="Literature/js/literature_functions.js"></script>
<script src="Literature/js/quicksearch_functions.js"></script>
<script src="Literature/js/lit_lemma.js"></script>


