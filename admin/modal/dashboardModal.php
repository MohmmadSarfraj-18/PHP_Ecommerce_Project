<?php
    require("../connection/config.php");
    class DashboardModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }

        public function fetchAllDetails() {
            $categoryCountQuery = "SELECT COUNT(id) as total_record FROM category";
            $productCountQuery = "SELECT COUNT(id) as total_record FROM products";
            $orderCountQuery = "SELECT COUNT(id) as total_record FROM orders";
            $userCountQuery = "SELECT COUNT(id) as total_record FROM users";
    
            $res = mysqli_query($this->config, $categoryCountQuery);
            $res1 = mysqli_query($this->config, $productCountQuery);
            $res2 = mysqli_query($this->config, $orderCountQuery);
            $res3 = mysqli_query($this->config, $userCountQuery);
    
            $categoryCount = $res->fetch_all(MYSQLI_ASSOC);
            $productCount = $res1->fetch_all(MYSQLI_ASSOC);
            $orderCount = $res2->fetch_all(MYSQLI_ASSOC);
            $userCount = $res3->fetch_all(MYSQLI_ASSOC);
            
            $arr = array($categoryCount[0]['total_record'],$productCount[0]['total_record'],$orderCount[0]['total_record'],$userCount[0]['total_record']);
            return $arr;
        }
    }

?>