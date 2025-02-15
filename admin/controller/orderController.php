<?php
require('../modal/orderModal.php');
class OrderController
{
    public $conn;
    public function __construct() {
        $this->conn = new OrderModal();
    }

    /*----------------------------
        Fetch All Record Ordrs 
    -----------------------------*/
    public function fetchAllOrdersData() {
        return $this->conn->fetchAllOrders();
    }

    /*--------------------------------
        Fetch Orders Detail Record
    ---------------------------------*/
    public function fetchOrdersDetail($id) {
        return $this->conn->fetch_Orders_Detail($id);
    }

    /*-----------------------------------
        Fetch Specific Product_Detail
    ------------------------------------*/
    public function fetchSpecificOrdersDetail($id) {
        return $this->conn->getOrderDetail($id);
    }
    /*------------------------------------------
        Update Order's product Track Status
    -------------------------------------------*/
    public function updateProductStatus($data) {
        return $this->conn->update_Product_TrackStatus($data);
    }
}
?>