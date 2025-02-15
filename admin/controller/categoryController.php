<?php
    require('../modal/categoryModal.php');
    class CategoryController
    {
        public $conn;
        public function __construct() {
            $this->conn = new CatgeoryModal();
        }

        // Fetch Category Reocrd
        public function fetchCategoryData() {
            return $this->conn->fetchCatgoryRecords();
        }

        // Add Category
        public function addCategory($categoryRecord) {
            return $this->conn->addCategoryName($categoryRecord);
        }
    
        public function getRecordUpdateCategory($updateCategoryRecord) {
            $id = $updateCategoryRecord['id'];
            return $this->conn->getCategoryRecord($id);
        }
    
        public function updateCategory($categoryUpdateRecord) {
            return $this->conn->updateCategoryData($categoryUpdateRecord);
        }
    }
?>