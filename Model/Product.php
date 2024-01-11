<?php 

    namespace Model;

    abstract class Product {
        public $sku;
        public $name;
        public $price;

            public function __construct(string $sku, string $name, string $price) {
                $this->sku = $sku;
                $this->name = $name;
                $this->price = $price;
            }

            abstract public function create(\PDO $pdo);  

            public function getSku(): string {
                return $this->sku;
            }
            public function getName(): string {
                return $this->name;
            }
            public function getPrice(): string {
                return $this->price;
            }  

    }
    



?>