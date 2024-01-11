<?php 


    namespace Model\Products;


    class Book extends \Model\Product {
        public $weight;

        public function __construct(array $productsList) {
            parent::__construct($productsList['sku'], $productsList['name'], $productsList['price']);

            $this->weight = $productsList['weight'];
        }

        public function create(\PDO $pdo) 
        {
            $sql = 'INSERT INTO `book`(id, sku, name, price, weight) VALUES (null, :sku, :name, :price, :weight)';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':sku', $this->sku);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':weight', $this->weight);
            
            return $statement->execute();   
        }

        private function getWeight() {
            return $this->weight;
        }

    }

?>