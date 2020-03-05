<?php
session_start();
include_once "PDO.php";


function InsertImage($postId, $nommedia, $typemedia)
{

    $lenull = null;


    $sql = "INSERT INTO `media`(`idMedia`, `idPost`,`nomMedia`,`typeMedia`)
            VALUES(:idMedia,:idPost, :nomMedia,:typeMedia)";

    $request = connect()->prepare($sql);
    $request->bindParam(":idPost", $postId, PDO::PARAM_INT);
    $request->bindParam(":idMedia", $lenull, PDO::PARAM_INT);
    $request->bindParam(":nomMedia", $nommedia, PDO::PARAM_STR);
    $request->bindParam(":typeMedia", $typemedia, PDO::PARAM_STR);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
}
function InsertPost($text)
{
    $lenull = null;

    $sql = "INSERT INTO `post`(`idPost`, `commentaire`)
            VALUES(:idPost, :commentaire)";


    $db = connect();
    $request = $db->prepare($sql);
    $request->bindParam(":idPost", $lenull, PDO::PARAM_INT);
    $request->bindParam(":commentaire", $text, PDO::PARAM_STR);

    $request->execute();


    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    $postId = connect()->lastInsertId();
    return $postId;
}

function countNumberPost()
{
    $sql = " SELECT COUNT(`idPost`)
FROM `post`;";

    $request = connect()->prepare($sql);
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllPost()
{
    $sql = " SELECT `idPost`,`commentaire`
    FROM `post`;";

    $request = connect()->prepare($sql);
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function GetallImage($idpost)
{
    $sql = " SELECT `nomMedia`
    FROM `media`
    WHERE `idPost`=:idpost;";

    $db = connect();
    $request = $db->prepare($sql);
    $request->bindParam(":idpost", $idpost, PDO::PARAM_STR);
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
