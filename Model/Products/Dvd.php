<?php 

    namespace Model\Products;

    class Dvd extends \Model\Product
    {
        private $size;

        public function __construct(array $productsList)
        {
            parent::__construct($productsList['sku'], $productsList['name'], $productsList['price']);

            $this->size = $productsList['size'];

        }
        public function create(\PDO $pdo)
        {
            $sql = 'INSERT INTO `dvd`(id, sku, name, price, size) VALUES (null, :sku, :name, :price, :size)';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':sku', $this->sku);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':size', $this->size);
            
            return $statement->execute();
        }

        private function getSize(): string
        {
            return $this->size;
        }
    }



?>