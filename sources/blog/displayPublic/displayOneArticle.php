<?php
require('sources/blog/objets/TemplateArticles.php');
$displayOneArticle = new TemplateArticles ();
$idArticle = filter($_GET['idArticle']);
$displayOneArticle->displayOneArticleView ($idArticle);