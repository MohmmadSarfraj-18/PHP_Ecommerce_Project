<?php
include('../modal/maleProductsModal.php');
class MaleProductsController
{
    public $conn;
    public function __construct() {
        $this->conn = new MaleProductsModal();
    }

    /*--------------------------
        Fetch All products
    --------------------------*/
    public function fetch_allMaleProducts() {
        return $this->conn->fetch_All_maleProducts();
    }
    /*--------------------------
        Fetch Search AllProducts
    ---------------------------*/
    public function search_mens_allProducts($searchingData) {
        return $this->conn->find_out_allProducts($searchingData);
    }
}
?>

