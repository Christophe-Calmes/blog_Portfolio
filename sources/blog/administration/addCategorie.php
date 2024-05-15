<section>
    <article>
        <h1>Ajouter une catégorie ?</h1>
            <form class="formulaireClassique" action="<?=encodeRoutage(66)?>" method="post" enctype="multipart/form-data">
                <label for="nameCategorie">Nom de la nouvelle catégorie</label>
                <input type="text" name="nameCategorie" id="nameCategorie" placeholder="Nouvelle catégorie ?">
                <button type="submit" name="idNav" value="<?=$idNav?>">Ajouter</button>
            </form>
    </article>
    <article>
        <?php 
            require('sources/blog/objets/TemplateCategories.php');
            $displayCategories = new TemplateCategories ();
            $displayCategories->displayCategorie (1, $idNav);
            $displayCategories->displayCategorie (0, $idNav);
        ?>
    </article>
</section>

