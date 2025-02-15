<?php
include('../connection/config.php');
class AllProductsModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-----------------------
        Fetch All Product
    -----------------------*/
    public function fetch_All_Products() {
        $query = "SELECT * FROM products WHERE stock > 0 AND status = 'active';";
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*-----------------------------
        Fetch Searching Product
    ------------------------------*/
    public function find_out_allProducts($data) {
        $query = "SELECT * , category.name AS pro_name FROM products 
        INNER JOIN category ON products.category_id = category.id 
        WHERE status = 'active' AND stock > 0 AND (category.name LIKE '%".$_REQUEST['searchProduct']."%' OR products.name LIKE '%".$_REQUEST['searchProduct']."%')";
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
}
?>