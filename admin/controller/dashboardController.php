<?php
    require('../modal/dashboardModal.php');
    class DashboardController
    {
        public $conn;
        public function __construct() {
            $this->conn = new DashboardModal();
        }

        public function fetchAllDetailOfSite() {
            return $this->conn->fetchAllDetails();
        }
    }
?>