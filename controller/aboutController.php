<?php
include('../modal/aboutModal.php');
class AboutController
{
    public $conn;
    public function __construct() {
        $this->conn = new AboutModal();
    }

    /*--------------------------
        Fetch All products
    --------------------------*/
    public function fetch_products() {
        return $this->conn->fetchAllProducts();
    }
    /*--------------------------
        Fetch Search products
    ---------------------------*/
    public function fetch_search_products($searchingData) {
        return $this->conn->find_out_products($searchingData);
    }
}
?>