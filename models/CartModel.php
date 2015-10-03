<?php

class CartModel extends BaseModel
{
    public function getAllProductsByUser($id){
        $statement = self::$db->prepare("SELECT p.id, p.name FROM products p
                                                JOIN cart c
                                                ON c.product_id = p.id
                                                WHERE c.user_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $restult = $statement->get_result()->fetch_all();
        return $restult;
    }

    public function add($userId, $categoryId, $productId){
        $statement = self::$db->prepare("INSERT INTO cart (user_id, category_id, product_id) VALUE(?, ?, ?)");
        $statement->bind_param("iii", $userId, $categoryId, $productId);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}