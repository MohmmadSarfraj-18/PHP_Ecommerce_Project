<?php
include_once('../modal/cartModal.php');
class CartController
{   
    public $conn;
    public function __construct() {
        $this->conn = new CartModal();
    }

    /*------------------------
        fetch User Carts
    -------------------------*/
    public function fetch_user_cart() {
        return $this->conn->userCarts();
    } 
    /*-------------------------------
        Remove Product From Carts 
    --------------------------------*/
    public function remove_productTOCart($productID) {
        return $this->conn->removeProduct($productID);
    } 

}
?>