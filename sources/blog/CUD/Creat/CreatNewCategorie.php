<?php
//  encodeRoutage(66)
require('../sources/blog/objets/SQLcategories.php');
$arrayKey = ['nameCategorie'];
$controlPost = array();
if(checkPostFields ($arrayKey, $_POST)) {
    array_push($controlPost, sizePost(filter($_POST[$arrayKey[0]]), 60));
}
print_r($controlPost);
$mark = [0];
if($mark == $controlPost) {
    $parametre = new Preparation ();
    $param = $parametre->creationPrep ($_POST);
    $creatCategorie = new SQLcategories ();
    $creatCategorie->CreatCategorie ($param);
    return header('location:../index.php?idNav='.$idNav.'&message=New record categorie success');
} else {
    return header('location:../index.php?idNav='.$idNav.'&message=New record categorie fail');
}