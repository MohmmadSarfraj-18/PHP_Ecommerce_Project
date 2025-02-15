<?php
require("../connection/config.php");

class OrderModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-----------------------------------
        Fetch All Orders Table Record
    ------------------------------------*/
    public function fetchAllOrders() {
        $query = "SELECT orders.*, users.name FROM orders INNER JOIN users ON orders.user_id = users.id";
		$result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*--------------------------------
        Fetch Orders Detail Record
    ---------------------------------*/
    public function fetch_Orders_Detail($id) {
        $query = "SELECT order_line_item.*, products.name  as product_name , products.price as product_price , 
        products.color as product_color, category.name as category_name FROM order_line_item 
        INNER JOIN products ON order_line_item.product_id = products.id
        INNER JOIN category ON products.category_id = category.id 
        INNER JOIN orders ON order_line_item.order_id = orders.id
        WHERE order_line_item.order_id =".$_REQUEST['id'];

		$resultOrder = mysqli_query($this->config, $query);
        return $resultOrder->fetch_all(MYSQLI_ASSOC); 
    }
    /*----------------------------------
        GET A Specific Orders Detail
    -----------------------------------*/
    public function getOrderDetail($id) {
        $query = "SELECT id,status FROM order_line_item WHERE id =". $id;
        $result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    /*-----------------------------------
        UPDATE PRODUCT TRACK STATUS
    -----------------------------------*/
    public function update_Product_TrackStatus($data) {
        $query = "UPDATE order_line_item SET status='".$data['status']."' WHERE id = '".$data['id']."'"; 
        $res = mysqli_query($this->config, $query);
        
        return $res;
       
    }
}
?>