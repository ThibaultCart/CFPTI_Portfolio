<?php
include_once "function.php";
include_once "requete.php";




if (isset($_POST["submit"])) {

    $text = filter_input(INPUT_POST, 'Text', FILTER_SANITIZE_STRING);

    GestionUpload($text);


}
?>
