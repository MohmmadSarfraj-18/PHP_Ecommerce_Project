<?php
require('../modal/add_to_cartModal.php');
class AddToCartController
{
    public $conn;
    public function __construct() {
        $this->conn = new AddToCartModal();
    }


    /*---------------------
          Add To Cart 
    ---------------------*/
    public function addToCart($proID , $proSize , $product_qty , $userID) {

        $record = $this->conn->getProduct_Stock($proID);
        // var_dump($record);
        $finalResult = false;
        if($product_qty <= $record[0]['stock']) 
        {
            // UPDATE QUERY IF user want Change Product Quantity And Size Before product Checkout   (when a user click on add to card btn then update quary also fired)
            $res = $this->conn->update_carts($proSize , $product_qty , $proID);
            // var_dump($res);

            // Check Duplicasy
            $cartRecord = $this->conn->check_duplicasy($userID);
            
            $check_product_exists = false;
            foreach ($cartRecord as $key => $value) {
                if($value['product_id'] == $proID && $value['product_id']) {
                    $check_product_exists = true;
                    break;      // Exit the loop once product is found
                }
            }

            if(!$check_product_exists) {
                // INSERT Product INTO CART TABLE
                $result = $this->conn->add_productTo_cart($proID , $proSize , $product_qty , $userID);
                if($result) {
                    $finalResult = true;
                } else {
                    echo '<div class="alert alert-danger mt-5" role="alert">Error: Insert failed.</div>';
                } 
            } 
        } else {
            echo "<script>alert('We Have Limited Stock Of This Product So please Select Again Your product With quantity')</script>";
            echo "<script>location.href='../index.php'</script>";
        }
        return $finalResult;
    }
}
?>