<?php
require('../modal/productModal.php');
class ProductController
{
    public $conn;
    public function __construct() {
        $this->conn = new ProductModal();
    }

    /*----------------------------------
         Fetch All Products Record
    ----------------------------------*/
    public function fetchAllProducts() {
        return $this->conn->fetchProductsRecord();
    }

    /*--------------------------------------
             Fetch Category Reocrd
    ---------------------------------------*/
     public function fetchCategoryData() {
        return $this->conn->fetchCatgoryRecords();
    }

    /*----------------------------
        ADD Proucts In Table
    ----------------------------*/
    public function addProduct($productData , $productImage , $target_path) {

        $productRecord = $this->conn->getProductsRecord($productData['category_id']);
        $isProductDuplicate = false;
        // Check Product Duplicasy
        foreach ($productRecord as $key => $value) {
            // var_dump($value);
            if(
                strtoupper($value['name']) == strtoupper( $productData['name']) && 
                strtoupper($value['category_id']) == strtoupper($productData['category_id']) && 
                strtoupper($value['type']) == strtoupper($productData['type'])
            ) {
                $isProductDuplicate = true;
                break;
            }
        }

        if(!$isProductDuplicate) {
            $this->conn->addNewProduct($productData , $productImage , $target_path);
        } else {
            echo "<div class='mt-5 alert alert-danger text-center text-capitalize'>ERROR : duplicate product Not Allowed..!!</div>";
        }
    }
    /*---------------------------------------
            Get specific Product Record
    ---------------------------------------*/ 
    public function getSpecificProductRecord($productId) {
        return $this->conn->getProductRecord($productId);
    }
    /*--------------------------
        Update Product Detail
    --------------------------*/
    public function updateProductRecord($pro_detail , $imageFileName , $file_target) {
        return $this->conn->updateProductDetail($pro_detail , $imageFileName , $file_target);
    }
    
    /*----------------------
        DELETE Product
    ----------------------*/
    public function deleteProduct($pro_Data) {
        $this->conn->deleteSpecificProduct($pro_Data['tname'] , $pro_Data['id']);
    }
    
}
?>