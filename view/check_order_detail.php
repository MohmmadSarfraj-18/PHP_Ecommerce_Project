<?php
    require('header.php'); 
    include('../controller/check_productDetail_controller.php');
    $conn = new CheckProductDetailController();
    $record = $conn->fetch_ProductDetail($_REQUEST['id']);
    // var_dump($record);
?>

<div class="container" style="margin-top: 6rem;">
    <h2 id="heading" class="pb-2 border-bottom mb-3 text-muted">Order Status #<?php echo $_REQUEST['id']; ?></h2>
    <!-- <a href="order_detail.php">Back</a> -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 ">
                <div class="row m-0">
                    <div class="col-lg-5 col-md-5">
                        <img src="../<?php echo $record[0]['product_image'] ?>" alt="product_image" class="img-thumbnail" width="200" height="200" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="list-unstyled" style="line-height:25px">
                            <li class="text-capitalize fw-bold  fs-5"><?php echo $record[0]['name']." , ".$record[0]['category_name'] ;?></li>
                            <!-- <li><?php //echo $record[0]['category_name'] ;?></li> -->
                            <li class="text-capitalize"><?php echo $record[0]['description'] ;?></li>
                            <li class="text-capitalize">
                                ₹ <font color="red"><b> <?php echo $record[0]['price'] ;?></b></font>
                                <span>
                                    MRP <s>₹ <?php echo $record[0]['price'] * 2 ?></s> <font color="red">(50% off)</font>
                                </span>
                            </li>
                            <li class="text-capitalize">Size - <?php echo $_REQUEST['productSize'] ;?></li>
                            <li class="text-capitalize">color - <?php echo $record[0]['color'] ;?></li>
                            <li class="text-capitalize">Qty. - <?php echo $record[0]['quantity'] ;?></li>
                        </ul>
                        <!-- Delivery Address -->
                        <div class="mt-3 border-top border-dark">
                            <span class="text-capitalize fw-light fs-6">Delivery Address</span>
                            <div class="fst-italic fw-bold text-muted"><?php echo $_SESSION['user']['name'] ;?></div>
                            <p class="text-capitalize"><?php echo $_SESSION['user']['delivery_address'] ."<br/>". $_SESSION['user']['city']." , ".$_SESSION['user']['state']." , ".$_SESSION['user']['pincode']."<br/>".$_SESSION['user']['phone_no'] ;?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="timeline">
                    <li class="timeline-item <?php echo ($_REQUEST['order_status'] == 'pending')? $_REQUEST['order_status']:'';?>">
                        <span class="status">Order Placed</span>
                        <p>Order placed successfully. Waiting for processing.</p>
                    </li >
                    <li class="timeline-item <?php echo ($_REQUEST['order_status'] == 'shipped')? $_REQUEST['order_status']:'';?>">
                        <span class="status">Shipped</span>
                        <p>Your order has been shipped. It's on its way to you.</p>
                    </li>
                    <li class="timeline-item <?php echo ($_REQUEST['order_status'] == 'out_of_delivery')? $_REQUEST['order_status']:'';?>">
                        <span class="status">Out of delivery</span>
                        <p>Your order's delivery will be happening soon</p>
                    </li>
                    <li class="timeline-item <?php echo ($_REQUEST['order_status'] == 'delivered')? $_REQUEST['order_status']:'';?>">
                        <span class="status">Delivered</span>
                        <p>Your order is successfully delivered. Thank you!</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>
