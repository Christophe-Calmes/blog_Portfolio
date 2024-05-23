<?php
require('sources/blog/objets/SQLArticles.php');
require ('functions/functionPresentationText.php');

final class TemplateArticles extends SQLArticles
{
    private $yes;
    public function __construct () {
       parent::__construct();
        $this->yes = ['Non', 'Oui'];
    }
    public function displayTitleArticleForOnePage ($premier, $parPage, $idNav){
        $dataArticle = $this->articleForOnePage ($premier, $parPage);
        echo '<article class="gallery">';
            foreach($dataArticle as $value) {
                $messageValid = 'Valid';
                if($value['valid'] == 1) {
                    $messageValid = 'Unvalider';
                }
                $messagePublish = 'Publish';
                if($value['publish'] == 1) {
                    $messagePublish = 'Unpublish';
                }
                echo '<div class="item">
                        <ul class="listClass">
                            <li>Categorie : '.$value['nameCategorie'].'</li>
                            <li>'.$value['title'].'</li>
                            <li>Date de création : '.brassageDate($value['date_creat']).'</li>
                            <li>Date de modification : '.brassageDate($value['date_update']).'</li>
                            <li><img class="miniaturePicture" src="'.$this->picturePath.$value['namePicture'].'" alt="Picture of '.$value['title'].'"/></li>
                            <li>Publish : '.$this->yes[$value['publish']].'</li>
                            <li>Valid : '.$this->yes[$value['valid']].'</li>
                        </ul>';
                    echo    '<form class="formulaireClassique" action="'.encodeRoutage(71).'" method="post">
                                <input type="hidden" name="id" value="'.$value['id'].'"/>
                                <button type="submit" name="idNav" value="'.$idNav.'">'.$messageValid.'</button>
                            </form>';
                    echo    '<form class="formulaireClassique" action="'.encodeRoutage(70).'" method="post">
                                <input type="hidden" name="id" value="'.$value['id'].'"/>
                                <button type="submit" name="idNav" value="'.$idNav.'">'.$messagePublish.'</button>
                            </form>';
                    if(($value['publish'] == 0 )&&($value['valid'] == 0)) {
                        echo    '<form class="formulaireClassique" action="'.encodeRoutage(72).'" method="post">
                        <input type="hidden" name="id" value="'.$value['id'].'"/>
                        <button type="submit" name="idNav" value="'.$idNav.'">Delete</button>
                    </form>';
                    }
            echo '<a href="'.findTargetRoute(158).'&idArticle='.$value['id'].'">Voir l\'article</a>';
            echo '</div>';

            }
        echo '</article>';
     
    }
}
