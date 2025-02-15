<?php
    include('../modal/check_productDetail_modal.php');
    class CheckProductDetailController
    {
        public $conn;
        public function __construct() {
            $this->conn = new CheckProductDetailsModal();
        }
        /*-----------------------------
            fetch Product Details
        -----------------------------*/
        public function fetch_ProductDetail($Id) {
            return $this->conn->fetch_all_product_details($Id);
        }
    }
?>