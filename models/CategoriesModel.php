<?php

class CategoriesModel extends BaseModel
{
    public function getAllCategories(){
        $statement = self::$db->query("SELECT id, name FROM categories");
        $restult = $statement->fetch_all();
        return $restult;
    }


}