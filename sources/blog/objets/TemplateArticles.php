<?php
require('sources/blog/objets/SQLArticles.php');
require ('sources/blog/objets/TemplateCategories.php');
require ('functions/functionPresentationText.php');
require('functions/functionDateTime.php');

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
            echo '<a href="'.findTargetRoute(158).'&idArticle='.$value['id'].'">Modifier l\'article</a>';
            echo '<a href="'.findTargetRoute(159).'&idArticle='.$value['id'].'">Voir l\'article</a>';
            echo '</div>';

            }
        echo '</article>';
    }
    public function displayOneArticleAdmin ($idArticle, $idNav) {
        $formCategorie = new TemplateCategories ();
        $statusArticle = $this->validAndPublishArticle ($idArticle);
        $dataArticle = $this->selectOneArticle ($idArticle, $statusArticle[0]['publish'], $statusArticle[0]['valid']);
        $articleEnchanced = $dataArticle[0]['textArticle'];
        $articleEnchanced = listHTML($articleEnchanced, 'listClass');
        $articleEnchanced = lineBreak ($articleEnchanced);
        $articleEnchanced = strongHTML ($articleEnchanced);
        $articleEnchanced = linkHTML ($articleEnchanced);
            echo '<article class="articleBlog">
                    <h2>'.$dataArticle[0]['title'].'</h2>
                    <h4>Catégorie de l\'article : '.$dataArticle[0]['nameCategorie'].'</h4>
                    <img class="imgCarouselAuto" src="'.$this->picturePath.$dataArticle[0]['namePicture'].'" alt="Picture of '.$dataArticle[0]['title'].'"/>
                    <p>'.$articleEnchanced.'</p>
                </article>';
        echo '<form class="formulaireClassique" action="'.encodeRoutage(73).'" method="post" enctype="multipart/form-data">';
                $formCategorie->selectACategorie ();
               echo'<label for="title">Titre de l\'article</label>
                <input type="text" name="title" id="title" value="'.$dataArticle[0]['title'].'">
                <label for="textArticle">Texte de votre article</label>
<textarea name="textArticle" id="" cols="90" rows="30">
'.$dataArticle[0]['textArticle'].'
</textarea>
                <label for="publish">Publier ?</label>
                <select name="publish" id="publish">'; 
                    for ($i=0; $i <count($this->yes);$i++) { 
                        if($i == $dataArticle[0]['publish']){
                            echo '<option value="'.$i.'" selected>'.$this->yes[$i].'</option>';
                        } else {
                            echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
                        }
                        
                    }
            echo'</select>
            <label for="valid">Valider ?</label>
            <select name="valid" id="valid">'; 
                for ($i=0; $i <count($this->yes);$i++) { 
                    if($i == $dataArticle[0]['valid']){
                        echo '<option value="'.$i.'" selected>'.$this->yes[$i].'</option>';
                    } else {
                        echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
                    }
                    
                }
        echo'</select>
                <label for="namePicture">Image d\'illustration de l\'article ?</label>
                <input id="namePicture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>
                <input type="hidden" name="id" value="'.$dataArticle[0]['idArticle'].'"/>
                <button type="submit" name="idNav" value="'.$idNav.'">Mettre à jour</button>
            </form>';
    }
    public function displayOneArticleView ($idArticle) {
        $formCategorie = new TemplateCategories ();
        $statusArticle = $this->validAndPublishArticle ($idArticle);
        $dataArticle = $this->selectOneArticle ($idArticle, $statusArticle[0]['publish'], $statusArticle[0]['valid']);
        $articleEnchanced = $dataArticle[0]['textArticle'];
        $articleEnchanced = listHTML($articleEnchanced, 'listClass');
        $articleEnchanced = lineBreak ($articleEnchanced);
        $articleEnchanced = strongHTML ($articleEnchanced);
        $articleEnchanced = linkHTML ($articleEnchanced);
      echo '<div class="BlogArticle">
                <div class="PictureZone">
                    <img class="pictureBlog" src="'.$this->picturePath.$dataArticle[0]['namePicture'].'" alt="Picture of '.$dataArticle[0]['title'].'"/>
                </div>
                    <div class="ArticleZone">
                        <div class="TitleZone"><h2>'.$dataArticle[0]['title'].'</h2>
                        <h4>Catégorie de l\'article : '.$dataArticle[0]['nameCategorie'].'</h4>
                        <br/>
                        Créé le '.brassageDate($dataArticle[0]['date_creat']);
                        if(!empty($dataArticle[0]['date_creat'])) {
                            echo '<br/> Modifier le :'.brassageDate($dataArticle[0]['date_update']);
                        }
                    
                    echo'</div>
                    <div class="textZone">
                        <p>'.$articleEnchanced.'</p>
                        <p class="author">'.$dataArticle[0]['prenom'].' '.$dataArticle[0]['nom'].'</p>
                    </div>
                </div>
            </div>';
    }
}
