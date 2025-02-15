<?php
include('../modal/my_order_modal.php');
class MyOrderController
{
    public $conn;
    public function __construct() {
        $this->conn = new MyOrderModal();
    }

    /*------------------------
        Fetch All Records
    ------------------------*/
    public function fetchAllOrdersRecord($userID) {
        return $this->conn->getOrdersRecord($userID);
    }
}
?>