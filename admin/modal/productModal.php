<?php
require("../connection/config.php");

class ProductModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }
    /*----------------------------------
        Fetch Product Table Records
    -----------------------------------*/
    public function fetchProductsRecord() {
        $query = "SELECT products.*, category.name as category_name FROM products INNER JOIN category ON products.category_id = category.id;";
        $result = mysqli_query($this->config, $query);
        $products_records = $result->fetch_all(MYSQLI_ASSOC); 
        return $products_records;
    }

    /*-------------------------------------
          Fetch Category Table Record
    -------------------------------------*/
    public function fetchCatgoryRecords() {
        $query = "SELECT * FROM category";
        $result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    /*------------------------------------
        Get Products Specific Details
    -------------------------------------*/
    public function getProductsRecord($category_id) {
        $query = "SELECT products.* , category.name AS cateogory_name FROM products INNER JOIN category ON products.category_id = ".$_REQUEST['category_id'];
        $result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
        }
    /*-----------------------
        Add New Product
    -----------------------*/
    public function addNewProduct($productData , $productImageName , $target_path) {
        // IMAGE FILE UPLOAD START
        $image_url = "attechment/".uniqid().'.'.pathinfo($productImageName, PATHINFO_EXTENSION); 
        move_uploaded_file($target_path,   '../../'.$image_url); 
        // IMAGE FILE UPLOAD END
        
        $query = "INSERT INTO products(category_id,name,price,size,color,status,description,product_image,type,stock) 
        values('".$productData['category_id']."','".$productData['name']."','".$productData['price']."','".implode(", ",$productData['size'])."','".$productData['color']."','".$productData['status']."','".$productData['description']."','".$image_url."','".$productData['type']."','".$productData['stock']."')";

        $data = mysqli_query($this->config , $query);
        if($data){
            // header('location: products.php'); 
            echo "<script>location.href='products.php'</script>";
        }  
    }
    /*-----------------------------------------
         Findout A Specific Product Record
    -----------------------------------------*/
    public function getProductRecord($pro_Id) {
        $query = "SELECT * FROM products WHERE id = ".$pro_Id; 
        $result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    /*----------------------------------------
          Update findout's Product Record
    -----------------------------------------*/
    public function updateProductDetail($pro_detail , $imageFileName , $target_path) {
        if(empty($imageFileName)){
            $image_url = $pro_detail['image_url'];
        } else {
            $image_url = "attechment/".uniqid().'.'.pathinfo($imageFileName, PATHINFO_EXTENSION); 
            move_uploaded_file($target_path,   '../../'.$image_url);
            //File Old Remove
            if(file_exists($pro_detail['image_url'])){
                unlink('../../'.$pro_detail['image_url']);   // if admin update an image then udated image will add in folder and delete replaced image
            } 
        }
        $query = "UPDATE products SET category_id='".$pro_detail['category_id']."' ,name='".$pro_detail['name']."', price='".$pro_detail['price']."', color='".$pro_detail['color']."', size='".implode(", ",$pro_detail['size'])."', type='".$pro_detail['type']."', description='".$pro_detail['description']."', product_image='".$image_url."',status='".$pro_detail['status']."',stock='".$pro_detail['stock']."' WHERE id = '".$pro_detail['id']."'"; 
        $result = mysqli_query($this->config, $query);
        return $result;
    }

    /*-----------------------
        DELETE PRODUCT
    -----------------------*/
    public function deleteSpecificProduct($tableName , $productID) {
        $deleteQuery = "DELETE FROM ".$tableName." WHERE id = ".$productID; 
		$result = mysqli_query($this->config, $deleteQuery);

        if($result){
            // header('location: '.$_REQUEST['table_name'].'.php');
            echo "<script>location.href='".$tableName."'</script>";
        }else{
            echo '<div class="alert alert-danger mt-5" role="alert">Error: Delete failed.</div>';
        }
    }
}

?>