<?php
// encodeRoutage(69)
require ('../sources/blog/objets/SQLArticles.php');
require('../functions/functionToken.php');
$arrayKey = ['id_categorie', 'title','textArticle', 'publish'];
$controlPost = array();
$mark = [1, 1, 0, 0,1];
$addArticle = new SQLArticles ();
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controlPost, $checkId ->controleIntegerPK($_POST[$arrayKey[0]]));
    array_push($controlPost, $addArticle->checkCategorieBeforeCreatArticle ($_POST[$arrayKey[0]]));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[1]]), 80));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[2]]), 7500));
    array_push($controlPost, controlePicture($_FILES, 1000000));
    
}
if($controlPost == $mark) {
    $namePicture = genToken (5).date('Y').filter($_FILES['namePicture']['name']);
    $_POST['namePicture'] = $namePicture;
    $parametre = new Preparation();
    $param = $parametre->creationPrepIdUser ($_POST);
    print_r($param);
    if (file_exists('../sources/pictures/articlesPictures')) {
        if(move_uploaded_file($_FILES['namePicture']['tmp_name'], $f = '../sources/pictures/articlesPictures/'.$namePicture)) {
            $addArticle->insertNewArticle($param);
            chmod($f, 0644);
            return header('location:../index.php?idNav='.$idNav.'&message=New record article success');
        } 
    }

} else {
 return header('location:../index.php?idNav='.$idNav.'&message=New record article fail');
}