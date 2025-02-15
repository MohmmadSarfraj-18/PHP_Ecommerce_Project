<?php
    include('../connection/config.php');
    class OrderDetailModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }
        /*------------------------
            fetch order detail
        ------------------------*/
        public function get_order_details($Id) {
            $query = "SELECT order_line_item.*, products.product_image ,products.name  as product_name , products.price as product_price , 
            products.color as product_color, products.description AS product_Description , category.name as category_name FROM order_line_item 
            INNER JOIN products ON order_line_item.product_id = products.id
            INNER JOIN category ON products.category_id = category.id 
            INNER JOIN orders ON order_line_item.order_id = orders.id 
            WHERE order_line_item.order_id =".$Id;
            $res = mysqli_query($this->config , $query);
            return $res->fetch_All(MYSQLI_ASSOC);
        }
    }
?>