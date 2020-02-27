<?php
session_start();
include_once "PDO.php";


function InsertImage($nommedia, $typemedia, $commentaire)
{

    $lenull = null;

    $sql = "INSERT INTO `post`(`idPost`, `commentaire`)
            VALUES(:idPost, :commentaire)";

    // $request = connect()->prepare($sql);
    $db = connect();
    $request = $db->prepare($sql);
    $request->bindParam(":idPost", $lenull, PDO::PARAM_INT);
    $request->bindParam(":commentaire", $commentaire, PDO::PARAM_STR);

    $request->execute();


    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    $postId = connect()->lastInsertId();
    echo $postId;


    $sql = "INSERT INTO `media`(`idMedia`, `idPost`,`nomMedia`,`typeMedia`)
            VALUES(:idMedia,:idPost, :nomMedia,:typeMedia)";

    $request = connect()->prepare($sql);
    $request->bindParam(":idPost", $postId, PDO::PARAM_INT);
    $request->bindParam(":idMedia", $lenull, PDO::PARAM_INT);
    $request->bindParam(":nomMedia", $nommedia, PDO::PARAM_INT);
    $request->bindParam(":typeMedia", $typemedia, PDO::PARAM_INT);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);


}
