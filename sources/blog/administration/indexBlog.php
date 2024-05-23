<?php
  require ('functions/functionPagination.php');
  require ('functions/functionDateTime.php');
  require ('sources/blog/objets/TemplateArticles.php');
  $displayArticle = new TemplateArticles ();
  if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
  } else {
    $currentPage = 1;
  }
  $parPage = 9;
$nbrArticle = $displayArticle->numberOfArticles();
$pages = ceil($nbrArticle/$parPage);
$premier = ($currentPage * $parPage)- $parPage;
$displayArticle->displayTitleArticleForOnePage ($premier, $parPage, $idNav);

for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }