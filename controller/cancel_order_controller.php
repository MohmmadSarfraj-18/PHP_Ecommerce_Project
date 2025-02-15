<?php
include('../modal/cancel_order_modal.php');
class CancelOrderController
{
    public $conn;
    public function __construct() {
        $this->conn = new CancelOrderModal();
    }
    /*-----------------------------
        Update order lineItem
    -----------------------------*/
    public function update_order_lineItem($Id , $Product_id , $product_quantity) {
        $record = $this->conn->update_lineItem_status($Id);
        if($record) {
            //GET products stock value for updating.
            $product_stock = $this->conn->fetch_product_stock($Product_id);
            if($product_stock) { 	
                // add product quantity again in Product stock
                $update_product_stock = ($product_stock[0]['stock'] + $product_quantity);
                $result = $this->conn->update_stock($update_product_stock , $Product_id);
                return $result;
            }
        }
    }
}
?>