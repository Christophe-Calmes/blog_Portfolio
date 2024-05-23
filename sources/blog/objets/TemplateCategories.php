<?php
require ('sources/blog/objets/SQLcategories.php');
class TemplateCategories extends SQLCategories
{
    public function displayCategorie ($valid, $idNav) {
        $dataCategories = $this->readCategories ($valid);
        $message = 'non valide';
        $messageButton = 'valide';
        if($valid == 1) {
            $message = 'valide';
            $messageButton = 'non valide';
        }
        if(!empty($dataCategories)) {
            echo '<h2>Categorie '.$message.'</h2>';
            echo '<ul>';
            foreach( $dataCategories as $value) {
                echo '<li class="flex-rows">'.$value['nameCategorie'].'
                        <form  action ="'.encodeRoutage(67).'" method="post">
                        <input type="hidden" name="id" value="'.$value['id'].'"/>
                        <button type="submit" name="idNav" value="'.$idNav.'">'.$messageButton.'</button>
                        </form>';
                        if($valid == 0) {
                            echo ' <form  action ="'.encodeRoutage(68).'" method="post">
                            <input type="hidden" name="id" value="'.$value['id'].'"/>
                            <button type="submit" name="idNav" value="'.$idNav.'">Delete categorie</button>
                            </form>';
                        }
                echo '</li>';
            }
            echo '</ul>';
        }
  
    }
    public function selectACategorie () {
        $dataCategories = $this->readCategories (1);
        echo '<label for="id_categorie">Catégorie de l\'article ?</label>';
        echo '<select id="id_categorie" name="id_categorie">';
        foreach ($dataCategories as $value) {
            echo '<option value='.$value['id'].'>'.$value['nameCategorie'].'</option>';
        }
        echo '</select>';

    }
}
