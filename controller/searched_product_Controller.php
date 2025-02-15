<?php
include('../modal/searched_productModal.php');
class SearchedProductController
{
    public $conn;
    public function __construct() {
        $this->conn = new ProductDetailModal();
    }

    /*------------------------------------
        Fetch Specific Product Details
    ------------------------------------*/
    public function fetch_product_detail($product_name) {   // searching according to product name and fetch all products
        var_dump($product_name);
        return $this->conn->getProductDetail($product_name);
    }
}
?>
