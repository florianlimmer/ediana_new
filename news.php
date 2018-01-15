<?php
    session_start();
    $benutzer = $_SESSION;
    include "log.inc.php";
    include "navbar.php";
?>

    <div class="jumbotron jumbotron-fluid" style="margin-top: -16px;background-image: url(images/Fraktin1.jpg);">
        <div class="container">
            <!--<img src="images/sing_gloss_white.png">-->
            <h1 class="display-3">eDiAna</h1>
            <h5>Digital Philological-Etymological Dictionary of the Minor Ancient Anatolian Corpus Languages</h5>
        </div>
    </div>

    <div class="container">

        <div class="content">



            <h1>About the project</h1>

            <p>The aim of the Digital Philological/Etymological Dictionary of the Minor Language Corpora of Ancient Anatolia is to provide the first exhaustive lexical assessment of the entire corpus of the lesser attested ancient Anatolian languages, i.e. Hieroglyphic and Cuneiform Luwian, Lycian, Carian, Lydian, Palaic, Sidetic and Milyan (Lycian B). This includes the philological documentation of word usage with regard to semantics, grammar and context as well as cultural background and the historical linguistic interrelationships of the minor languages with Hittite and the other Indo-European languages, whereby the methodology of comparative historical linguistics plays an important role. The Digital Philological/Etymological Dictionary of the Minor Language Corpora of Ancient Anatolia is intended to serve as a fundamental resource for Hittitology and for Ancient Anatolian and Ancient Near Eastern Studies as well as for Indo-Europeanists. It will be published online (with multiple search options), printed (print-on-demand) and thus made accessible to a wide public including scholars of many different disciplines and other interested parties.</p>

            <h2>First DEMO-release</h2>
            <p>In the course of the international workshop <a href="http://www.assyriologie.uni-muenchen.de/aktuelles/lykischer-workshop/index.html" target="_top">Current Research on Lycian</a> we present the first DEMO-version of our dictionary to a broader audience. (17.02.2017)</p>

            <br><br>




            <div class="row">
                <div class="col-lg">
                    <div class="card border-info" style="margin-bottom:10px;">
                        <div class="card-header text-info">
                            Feature size:
                        </div>
                        <ul class="list-group list-group-flush text-info">
                            <li class="list-group-item">Dictionary entries: 145 <small class="text-muted">(44 accessible)</small></li>
                            <li class="list-group-item">Corpus size: 37995 words / 927 texts</li>
                            <li class="list-group-item">Literature database: 2976 datasets</li>
                            <li class="list-group-item">Excerpt database: 22140 datasets</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card" style="margin-bottom:10px;">
                        <div class="card-header">
                            Released text-corpora:
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item">Cuneiform Luwian <small class="text-muted">(16.001 words)</small></li>
                            <li class="list-group-item">Hieroglyphic Luwian <small class="text-muted">(12.017 words)</small></li>
                            <li class="list-group-item">Pisidian <small class="text-muted">(266 words)</small></li>
                            <li class="list-group-item">Palaic <small class="text-muted">(2.051 words)</small></li>
                            <li class="list-group-item">Milyan <small class="text-muted">(762 words)</small></li>
                            <li class="list-group-item">Lydian <small class="text-muted">(1.694 words)</small></li>
                            <li class="list-group-item">Lycian <small class="text-muted">(5.238 words)</small></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4.5 col-sm">
                    <div class="card" style="margin-bottom:10px; overflow-y: scroll; height: 317px;">
                        <div class="card-header">
                            Released dictionary-entries:
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">*g̑hésor- 'hand' <small class="text-muted">(Proto Anatolian)</small></li>
                                <li class="list-group-item">*sóru- 'loot, plunder' <small class="text-muted">(Proto Anatolian)</small></li>
                                <li class="list-group-item">iššaralladdar- 'bracelet' <small class="text-muted">(Luwian unclassified)</small></li>
                                <li class="list-group-item">iššarattanaš 'unknown' <small class="text-muted">(Hittite)</small></li>
                                <li class="list-group-item">*peku̯- 'to crush' <small class="text-muted">(Proto Anatolian)</small></li>
                                <li class="list-group-item">*k̑ō 'here(to)' <small class="text-muted">(Proto Anatolian)</small></li>
                                <li class="list-group-item">šūrušūru- 'unknown' <small class="text-muted">(Palaic)</small></li>
                            </ul>
                    </div>
                </div>
            </div>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <h3>Maps of (Ancient) Anatolia</h3>
            <div class="row">
                <div class="col-lg">
                    <figure class="text-center">
                        <img src="images/map.jpg" class="figure-img img-fluid rounded" width="100%">
                        <figcaption class="figure-caption">Map of Ancient Anatolia.</figcaption>
                    </figure>
                </div>
                <div class="col-lg">
                    <figure class="text-center">
                        <iframe
                                width="100%"
                                height="377px"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAOa010DaK-pd3hLEusPIlvZD4TnjFd-j0&center=39.0101053,30.6895752&zoom=6&maptype=satellite&language=en" class="rounded" allowfullscreen>
                        </iframe>
                        <figcaption class="figure-caption">Map of Current Anatolia (Provided by Google Maps).</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 center-block">
                    <h2 class="featurette-heading">Modul 1: Synchronic Lexicon of Cuneiform Luwian, Carian and Sidetic</h2>
                    <span class="text-muted">Prof. Dr. Jared Miller, Dr. Anja Busse, Dr. Zsolt Simon</span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in molestie nibh, vitae iaculis dolor. Nam eget mi et erat iaculis suscipit et quis nisi. Nullam neque enim, dapibus id ullamcorper sed, auctor sed tortor. Cras imperdiet turpis eget orci lobortis ultricies. Ut viverra justo vel scelerisque semper. Proin ipsum odio, convallis quis dignissim hendrerit, dictum vel eros. Integer vestibulum mattis tellus vitae posuere. Suspendisse fringilla ante vitae tempor interdum. Quisque mollis imperdiet arcu eget ullamcorper. Morbi iaculis sodales scelerisque. Etiam aliquet ante eleifend, rutrum nulla sed, auctor nisl.
                    </p>
                    <p class="lead">
                        Duis imperdiet mauris urna. Sed eleifend elementum molestie. Suspendisse condimentum varius nisi nec ultricies. Donec tincidunt viverra dapibus. Mauris a luctus diam. Maecenas porta elementum magna nec sodales. Suspendisse velit dui, pharetra eu dolor a, consequat gravida turpis. Nam faucibus molestie blandit. Phasellus ac imperdiet justo, sit amet laoreet libero. Donec aliquet molestie nisi, nec vulputate ligula fermentum ut. Ut at nibh imperdiet ligula lobortis molestie id vel massa. Nullam semper est vel metus vehicula egestas. Aliquam dictum vehicula nibh, sed volutpat risus cursus posuere.
                    </p>
                </div>
                <div class="col-md-5">
                    <figure class="text-center">
                        <img class="featurette-image img-fluid mx-auto" style="vertical-align: center;" src="images/sidetic.png" alt="Generic placeholder image">

                            <figcaption class="figure-caption">Sidetic</figcaption>
                    </figure>
                    </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Modul 2: Synchronic Lexicon of Hieroglyphic Luwian, Palaic, Lycian, Lydian and Pisidian, Proto-Anato</h2>
                    <span class="text-muted">Prof. Dr. Elisabeth Rieken, David Sasseville M.A., Dr. Ilya Yakubovich</span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in molestie nibh, vitae iaculis dolor. Nam eget mi et erat iaculis suscipit et quis nisi. Nullam neque enim, dapibus id ullamcorper sed, auctor sed tortor. Cras imperdiet turpis eget orci lobortis ultricies. Ut viverra justo vel scelerisque semper. Proin ipsum odio, convallis quis dignissim hendrerit, dictum vel eros. Integer vestibulum mattis tellus vitae posuere. Suspendisse fringilla ante vitae tempor interdum. Quisque mollis imperdiet arcu eget ullamcorper. Morbi iaculis sodales scelerisque. Etiam aliquet ante eleifend, rutrum nulla sed, auctor nisl.
                    </p>
                   <p class="lead">
                       Duis imperdiet mauris urna. Sed eleifend elementum molestie. Suspendisse condimentum varius nisi nec ultricies. Donec tincidunt viverra dapibus. Mauris a luctus diam. Maecenas porta elementum magna nec sodales. Suspendisse velit dui, pharetra eu dolor a, consequat gravida turpis. Nam faucibus molestie blandit. Phasellus ac imperdiet justo, sit amet laoreet libero. Donec aliquet molestie nisi, nec vulputate ligula fermentum ut. Ut at nibh imperdiet ligula lobortis molestie id vel massa. Nullam semper est vel metus vehicula egestas. Aliquam dictum vehicula nibh, sed volutpat risus cursus posuere.
                   </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <figure class="text-center">
                        <img class="featurette-image img-fluid mx-auto" src="images/lydian.png" alt="Generic placeholder image">
                        <figcaption class="figure-caption">Lydian</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Module 3: Proto-Indo-European Etymology of the minor Anatolian Corpus Languages</h2>
                    <span class="text-muted">Prof. Dr. Olav Hackstein, PD Dr. Thomas Steer, Dr. Andreas Opfermann</span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in molestie nibh, vitae iaculis dolor. Nam eget mi et erat iaculis suscipit et quis nisi. Nullam neque enim, dapibus id ullamcorper sed, auctor sed tortor. Cras imperdiet turpis eget orci lobortis ultricies. Ut viverra justo vel scelerisque semper. Proin ipsum odio, convallis quis dignissim hendrerit, dictum vel eros. Integer vestibulum mattis tellus vitae posuere. Suspendisse fringilla ante vitae tempor interdum. Quisque mollis imperdiet arcu eget ullamcorper. Morbi iaculis sodales scelerisque. Etiam aliquet ante eleifend, rutrum nulla sed, auctor nisl.
                    </p>
                    <p class="lead">
                        Duis imperdiet mauris urna. Sed eleifend elementum molestie. Suspendisse condimentum varius nisi nec ultricies. Donec tincidunt viverra dapibus. Mauris a luctus diam. Maecenas porta elementum magna nec sodales. Suspendisse velit dui, pharetra eu dolor a, consequat gravida turpis. Nam faucibus molestie blandit. Phasellus ac imperdiet justo, sit amet laoreet libero. Donec aliquet molestie nisi, nec vulputate ligula fermentum ut. Ut at nibh imperdiet ligula lobortis molestie id vel massa. Nullam semper est vel metus vehicula egestas. Aliquam dictum vehicula nibh, sed volutpat risus cursus posuere.
                    </p>
                </div>
                <div class="col-md-5">
                    <figure class="text-center">
                        <img class="featurette-image img-fluid mx-auto" src="images/anatolian_languages.png" alt="Generic placeholder image">
                        <figcaption class="figure-caption">The Anatolian Languages</figcaption>
                    </figure>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Digital Development</h2>
                    <span class="text-muted">Markus Frank M.A., Katharina Smiatek, Dr. Christian Riepl</span>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in molestie nibh, vitae iaculis dolor. Nam eget mi et erat iaculis suscipit et quis nisi. Nullam neque enim, dapibus id ullamcorper sed, auctor sed tortor. Cras imperdiet turpis eget orci lobortis ultricies. Ut viverra justo vel scelerisque semper. Proin ipsum odio, convallis quis dignissim hendrerit, dictum vel eros. Integer vestibulum mattis tellus vitae posuere. Suspendisse fringilla ante vitae tempor interdum. Quisque mollis imperdiet arcu eget ullamcorper. Morbi iaculis sodales scelerisque. Etiam aliquet ante eleifend, rutrum nulla sed, auctor nisl.
                    </p>
                    <p class="lead">
                        Duis imperdiet mauris urna. Sed eleifend elementum molestie. Suspendisse condimentum varius nisi nec ultricies. Donec tincidunt viverra dapibus. Mauris a luctus diam. Maecenas porta elementum magna nec sodales. Suspendisse velit dui, pharetra eu dolor a, consequat gravida turpis. Nam faucibus molestie blandit. Phasellus ac imperdiet justo, sit amet laoreet libero. Donec aliquet molestie nisi, nec vulputate ligula fermentum ut. Ut at nibh imperdiet ligula lobortis molestie id vel massa. Nullam semper est vel metus vehicula egestas. Aliquam dictum vehicula nibh, sed volutpat risus cursus posuere.
                    </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <figure class="text-center">
                        <img class="featurette-image img-fluid mx-auto" src="images/construction.png" alt="Generic placeholder image">

                            <figcaption class="figure-caption">eDiAna Conception</figcaption>
                    </figure>
                </div>
            </div>

            <!-- /END THE FEATURETTES -->



<?php
    include "footer.php";
?>