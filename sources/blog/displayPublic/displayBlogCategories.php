<?php
//Idnav : 160
$idCategorie  = filter($_GET['idCategories']);
  require ('functions/functionPagination.php');
  require ('sources/blog/objets/TemplateArticles.php');
  $displayArticle = new TemplateArticles ();
  if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
  } else {
    $currentPage = 1;
  }
  $parPage = 9;
$nbrArticle = $displayArticle->numberOfArticlesForOneCategorie($idCategorie);
$pages = ceil($nbrArticle/$parPage);
$premier = ($currentPage * $parPage)- $parPage;
$displayArticle->displayTitleArticleForOnePageForOneCategorie ($premier, $parPage, $idNav, $idCategorie);

for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }
