<?php
include('../modal/checkoutModal.php');
class CheckoutController
{
    public $conn;
    public function __construct() {
        $this->conn = new CheckoutModal();
    }

    /*----------------------------
        fetch Multi Cart Data
    ----------------------------*/
    public function fetch_multiCart_record($productIDArray , $userID) {
        $productsIdString = implode(',',$productIDArray);      // Product_Ids_Array Covert Into String
        return $this->conn->fetchCartRecord($productsIdString , $userID);
    }
    /*-----------------------------
        fetch single Cart Data
    ------------------------------*/
    public function fetch_singleCart_record($id) {
        return $this->conn->fetch_single_record($id);
    }
    /*---------------------------------
        fetch ProductDetail For Buy
    ----------------------------------*/
    public function fetch_productData_toBuy( $productID ) {
        return $this->conn->fetch_recordFor_Buy( $productID );
    }
    /*------------------------------
        update Delivery Address
    ------------------------------*/
    public function update_delivery_address($address , $userId) {
        return $this->conn->edit_delivery_address($address , $userId);
    }

    /*-------------------
        Prder Payment
    --------------------*/
    public function payment($data , $userID , $cartsRecord , $productQty , $product_ID , $productSize) {
        // var_dump($data);
        $order_id = $this->conn->order_payment($data , $userID);
        if(!empty($order_id)) 
        {
            foreach ($cartsRecord as $val) { 
                var_dump($val);
                // IF PRODUCT STOCK GREATER 0 THEN IT IS SUBTRACT FROM Product Quantity
                if((!empty($val['product_stock'])? $val['product_stock'] : $val['stock']) > 0) {
                    $product_stock = ((!empty($val['product_stock'])? $val['product_stock'] : $val['stock']) - (!empty($val['quantity'])? $val['quantity'] : $productQty));        // Stock calculation 
                }
                // var_dump($val);
                // Store Three needed variable for insert Data in Line Item (productID , size , quantity)
                $product_id = (!empty($val['product_id'])? $val['product_id'] : $product_ID );
                $product_size = (!empty($val['product_size'])? $val['product_size'] : $productSize );
                $product_quantity = (!empty($val['quantity'])? $val['quantity'] : $productQty );

                $result = $this->conn->insert_dataTO_lineItem($product_id , $product_quantity , $product_size , $order_id);        // function calling for inser lineItem
                if ($result) echo "Order line item inserted successfully";
                else echo "Error inserting order line item: " . mysqli_error($this->conn);

                $update_stock_result = $this->conn->update_product_Stock($product_stock , $product_id);        // function calling for inser lineItem
                if($update_stock_result) echo "Stock Update Successfully...!!!";
            }  
            return true;
        } else {
            echo "record Not inserted";
        }
    }

    /*-------------------------------------------------------------
        remove single product From Carts After Order Successfull
    --------------------------------------------------------------*/
    public function remove_single_productTo_carts($single_ProductId) {
        //Remove Cart Items
        return $this->conn->remove_single_product($single_ProductId);
    }
     /*---------------------------------------------------------------
        remove multiple product From Carts After Order Successfull
    -----------------------------------------------------------------*/
    public function remove_multiple_productTo_carts($multi_productIds) {
        //Remove multiple Cart Items
        $productsIdString = implode(',',$multi_productIds);
        return $this->conn->remove_multiple_product($productsIdString);
    }
}
?>

