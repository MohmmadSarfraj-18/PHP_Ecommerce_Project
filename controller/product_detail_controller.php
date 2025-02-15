<?php
include('../modal/product_detail_modal.php');
class ProductDetailController
{
    public $conn;
    public function __construct() {
        $this->conn = new ProductDetailModal();
    }

    /*------------------------------------
        Fetch Specific Product Details
    ------------------------------------*/
    public function fetch_product_detail($product_ID) {
        var_dump($product_ID);
        return $this->conn->getProductDetail($product_ID);
    }
}
?>
