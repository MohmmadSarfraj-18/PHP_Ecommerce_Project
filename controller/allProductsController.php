<?php
include('../modal/allProductsModal.php');
class AllProductsController
{
    public $conn;
    public function __construct() {
        $this->conn = new AllProductsModal();
    }

    /*--------------------------
        Fetch All products
    --------------------------*/
    public function fetch_allProducts() {
        return $this->conn->fetch_All_Products();
    }
    /*--------------------------
        Fetch Search AllProducts
    ---------------------------*/
    public function fetch_search_allProducts($searchingData) {
        return $this->conn->find_out_allProducts($searchingData);
    }
}
?>

