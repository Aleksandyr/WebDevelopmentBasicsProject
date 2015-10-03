<?php

class ProductsModel extends BaseModel
{
    public function getProductsInCategory($id){
        $statement = self::$db->prepare("SELECT p.id, pc.categoryId, p.name, p.quantity, p.price FROM products p
                                            JOIN products_categories pc
                                            ON pc.productId = p.id
                                            WHERE pc.categoryId = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $restult = $statement->get_result()->fetch_all();
        return $restult;
    }

    public function getFilteredProductsByCategory($id, $from, $size){
        $statement = self::$db->prepare("SELECT p.id, p.name FROM products p
                                            JOIN products_categories pc
                                            ON pc.categoryId = p.id
                                            WHERE pc.categoryId = ?
                                            LIMIT ?, ?");
        $statement->bind_param("iii",$id, $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }
}