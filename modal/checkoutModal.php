<?php
include('../connection/config.php');
class CheckoutModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }
    /*----------------------------
        fetch Multi Cart Data
    ----------------------------*/
    public function fetchCartRecord($productsIdString , $userID) {
        $query = "SELECT carts.*, products.name as product_name , 
        products.price as product_price , products.color as product_color , products.stock as product_stock , category.name AS category_name
        FROM carts INNER JOIN products ON carts.product_id = products.id 
        INNER JOIN category ON products.category_id = category.id
        WHERE products.status = 'active' AND product_id IN ($productsIdString) AND user_id = ".$userID;
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*-------------------------------
        Fetch Simgle Cart Record
    -------------------------------*/
    public function fetch_single_record( $Id ) {
        $query = "SELECT carts.* , products.name as product_name , products.price as product_price , 
        products.color as product_color, products.stock as product_stock , category.name AS category_name
        FROM carts INNER JOIN products ON carts.product_id = products.id 
        INNER JOIN category ON products.category_id = category.id
        WHERE products.status = 'active' AND carts.id = ".$Id;
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }
    /*-----------------------------------
        Fetch Product record for Buy 
    -----------------------------------*/
    public function fetch_recordFor_Buy( $pro_Id ) {
        $query = "SELECT products.* , category.name as category_name FROM products 
        INNER JOIN category ON products.category_id = category.id WHERE products.id = ".$pro_Id;
        $res = mysqli_query($this->config , $query);
        return $res->fetch_All(MYSQLI_ASSOC);
    }

    /*-------------------------------
        Update Delivery Address
    -------------------------------*/
    public function edit_delivery_address($address , $userId) {
        $query = "UPDATE users SET delivery_address	 = '".$address."' WHERE id = ".$userId;
        $res = mysqli_query($this->config , $query);
        return $res;
    }

    /*--------------
        payment 
    --------------*/
    public function order_payment($data , $userID) {
        // var_dump($data);
        $insertQuery = "INSERT INTO orders(user_id, total_amount, payment_mode, transaction_id, order_date, product_id) 
        values('".$userID."','".$data['total_amount']."','".$data['paymentMethod']."','".uniqid()."','".date('Y-m-d H:i:s')."','".$data['pro_id']."');";
        $res = mysqli_query($this->config , $insertQuery);
        if($res) {
            $order_id = mysqli_insert_id($this->config);        // hold recent Insert Record Id From Order Table 
            return $order_id;
        }
    }

    /*--------------------------------
        INSERT product In lineItem
    --------------------------------*/
    public function insert_dataTO_lineItem($productID , $productSize , $productQty , $orderID) {
        // var_dump($productID);
        // var_dump($productSize);
        // var_dump($productQty);
        // var_dump($orderID);
        $orderItemQuery = "INSERT INTO order_line_item(product_id , quantity , order_id , product_size , status) 
        values('".$productID."','".$productSize."','".$orderID."','".$productQty."','pending');";
        $res = mysqli_query($this->config , $orderItemQuery);
        return $res;
    }

    public function update_product_Stock($product_stock , $productId) {
        // Stock UPDATE IN products TABLE for EACH PRODUCT STOCK
        $stockUpdateQurry = "UPDATE products SET stock =" .$product_stock. " WHERE id =". $productId;
        $res = mysqli_query($this->config , $stockUpdateQurry);
        return $res;
    }

    /*-------------------------------------
        remove Single Product From Cart
    --------------------------------------*/
    public function remove_single_product($Id) {
        $delQuery = "DELETE FROM carts WHERE id=".$Id;
        $res = mysqli_query($this->config , $delQuery);
        return $res;
    }
    /*---------------------------------------
        remove Multiple Product From Cart
    ----------------------------------------*/
    public function remove_multiple_product($productsIdString) {
        $delQuery = "DELETE FROM carts WHERE product_id IN ($productsIdString)";
        $res = mysqli_query($this->config , $delQuery);
        return $res;
    }

}
?>