<?php

include_once "requete.php";
include_once "function.php";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>facebook</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!--post modal-->
    <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                    Update Status
                </div>

                <!---
Zone pour upload form#################################################################
-->
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="form center-block" action="uploadimage.php" method="POST">
                        <div class="form-group">
                            <textarea class="form-control input-lg" name="Text" placeholder="Que voulez vous partager"></textarea>

                        </div>

                </div>
                <div class="modal-footer">
                    <div>

                        <!--
                    <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true"></button>
                    --->
                        <input class="btn btn-primary btn-sm" name="submit" value="submit" type="submit">
                        <ul class="pull-left list-inline">
                            <!---<li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>-->
                            <input multiple=true enctype="multipart/form-data" accept="image/*" class="glyphicon glyphicon-upload" type="file" name="image[]">
                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />

                        </ul>

                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-light navbar-expand-md text-body border-secondary text-center navbar">
        <div class="container-fluid"><a class="navbar-brand" href="#">FaceBook</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-justify" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="post.php">Post</a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul> <a href="#postModal" style=" color: black; font: bold;" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Mettre en ligne un POST</a>


            </div>
        </div>
    </nav>
    <?php

    $allpostcontent = getAllPost();

    $nbpost = count($allpostcontent);
    //var_dump($allpostcontent);
    //var_dump($nbpost);

    for ($i = 0; $i < $nbpost; $i++) {

        $idPost = $allpostcontent[$i]["idPost"];
        var_dump($allpostcontent[$i]);
        $allImageForThePost = GetallImage($idPost);


        //	var_dump($allImageForThePost);
        $nbimage = count($allImageForThePost);
        echo '<div class="row">';
        echo '<div class="card" ></div>
    <div class="card">
        <div class="card-body " style="width: 800px ;height: 600px;">
            <div class="carousel slide" data-ride="carousel" id="carousel-' . $i . '">
                <div class="carousel-inner" role="listbox">';
        for ($j = 0; $j < $nbimage; $j++) {
            if ($allImageForThePost[$j]["typemedia"] == ".mp4") {
                if ($j == 0) {

                    echo ' <div class="carousel-item active" style="height: 510px;width: 800px;">  <video autoplay loop  class="w-100 d-block" controls height="500" width="100%">
                    <source src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '"  type="video/mp4" >

                </video></div>';
                } else
                    echo ' <div class="carousel-item " style="height: 510px;width: 800px;"><video  autoplay loop class="w-100 d-block" controls height="500" width="100%">
                    <source src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '"  type="video/mp4" >

                </video></div>';
            } else {
                if ($allImageForThePost[$j]["typemedia"] == ".mp3") {
                    if ($j == 0) {

                        echo ' <div class="carousel-item active" style="height: 510px;width: 800px;">  <audio autoplay loop   class="w-100 d-block" controls height="500" width="100%">
                        <source src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '"  type="audio/mpeg" >
    
                    </video></div>';
                    } else
                        echo ' <div class="carousel-item " style="height: 510px;width: 800px;"><audio  autoplay  loop class="w-100 d-block" controls height="500" width="100%">
                        <source src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '"  type="audio/mpeg" >
    
                    </video></div>';
                } else {
                    if ($j == 0) {
                        echo ' <div class="carousel-item active" style="height: 510px;width: 800px;"><img class="w-100 d-block" src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '" alt="Slide Image" style="height: 276;width: 800px;"></div>';
                    } else
                        echo ' <div class="carousel-item " style="height: 510px;width: 800px;"><img class="w-100 d-block"
src="media/img/' . $allImageForThePost[$j]["nomMedia"] . '" alt="Slide Image"
style="height: 500;width: 100%;"></div>';
                }
            }
        }
        echo '</div>
                <div><a class="carousel-control-prev" href="#carousel-' . $i . '" role="button" data-slide="prev"><span
                            class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a
                        class="carousel-control-next" href="#carousel-' . $i . '" role="button" data-slide="next"><span
                            class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">';
        for ($h = 0; $h < $nbimage; $h++) {
            if ($h == 0) {
                echo '<li data-target="#carousel-' . $i . '" data-slide-to="' . $h . '" class="active"></li>';
            } else {
                echo '<li data-target="#carousel-' . $i . '" data-slide-to="' . $h . '"></li>';
            }
        }
        echo '</ol>
                </div>
                <p class="card-text">' . $allpostcontent[$i]["commentaire"] . '</p>
                
                <a  href="SupressionPost.php?idPost=' . $idPost . '"type="button" class="btn btn-danger">Suprimmer</a>
            </div>
        </div>';
        echo '</div>';
    }


    ?>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<style>
    .navbar {
        background-color: steelblue;

    }
</style>

<script type="text/javascript" src="assets/js/jquery.js">
</script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
            $(this).toggleClass('visible-xs text-center');
            $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
            $('.row-offcanvas').toggleClass('active');
            $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
            $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
            $('#btnShow').toggle();
        });
    });
</script>