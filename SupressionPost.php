<?php
require_once "function.php";

$idpostADelete=$_GET["idPost"];
$allimageofthepost=GetallImage($idpostADelete);
$nbimage=count($allimageofthepost);
var_dump($allimageofthepost);
$dossier = 'media/img/';
//pour toute les images
for($i=0;$i<$nbimage;$i++){
    //chemin de l image
$path=$dossier.$allimageofthepost[$i]["nomMedia"];
//on la delete
unlink($path);

}
DeleteMedia($idpostADelete);
DeletePost($idpostADelete);

header("location:index.php");



?>
