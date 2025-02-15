<?php
include('../connection/config.php');
class MyOrderModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }
    /*-----------------------
        Fetch All Orders
    -----------------------*/
    public function getOrdersRecord($userID) {
        $query = "SELECT orders.* , users.delivery_address , users.city , users.state , users.pincode FROM orders 
        INNER JOIN users ON orders.user_id = users.id
        WHERE user_id =".$_SESSION['user_id'];
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
}
?>