<?php
// encodeRoutage(68)
require('../sources/blog/objets/SQLcategories.php');
$arrayKey = ['id'];
$controlPost = array();
if(checkPostFields($arrayKey, $_POST)) {
    array_push($controlPost , $checkId->controleInteger($_POST[$arrayKey [0]]));
}
$mark = [1];
if($mark == $controlPost) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $deleteCategorie = new SQLcategories ();
    $deleteCategorie->DeleteCategorie ($param);
   return header('location:../index.php?idNav='.$idNav.'&message=Delete categorie success');
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=Delete categorie fail');
}