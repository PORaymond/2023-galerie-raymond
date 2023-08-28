<?php
/*
* Bootstrap 4 carousel w/ php
*/
$slider = [
    ['img'=> 'images/monstre/large/je-ne-suis-pas-un-monstre.JPG'],
    ['img'=> '/images/collage-autarcique/large/le-zebre.jpg'],
    ['img'=> 'images/arbre/large/L-arbre-bleu.jpg'],
];
$length = count($slider);
$index = 0;

?>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <style>

        .frame-carrousel>*>img{
            max-height: 400px;
            height: 400px;


        }

    </style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner d-flex justify-content-between frame-carrousel align-content-center">
        <div class="carousel-item active">
            <img class="d-block mx-auto" src="images/monstre/large/je-ne-suis-pas-un-monstre.JPG" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block mx-auto" src="images/collage-autarcique/large/le-zebre.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block mx-auto" src="images/arbre/large/L-arbre-bleu.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/bootstrap-4/dist/js/bootstrap.js"></script>
