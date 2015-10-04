<?php

class AdminModel extends BaseModel
{

    public function addProductInCategory($productId, $categoryId){
        $statement = self::$db->prepare("INSERT INTO products_categories (productId, categoryId) VALUE(?, ?)");
        $statement->bind_param("ii", $productId, $categoryId);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function addProduct($name, $description, $price, $quantity){
        $statement = self::$db->prepare("INSERT INTO products (name, description, price, quantity) VALUE(?, ?, ?, ?)");
        $statement->bind_param("ssii", $name, $description, $price, $quantity);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function getCurrProduct($productId){
        $statement = self::$db->prepare("SELECT id FROM products WHERE id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }

    public function getCurrCategory($categoryId){
        $statement = self::$db->prepare("SELECT id FROM categories WHERE id = ?");
        $statement->bind_param("i", $categoryId);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }

    public function getProductInCurrCategory($productId, $categoryId){
        $statement = self::$db->prepare("SELECT productId FROM products_categories WHERE productId = ? && categoryId = ?;");
        $statement->bind_param("ii",$productId, $categoryId);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }
}