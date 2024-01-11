<?php 

namespace Controller;
use Model\Product;
use PDO;
class   ProductController
{
    public static function getAllProducts(PDO $pdo): array
    {
        $sql = "SELECT 'book' AS type, id, sku, name, price, weight, NULL AS size, NULL AS height, NULL AS width, NULL AS length 
        FROM book
        UNION
        SELECT 'dvd' AS type, id, sku, name, price, NULL AS weight, size, NULL AS height, NULL AS width, NULL AS length 
        FROM dvd
        UNION
        SELECT 'furniture' AS type, id, sku, name, price, NULL AS weight, NULL AS size, height, width, length 
        FROM furniture";
        $statm = $pdo->prepare($sql);
        $statm->execute();
        $products = $statm->fetchAll();
        return $products;
    }

    public static function insert(Product $product, PDO $pdo) {
        echo 'Insert Function is worked';
         $product->create($pdo);
    }

    public static function deleteProduct(string $type, string $id, PDO $pdo) {
        $sql = "DELETE FROM $type WHERE id = $id; ";
        
       if(!empty($sql)) {
            $statement = $pdo->prepare($sql);
            if ($statement->execute()) {
                return true;
            }
       }
    }
}

?>