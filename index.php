<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");

    require_once 'autoload.php';


    $connection = \Database\Database::getInstance();
    $pdo = $connection->getPdo();
    $method = $_SERVER['REQUEST_METHOD'];
    $productsData = json_decode(file_get_contents('php://input'), true);


    switch($method) {
        case 'GET':
            $products = \Controller\ProductController::getAllProducts($pdo);
            echo json_encode($products);
           break;

        case "POST":
            $class = '\\Model\\Products\\' .  ucwords($productsData['type']);
            if(class_exists($class)){
                $product = \Controller\ProductController::insert(new $class($productsData), $pdo);  
            }
            break;

        case "DELETE":
            foreach($productsData as $product) {
                if( \Controller\ProductController::deleteProduct($product['type'], $product['id'], $pdo)) {
                    $response = ['status' => 1, 'message' => 'Products are deleted'];
                } else {
                    $response = ['status' => 0, 'message' => 'Error in deleting products'];
                }
            }
            echo json_encode($response);
            break;    

    }
    
?>