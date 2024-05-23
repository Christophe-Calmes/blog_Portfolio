<?php
class SQLArticles 
{
    protected $picturePath;
    public function __construct () {
        $this->picturePath = 'sources/pictures/articlesPictures/';
    }
    public function checkCategorieBeforeCreatArticle ($idCategorie) {
        $param = [['prep'=>':id', 'variable'=>$idCategorie]];
        $select = "SELECT `id` FROM `categories` WHERE `id` = :id AND `valid` = 1;";
        $checkIDCategorie = ActionDB::select($select, $param, 1);
       if(empty($checkIDCategorie)) {
        return 0;
       } else {
        return 1;
       }
    }
    public function insertNewArticle($param) {
        $insert = "INSERT INTO `articles`(`id_categorie`, `idUser`, `title`, `textArticle`, `namePicture`, `publish`) 
        VALUES 
        (:id_categorie, :idUser, :title, :textArticle, :namePicture, :publish);";
        return ActionDB::access($insert, $param, 1);
    }
    public function numberOfArticles() {
        $select = "SELECT COUNT(`id`) AS `nbrArticle` FROM `articles`;";
        $nbrArticle = ActionDB::select($select, [], 1);
        return $nbrArticle[0]['nbrArticle'];

    }
    protected function articleForOnePage ($premier, $parPage) {
        $select = "SELECT `articles`.`id`, `idUser`, `title`,`namePicture`, `date_creat`, `date_update`, `publish`, `articles`.`valid`, `nameCategorie`
        FROM `articles`
        INNER JOIN `categories`ON   `articles`.`id_categorie` = `categories`.`id`
        ORDER BY `date_creat`, `nameCategorie` DESC LIMIT {$premier}, {$parPage};";
        return ActionDB::select($select, [], 1);
    }
    public function updatePublishArticle ($param) {
        $update = "UPDATE `articles` SET `publish` = `publish` ^1, `date_update` = CURRENT_TIMESTAMP WHERE `id` = :id;";
        return ActionDB::access($update, $param, 1);
    }
    public function updateValidArticle ($param) {
        $update = "UPDATE `articles` SET `valid` = `valid` ^1, `date_update` = CURRENT_TIMESTAMP WHERE `id` = :id;";
        return ActionDB::access($update, $param, 1);
    }
    public function deletePictureLinkArticle ($param) {
        $select = "SELECT `namePicture` FROM `articles` WHERE `id` = :id AND `valid` = 0 AND `publish` = 0;";
        $namePicture = ActionDB::select($select, $param, 1);
        $pathPictureDelete = $this->picturePath.$namePicture[0]['namePicture'];
       return $pathPictureDelete;
    }
    public function deleteArticle ($param) {
        $delete = "DELETE FROM `articles` WHERE `id` = :id AND `valid` = 0 AND `publish` = 0;";
        return ActionDB::access($delete , $param, 1);
    }
}
