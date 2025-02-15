<?php
include('../connection/config.php');
class KidProductsModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*----------------------------
        Fetch All Kids Product
    -----------------------------*/
    public function fetch_All_KidProducts() {
        $query = "SELECT * FROM products where  status = 'active' AND type = 'kid' AND stock > 0";
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*-----------------------------
        Searching Kids Product
    ------------------------------*/
    public function find_out_allProducts($data) {
        $query = "SELECT * , category.name AS pro_name FROM products 
        INNER JOIN category ON products.category_id = category.id 
        WHERE type = 'kid' AND status = 'active' AND stock > 0 AND (category.name LIKE '%".$_REQUEST['searchProduct']."%' OR products.name LIKE '%".$_REQUEST['searchProduct']."%')";
        
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
}
?>