<?php
include"../log.inc.php";
    $ref_type_query = mysqli_query($con, "

        SELECT DISTINCT ref_type
          FROM ref_center"

    ); //TODO 'select' is proably not a value wanted to display here?

    echo'<div class="form-group row">                      

        <label for="selectType" class="col-sm-2 col-form-label col-form-label-sm">Type </label>
        <div class="col-sm-10">
            <select class="custom-select custom-select-sm form-control form-control-sm"  id="selectType">
                <option selected>Choose...</option>';


    while ($type = mysqli_fetch_assoc($ref_type_query))
    {


        echo'<option value="'; //TODO das als ein echo ausgeben
        echo $type["ref_type"];
        echo'">';
        echo $type["ref_type"];
        echo'</option>';
    }

    echo '
        </select> 
        </div>
        </div>';


    //echo "<script type='text/javascript' src='BIBLIOGRAPHY/JAVA_scripts/lit_lemma.js'></script>";


?>