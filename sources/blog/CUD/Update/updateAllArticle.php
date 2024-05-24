<?php
// encodeRoutage(73)
require ('../sources/blog/objets/SQLArticles.php');
require('../functions/functionToken.php');
$arrayKey = ['id_categorie', 'title','textArticle', 'publish', 'valid', 'id'];
$controlPost = array();
$updateArticle = new SQLArticles ();

if($_FILES['namePicture']['error'] == 4) {
    array_push($controlPost, $checkId ->controleIntegerPK($_POST[$arrayKey[0]]));
    array_push($controlPost, testBornSelect($_POST[$arrayKey[3]], 1));
    array_push($controlPost, testBornSelect($_POST[$arrayKey[4]], 1));
    array_push($controlPost, $updateArticle->checkCategorieBeforeCreatArticle ($_POST[$arrayKey[0]]));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[1]]), 80));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[2]]), 7500));
    $mark = [1, 1, 1, 1, 0, 0];
    if($controlPost == $mark) {
        $parametre = new Preparation();
        $param = $parametre->creationPrepIdUser ($_POST);
        $updateArticle->updateArticleNoPicture ($param);
        return header('location:../index.php?idNav='.$idNav.'&message=Update record article success&idArticle='.filter($_POST['id']));
    } else {
        return header('location:../index.php?idNav='.$idNav.'&message=New record article fail&idArticle='.filter($_POST['id']));
    }
}
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controlPost, $checkId ->controleIntegerPK($_POST[$arrayKey[0]]));
    array_push($controlPost, testBornSelect($_POST[$arrayKey[3]], 1));
    array_push($controlPost, testBornSelect($_POST[$arrayKey[4]], 1));
    array_push($controlPost, $updateArticle->checkCategorieBeforeCreatArticle ($_POST[$arrayKey[0]]));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[1]]), 80));
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[2]]), 7500));
    array_push($controlPost, controlePicture($_FILES, 650000));
}
$mark = [1, 1, 1, 1, 0, 0, 1];
if($controlPost == $mark) {
        $namePicture = genToken (5).date('Y').filter($_FILES['namePicture']['name']);
        $_POST['namePicture'] = $namePicture;
        $parametre = new Preparation();
        $param = $parametre->creationPrepIdUser ($_POST);
      
        $pathPicture = $updateArticle->findNamePicture (filter($_POST['id']));
        if(file_exists('../'.$pathPicture)) {    
            unlink('../'.$pathPicture);
        } else {
            return header('location:../index.php?idNav='.$idNav.'&message=New record article fail&idArticle='.filter($_POST['id']));
        }
        if (file_exists('../sources/pictures/articlesPictures')) {
            if(move_uploaded_file($_FILES['namePicture']['tmp_name'], $f = '../sources/pictures/articlesPictures/'.$namePicture)) {
               $updateArticle->updateArticle ($param);
                chmod($f, 0644);
                return header('location:../index.php?idNav='.$idNav.'&message=Update record article success&idArticle='.filter($_POST['id']));
            } 
        
    }
} else {
    return header('location:../index.php?message=New record article fail');
}