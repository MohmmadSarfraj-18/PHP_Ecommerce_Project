<?php
include('../connection/config.php');
class AboutModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-----------------------
        Fetch All Product
    -----------------------*/
    public function fetchAllProducts() {
        $query = "SELECT * FROM products WHERE stock > 0 AND status = 'active' ORDER BY RAND() LIMIT 8;";
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*-----------------------------
        Fetch Searching Product
    ------------------------------*/
    public function find_out_products($data) {
        $query = "SELECT products.* , category.name AS category_name FROM products 
        INNER JOIN category ON products.category_id = category.id 
        WHERE status = 'active' AND stock > 0 AND (category.name LIKE '".$data['searchProduct']."%' OR products.name LIKE '".$data['searchProduct']."%') ORDER BY RAND() LIMIT 8";
        
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }

    
}
?>