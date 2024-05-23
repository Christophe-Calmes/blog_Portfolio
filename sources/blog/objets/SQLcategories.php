<?php
class SQLCategories
{
    public function CreatCategorie ($param) {
        $insert = "INSERT INTO `categories`(`nameCategorie`) VALUES (:nameCategorie);";
        return actionDB::access($insert, $param, 1);
    }
    public function UpdateCategorie ($param) {
        $update = "UPDATE `categories` SET `valid`= `valid` ^1 WHERE `id` = :id;";
        return actionDB::access($update, $param, 1);
    }
    public function DeleteCategorie ($param) {
        $delete = "DELETE FROM `categories` WHERE `id` = :id AND `valid` = 0;";
        return actionDB::access($delete, $param, 1);
    }
    protected function readCategories ($valid) {
        $select = "SELECT `id`, `nameCategorie`, `valid` FROM `categories` WHERE `valid` = :valid;";
        $param = [['prep'=>':valid', 'variable'=>$valid]];
        return actionDB::select($select, $param, 1);
    }

}
