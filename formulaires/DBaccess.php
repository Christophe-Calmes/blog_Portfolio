<?php
session_start();
include '../objets/objetsGeneraux.php';
include '../functions/fonctionsDB.php';
include '../modules/navigation/objets/getNavigation.php';
require ('../modules/securiter/object/securingConnections.php');
$ipCheck = new SecuringConnections ($_SERVER['REMOTE_ADDR']);
if($ipCheck->ipIsProhibited ()) {
  return header('location:../index.php?message=Can you contact the administrator with reference BLACK ICE 2020 ?');
};
$route = filter($_GET['route']);
// Trouver la référence
$dataRoute = new GetNavigation();
$dataRoute = $dataRoute->getFrom($route);
$securiter = $dataRoute[0]['securiter'];
if(!empty($_SESSION) && ($securiter > 0)) {
  // Contrôle Identité
  $checkId = new Controles();
  $sql = "SELECT `token` FROM `users` WHERE `token` = :token";
  $preparation = ':token';
  $valeur = $_SESSION['tokenConnexion'];
  $border = $checkId->doublon($sql, $preparation , $valeur);
  // Fin de contrôle Identité
}
$chemin = $dataRoute[0]['chemin'];
if($securiter == 0) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Contrôle systèmatique
    // Routeur securité 0
    // Controle champs vide
    $controleForm = array();
    array_push($controleForm, champsVide($_POST));
      if($controleForm == [0]) 
      { include '../'.$chemin; } 
      else 
      { 
        header('location:../index.php?message=Un ou plusieurs champs sont vide.'); 
      }
  } else {
    header('location:../../index.php?message=Erreur de traitement');
  }
} else  {
            if(($_SESSION['role'] >= $securiter)&&($border == 1)) {
                if(filter($_POST['idNav'] > 0)) {
                  $idNav = filter($_POST['idNav']);
                  array_pop($_POST);
                } else {
                  array_pop($_POST);
                }
              $controleForm = array();
              array_push($controleForm, champsVide($_POST));
              if($controleForm == [0]) {
                  include '../'.$chemin;
                } else {
               
                    header('location:../index.php?message=Un ou plusieurs champs sont vide.');
                  }
                } else {
                  session_destroy();
                  $_SESSION = array();
                  header('location:../index.php?message=Vous êtes déconnecté');
                }
}
