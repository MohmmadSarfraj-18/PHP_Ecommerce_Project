<?php 
include('../controller/checkoutController.php');
$conn = new CheckoutController();
ob_start();
include_once('header.php'); 

    if(!isset($_SESSION['user_id'])) {  
        header('location: login.php'); 
    }

    if(isset($_REQUEST['checkoutProduct'])) {  // query fore multiple products Checkout
        $record = $conn->fetch_multiCart_record($_REQUEST['checkoutProduct'] , $_SESSION['user_id']);
    } 
    else if(isset($_REQUEST['id'])) {  // query fore single products Checkout
        $record = $conn->fetch_singleCart_record($_REQUEST['id']);
    } 
    else {
        echo "<script>alert('Please Select Atleast One Product')</script>";
        echo "<script>location.replace('cart.php')</script>";
    }
    $cartsRecord = $record;

    /* UPDATE ADDRESS WORK START */
    if(!empty($_REQUEST['update_address']) == "update_address") {
        $record = $conn->update_delivery_address($_REQUEST['my_address'] , $_SESSION['user_id']);

        if($record){
            /* NEW Update Address Assign INTO $_SESSION ADDRESS variable */
            $_SESSION['user']['delivery_address'] = $_REQUEST['my_address'];
        }
    }
    /* UPDATE ADDRESS WORK END */

    /* Payment WORK START */
    if(!empty($_REQUEST['checkout']) &&  isset($_REQUEST['total_amount']) > 0) {
        // Insert Record INTO orders Table
        $result = $conn->payment($_REQUEST , $_SESSION['user_id'] , $cartsRecord);
        if($result) {
            if(!empty($_REQUEST['id'])) {
                $res = $conn->remove_single_productTo_carts($_REQUEST['id']);
                if($res)    echo "<script>alert('single carts products deleted..!!')</script>";
            } else {
                $res = $conn->remove_multiple_productTo_carts($_REQUEST['checkoutProduct']);
                if($res)    echo "<script>alert('multiple carts products deleted..!!')</script>";
            }
            echo "hello mohammad this product removed from your Carts";
            header('location: ../index.php'); 
        }
    }
?>

<div class="container">
    <main class="py-4">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php 
                        $totalAmount = 0;
                        $pro_quantity = 0;
                        $productId = 0;
                        
                        foreach ($cartsRecord as $value) { 
                            // var_dump($value);
                            $productId = $value['product_id'];                          // store product id for insert into orders table 
                            $pro_quantity = $value['quantity'];
                            $totalAmount += ($value['product_price'] * $value['quantity']);
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <span class="my-0 text-capitalize">
                                <?php echo $value['product_name']." | ".$value['category_name'] ;?>
                            </span>
                            <br/>
                            <small class="text-body-secondary">
                                Color: <?php echo  $value['product_color'].' | Size:  '.$value['product_size'];?>
                            </small>
                        </div>
                        <span class="text-body-secondary">₹<?php echo ($value['product_price'] * $value['quantity']) ;?></span>
                    </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (INR)</span>
                        <strong>₹<?php echo $totalAmount ;?></strong>
                    </li>
                </ul>

                <!-- UPDATE Address START -->
                <p class="border-top m-1">
                    <div class="fw-bold text-muted fst-italic">Delivery Address :-</div>
                    <?php echo $_SESSION['user']['delivery_address'];?>
                </p>
                <hr/>
                <div class="d-flex justify-content-between">
                    <span>Change Address</span>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Change</button>
                </div>
                <!-- OPEN MODAL FOR UPDATE ADDRESS -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fst-italic" id="exampleModalLabel">Update Address </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                            </div>

                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Address:</label>
                                        <textarea class="form-control" name="my_address"><?php echo $_SESSION['user']['delivery_address'];?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">  
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="update_address" value="update" class="btn btn-outline-primary">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- UPDATE Address END -->
            </div>

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Choose Payment Mode</h4>
                <form class="" action="" method="post">

                    <!-- store total_amount and insert in orders from here -->
                    <input type="hidden"  required="" name="total_amount" value="<?php echo $totalAmount ;?>" > 
                    <input type="hidden"  required="" name="pro_id" value="<?php echo $productId ; ?>" > 
                    <!-- <input type="hidden"  required="" name="product_qty" value="<?php //echo $pro_quantity; ?>" >  -->
                      
                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="upiRadio" name="paymentMethod" value="upi">
                            <label for="upiRadio">UPI</label>
                        </div>
                        <div id="upiFields" class="d-none row">
                            <div class="form-group col-6">
                                <label for="upiId">UPI ID:</label>
                                <input type="text" class="form-control" id="upiId" name="upiId">
                            </div>
                            <div class="form-group col-6">
                                <label for="pinNumber">PIN Number:</label>
                                <input type="password" class="form-control" id="pinNumber" name="pinNumber">
                            </div>
                           
                            <div class="form-group col-12">
                                <img src="assets/image/qrcode.png" alt="QR Code" class="img-fluid" width="200">
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="qrCodeRadio" name="paymentMethod" value="net banking">
                            <label for="qrCodeRadio">Net Banking</label>
                        </div>
                        <div id="qrCodeImage" class=" d-none row">
                               
                            <div class="form-group col-6">
                                <label for="pinNumber">Account Number:</label>
                                <input type="text" class="form-control" id="pinNumber" name="accountNumber">
                            </div>
                            <div class="form-group col-6">
                                <label for="upiId">Password:</label>
                                <input type="password" class="form-control" id="upiId" name="password">
                            </div>

                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="codRadio" name="paymentMethod" value="offline" checked>
                            <label class="form-check-label" for="codRadio">Cash on Delivery</label>
                        </div>
                    </div>

                    <hr class="my-4"/>

                    <input class="w-100 btn btn-primary btn-lg" type="submit" name="checkout" value="Continue to checkout">
                </form>
            </div>
        </div>
    </main>

<?php include_once('footer.php'); ?>

<!-- else if(!empty($_REQUEST['buy'])) {
        $record = $conn->fetch_productData_toBuy( $_REQUEST['productID'] );
        $productID = $_REQUEST['productID'];
        $productQty = $_REQUEST['productQuantity'];
        $productSize = $_REQUEST['product_size'];
    }  -->