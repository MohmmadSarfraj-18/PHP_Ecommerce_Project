<?php
include('../modal/order_detail_modal.php');
class OrderDetailController
{
    public $conn;
    public function __construct() {
        $this->conn = new OrderDetailModal();
    }
    /*-----------------------------
        fetch all order details
    -----------------------------*/
    public function fetch_all_orderDetails($Id) {
        return $this->conn->get_order_details($Id);
    }
}
?>