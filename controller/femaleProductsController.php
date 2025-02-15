<?php
include('../modal/femaleProductsModal.php');
class FemaleProductsController
{
    public $conn;
    public function __construct() {
        $this->conn = new FemaleProductsModal();
    }

    /*-------------------------------
        Fetch All Female products
    --------------------------------*/
    public function fetch_allFemaleProducts() {
        return $this->conn->fetch_All_femaleProducts();
    }
    /*--------------------------------
         Search Kids AllProducts 
    --------------------------------*/
    public function search_female_allProducts($searchingData) {
        return $this->conn->find_out_allProducts($searchingData);
    }
}
?>

