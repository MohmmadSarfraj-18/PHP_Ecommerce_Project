<?php
include_once('../connection/config.php');
class CartModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*------------------------
        fetch User Carts
    -------------------------*/
    public function userCarts() {
        $query = "SELECT carts.* , products.product_image , products.name AS product_name , products.color AS product_color , products.color , products.price 
        FROM carts INNER JOIN products ON carts.product_id = products.id 
        WHERE carts.user_id =". $_SESSION['user_id'];
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*------------------------
           Remove Product
    -------------------------*/
    public function removeProduct($product_Id) {
        $queryDel = "DELETE FROM carts WHERE carts.product_id = ".$_REQUEST['id'];
        $res = mysqli_query($this->config , $queryDel);
        return $res;
    }
}
?>