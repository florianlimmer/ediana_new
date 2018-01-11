<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
?>
    <div style="background-color: #dcdcdc; margin-top: -16px; min-height: 4rem;">
        <div class="container" style="padding-top: 1rem;">
            <div class="form-group row">
                <div class="col-10">
                    <input class="form-control form-control-sm" type="text" placeholder="Schnellsuche">
                </div>
                <div class="col-2">
                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    erweiterte Suche
                    </label>
                    </a>
                </div>

                <!--Collapse-->
                <div class="collapse" id="collapseExample" style="margin-top: 1rem;">
                    <div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                     </span>
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <span class="input-group-addon">0.00</span>
                                    <input type="text" class="form-control" aria-label="Text input with radio button">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/End Collapse-->

            </div>
        </div>
    </div>

<?php include "begincontent.php";?>


<?php
include "footer.php";
?>