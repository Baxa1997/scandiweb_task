<?php 

    namespace Model\Products;

    class Furniture extends \Model\Product {
        private $width;
        private $height;
        private $length;

        public function __construct(array $productsList){
            parent::__construct($productsList['sku'], $productsList['name'], $productsList['price']);

            $this->width = $productsList['width'];
            $this->height = $productsList['height'];
            $this->length = $productsList['length'];
        }
        public function create(\PDO $pdo) 
        {
            $sql = 'INSERT INTO `furniture`(id, sku, name, price, width, height, length) VALUES (null, :sku, :name, :price, :width, :height, :length)';
            $statement = $pdo->prepare($sql);
            $statement->bindParam(':sku', $this->sku);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':price', $this->price);
            $statement->bindParam(':width', $this->width);
            $statement->bindParam(':height', $this->height);
            $statement->bindParam(':length', $this->length);
        
            return $statement->execute();
        }

        public function getWidth() {
            return $this->width;
        }

        public function getHeight(){
            return $this->height;
        }

        public function getLength() {
            return $this->length;
        }
    }

?>