<?php
    include('../connection/config.php');
    class BillModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }
    }
?>