<?php

class CartModel extends BaseModel
{
    public function getAllProductsByUser($id){
        $statement = self::$db->prepare("SELECT p.id, p.name, p.price, c.quantity, c.id, pc.categoryId, cat.name
                                                    FROM products p
                                                      JOIN cart c
                                                        ON c.product_id = p.id
                                                      JOIN products_categories pc
                                                        ON pc.productId = p.id
                                                      JOIN categories cat
                                                         ON cat.id = pc.categoryId
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


    public function decreaseQuantityForCurrProduct($productId) {
        $statement = self::$db->prepare("UPDATE products
                                            SET quantity = quantity - 1
                                            WHERE id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
    }

    public function IncreaseQuantityForCurrProduct($productId) {
        $statement = self::$db->prepare("UPDATE products
                                            SET quantity = quantity + 1
                                            WHERE id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
    }

    public function checkQuantityByProduct($productId) {
        $statement = self::$db->prepare("SELECT quantity FROM products WHERE id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }

    public function checkForSameProductInCart($categoryId, $productId){
        $statement = self::$db->prepare("SELECT id FROM cart
                                                where category_id = ? &&
                                                      product_id = ?");
        $statement->bind_param("ii", $categoryId, $productId);
        $statement->execute();
        return $statement->get_result()->fetch_all();
    }

    public function IncreaseQuantityForCurrProductCart($id) {
        $statement = self::$db->prepare("UPDATE cart
                                            SET quantity = quantity + 1
                                            WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
    }

    public function decreaseQuantityFromCart($categoryId, $productId){

        $statement = self::$db->prepare("UPDATE cart
                                             SET quantity = quantity - 1
                                             WHERE category_id = ? && product_id = ?");
        $statement->bind_param("ii", $categoryId, $productId);
        $statement->execute();

    }

    public function deleteFromCart($id){
        $statement = self::$db->prepare("DELETE FROM cart WHERE id=?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function increaseUserMoney($money, $id){
        $statement = self::$db->prepare("UPDATE users
                                            set Cash = Cash + ?
                                            WHERE id = ?");
        $statement->bind_param("di", $money, $id);
        $statement->execute();
    }

    public function decreaseUserMoney($money, $id){
        $statement = self::$db->prepare("UPDATE users
                                            set Cash = Cash - ?
                                            WHERE id = ?");
        $statement->bind_param("di", $money, $id);
        $statement->execute();
    }

    public function getCurrProductMoney($productId){
        $statement = self::$db->prepare("SELECT price FROM products
                                            WHERE id = ?");
        $statement->bind_param("i", $productId);
        $statement->execute();
        return $statement->get_result()->fetch_row();
    }
}