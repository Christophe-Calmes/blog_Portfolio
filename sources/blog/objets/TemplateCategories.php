<?php
require_once('sources/blog/objets/SQLcategories.php');
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
                        </form>
                    </li>';
            }
            echo '</ul>';
        }
  
    }
}
