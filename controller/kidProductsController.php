<?php
include('../modal/kidProductsModal.php');
class KidProductsController
{
    public $conn;
    public function __construct() {
        $this->conn = new KidProductsModal();
    }

    /*-------------------------------
        Fetch All Female products
    --------------------------------*/
    public function fetch_allKidsProducts() {
        return $this->conn->fetch_All_KidProducts();
    }
    /*--------------------------
        Fetch Search AllProducts
    ---------------------------*/
    public function search_kids_allProducts($searchingData) {
        return $this->conn->find_out_allProducts($searchingData);
    }
}
?>

