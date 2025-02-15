<?php
require('../connection/config.php');
class AddToCartModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*---------------------------------
        get specific Product Stock
    ---------------------------------*/
    public function getProduct_Stock($proID) {
        $query_product_Stock = "SELECT stock FROM products WHERE id=".$proID;
        $res = mysqli_query($this->config , $query_product_Stock);
        return $res->fetch_All(MYSQLI_ASSOC);
    }

    /*-------------------------
           Update Carts
    --------------------------*/
    public function update_carts($proSize , $product_qty , $proID) {
        // var_dump($proSize , $product_qty , $proID);
        $updateProduct = "UPDATE carts SET product_size = '".$proSize."', quantity = '".$product_qty."' WHERE product_id = ".$proID;
        $res = mysqli_query($this->config , $updateProduct);
        return $res;
    }
    /*--------------------------------------------
        Get Specific login users Carts Record
    --------------------------------------------*/
    public function check_duplicasy($userID) {
        $query = "SELECT * FROM carts WHERE user_id = ".$userID;
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*------------------------------
           product Add To cart
    ------------------------------*/
    public function add_productTo_cart($proID , $proSize , $product_qty , $userID) {
        // var_dump($proID , $proSize , $product_qty , $userID);
        $query = "INSERT INTO carts(product_id,quantity,user_id,product_size) values('".$proID."','".$product_qty."','".$userID."','".$proSize."')";
        $res = mysqli_query($this->config , $query);
        return $res;
    }
}
?>