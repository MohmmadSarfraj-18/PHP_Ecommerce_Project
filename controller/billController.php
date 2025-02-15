<?php
    include('../modal/billModal.php');
    class BillController
    {
        public $conn;
        public function __construct() {
            $this->conn = new BillModal();
        }
    }
?>