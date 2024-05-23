<?php 
require ('sources/blog/objets/TemplateCategories.php');
$formCategorie = new TemplateCategories ();
?>
<section>
    <article>
        <h2>Ajouter un nouvelle article</h2>
        <form class="formulaireClassique" action="<?=encodeRoutage(69)?>" method="post" enctype="multipart/form-data">
            <?php $formCategorie->selectACategorie (); ?>
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" placeholder="Titre de votre article">
            <label for="textArticle">Texte de votre article</label>
<textarea name="textArticle" id="" cols="30" rows="10"></textarea>
            <label for="publish">Publier ?</label>
            <select name="publish" id="publish">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
            <label for="namePicture">Image d'illustration de l'article ?</label>
            <input id="namePicture" type="file" name="namePicture" accept="image/png, image/jpeg, image/webp"/>
            <button type="submit" name="idNav" value="<?=$idNav?>">Enregistrer</button>
        </form>
    </article>
</section>
