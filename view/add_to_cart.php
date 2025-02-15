<?php
    $name = $_REQUEST['pageName'];
    $product_id = $_REQUEST['productId'];
    $produ_size = $_REQUEST['size'];
    $product_quantity = $_REQUEST['quantity'];
    $userId = $_REQUEST['userId'];

    if($name == 'about' || $name == 'allproduct' || $name == 'maleProduct' || $name == 'femaleProduct' || $name == 'kidsProduct' || $name == 'productDetail') {
        include('../controller/add_to_cartController.php');
        $conn = new AddToCartController();
        $res = $conn->addToCart($product_id , $produ_size , $product_quantity , $userId);
        if($res) {
            header('location: home.php');
        } else {
            // echo "<script>alert('Product already exists in the carts.') </script>";
            header('location: home.php');
        }
    }
?>