<?php
    include('../connection/config.php');
    class CheckProductDetailsModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }
        /*----------------------------
            fetch product details
        ----------------------------*/
        public function fetch_all_product_details($Id) {
            $query = "SELECT order_line_item.* , products.product_image , products.name , products.color , products.price , 
            products.description , category.name AS category_name FROM order_line_item  
            INNER JOIN products ON order_line_item.product_id = products.id   
            INNER JOIN category ON products.category_id = category.id   
            WHERE order_line_item.id=".$Id;
            $res = mysqli_query($this->config , $query);
            return $res->fetch_All(MYSQLI_ASSOC);
        }
    }
?>