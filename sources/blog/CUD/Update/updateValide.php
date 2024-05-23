<?php
//  encodeRoutage(71)
print_r($_POST);
// encodeRoutage(67)
require('../sources/blog/objets/SQLArticles.php');
$arrayKey = ['id'];
$controlPost = array();
if(checkPostFields($arrayKey, $_POST)) {
    array_push($controlPost , $checkId->controleInteger($_POST[$arrayKey [0]]));
}
$mark = [1];
if($mark == $controlPost) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $updatePublish = new SQLArticles ();
    $updatePublish->updateValidArticle ($param) ;

   return header('location:../index.php?idNav='.$idNav.'&message=Update article success');
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Update article fail');
}