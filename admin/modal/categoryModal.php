<?php
    require("../connection/config.php");
    
    class CatgeoryModal
    {
        public $config;
        public function __construct() {
            $conn = new Connection();
            $this->config = $conn->connect();
        }

        //  Fetch Category Table Record
        public function fetchCatgoryRecords() {
            $query = "SELECT * FROM category";
            $result = mysqli_query($this->config, $query);
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        // ADD CATEGORY
        public function addCategoryName($categoryData) {
            //ALL RECORDS OF CATEGORY TABLE
            $query = "SELECT * FROM category";
            $result = mysqli_query($this->config, $query); 
            $category_records = $result->fetch_all(MYSQLI_ASSOC);

            $isCategoryDuplicate = false;
            foreach($category_records as $key => $value) {
                if($value['name'] == $categoryData['name'])
                {
                    $isCategoryDuplicate = true;
                    break;
                }
            }

            if(!$isCategoryDuplicate) {   
                $query = "INSERT INTO category(name) values('".$categoryData['name']."')";
                $data = mysqli_query($this->config , $query);
                if($data){
                    // header('location: category.php');
                    echo "<script>location.href='category.php'</script>";
                }else{
                    echo '<script>alert(<div class="text-center alert alert-danger mt-5" role="alert">Error: Insert failed.</div>)</script>';
                }
            } else {
                echo '<div class="text-center alert alert-danger mt-5" role="alert">Error: Duplicate Category Not Allowed.</div>';
            }
        }
        // GET RECORD FOR CATEGORY UPDATE
        public function getCategoryRecord($category_id) {
            $query = "SELECT * FROM category WHERE id = ".$category_id; 
            $result = mysqli_query($this->config, $query); 
            $category_records = $result->fetch_all(MYSQLI_ASSOC); 
            return $category_records;
        }
        //  UPDATE  CATEGORY
        public function updateCategoryData($category) {
            $query = "UPDATE category SET name='".$category['name']."' WHERE id = '".$category['id']."'"; 
            $result = mysqli_query($this->config, $query); 
            if($result){
                // header('location: category.php'); 
                echo "<script>location.href='category.php'</script>";
                return true;
            }else{
                echo '<div class="text-center alert alert-danger mt-5" role="alert">Error: Update failed.</div>';
            }
        }
    }
?>