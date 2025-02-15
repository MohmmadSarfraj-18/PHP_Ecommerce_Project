<?php
    include('../connection/config.php');
    class CancelOrderModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }
        /*----------------------------
            Update LineItem Status
        ----------------------------*/
        public function update_lineItem_status($Id) {
            $updateQuery = "UPDATE order_line_item SET status = 'cancelled' WHERE id = ".$Id." AND NOT status in('cancelled','delivered');";
            $res = mysqli_query($this->config , $updateQuery);
            return $res;
        }
        /*------------------------
            get product Stock
        -------------------------*/
        public function fetch_product_stock($product_Id) {
            $res = mysqli_query($this->config, "SELECT stock FROM products WHERE id = ".$product_Id);
            return $res->fetch_All(MYSQLI_ASSOC);
        }
        /*----------------------------------------------
            update product stock on product cancelled
        -----------------------------------------------*/
        public function update_stock($product_stock , $product_id) {
            $update_Stock = "UPDATE products SET stock = '".$product_stock."' WHERE id = ".$product_id;
            $res = mysqli_query($this->config , $update_Stock);
            return $res;
        }
    }
?>