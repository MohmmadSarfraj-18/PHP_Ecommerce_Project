<?php
include('../connection/config.php');
class ProductDetailModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-----------------------------------
        Get particular Product Detail
    ------------------------------------*/
    public function getProductDetail($productID) {
        $query = "SELECT products.* , category.name AS category_name FROM products 
        INNER JOIN category ON category.id = products.category_id 
        WHERE products.id = ".$productID;
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
}
?>