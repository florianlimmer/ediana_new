<?php
session_start();
$benutzer = $_SESSION;
include "log.inc.php";
include "navbar.php";
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:-72px;height: 100vh;">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="height: 100vh;">
        <div class="carousel-item active" style="height: 100vh;">
            <img class="first-slide" src="images/tempel_natural_red.jpg" alt="First slide" style="height: 100vh;">
            <div class="container">
                <div class="carousel-caption d-md-block" style="margin-bottom: 5.5rem;">
                    <h1 align="center" class="display-2">eDiAna</h1><!--TODO beta einfügen und skalieren-->
                    <p align="center" style="text-align:center;">Digital Philological-Etymological Dictionary of the Minor Ancient Anatolian Corpus Languages</p>
                    <p align="center" style="text-align:center;"><a class="btn btn-lg btn-success" href="news.php" role="button">About the project &raquo;</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 100vh;">
            <img class="second-slide" src="images/staff.jpg" alt="Second slide" style="height: 100vh;">
            <div class="container">
                <div class="carousel-caption d-md-block" style="margin-top:500px;">
                    <h1>Cuneiform Luwian</h1>
                    <p align="center">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 100vh;">
            <img class="third-slide" src="images/internal_natural.jpg" alt="Third slide" style="height: 100vh;">
            <div class="container">
                <div class="carousel-caption d-md-block">
                    <h1>Literature database with 2976 datasets</h1>
                    <p style="text-align:center;">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p style="text-align:center;"><a class="btn btn-lg btn-primary" href="#" role="button">Browse &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="content" style="padding:1.5rem;">
    <div class="container">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <h2>Dictionary</h2>
                <p> <i class="fa fa-book fa-5x pull-left"></i>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-outline-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <h2>Corpus</h2>
                <p> <i class="fa fa-inbox fa-5x pull-left"></i>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-outline-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <h2>Literature</h2>
                <p> <i class="fa fa-quote-left fa-5x pull-left"></i>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-outline-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <hr class="featurette-divider">

        <!-- Three columns of text below the carousel -->
        <div class="row" style="margin-top:-30px;">
            <div class="col-lg-4">
                <div class="card-body">
                    <h2 class="card-title">Staff</h2>
                    <p> Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    <p><a class="btn btn-outline-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="card-body">
                    <h2 class="card-title">Collection</h2>
                    <p> Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    <p><a class="btn btn-outline-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="card-body">
                    <h2 class="card-title">Internal & API</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>

                    <div style="">
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-sm">Login</button>
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Internal Login</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form method="post" action="login.php" name="login">
                                            <div class="form-group">
                                                <label for="username" class="col-form-label">Username</label>
                                                <input type="text" class="form-control" id="user" placeholder="Username" name="user">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-form-label">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</input>
                                        <input type="submit" class="btn btn-outline-success" data-dismiss="modal" value="Login" class="pure-button">Login</input>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>
</div>

<?php include "footer.php"; ?>
