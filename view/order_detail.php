<?php 
    include('../controller/order_detail_controller.php');
    $conn = new OrderDetailController();
    require('header.php');

    $record = $conn->fetch_all_orderDetails($_REQUEST['id']);
    // var_dump($record);

?>

<div class="container table-responsive" style="margin-top: 6rem;">
    <h2 id="heading" class="pb-2 border-bottom mb-3 text-muted">Order Detail #<?php echo $_REQUEST['id']; ?></h2>

    <table class="table table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Amount</th>  
                <th>Total Amount</th> 
                <th>Status</th> 
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($record as $value) { 
                    // var_dump($value);
            ?>
                <tr>
                    <td> <img src="../<?php echo $value['product_image'];?>" class="img-thumbnail" width="60" height="60" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';"> </td>
                    <td> <?php echo $value['product_name'];?> </td>
                    <td> <?php echo $value['category_name'];?> </td>
                    <td><?php echo $value['product_size'];?> </td>
                    <td> <?php echo $value['product_color'];?> </td> 
                    <td> <?php echo $value['quantity'];?> </td>
                    <td>₹ <?php echo  $value['product_price'];?> </td>
                    <td>₹ <?php echo ($value['product_price'] *  $value['quantity']);?> </td>
                    <td>₹ <?php echo  $value['status'];?> </td>
                    <td>
                        <a class="text-decoration-none fs-4" title="Track Your Products Status" href="<?php echo $baseUrl; ?>/check_order_detail?id=<?php echo $value['id'];?>&order_status=<?php echo $value['status'];?>&productSize=<?php echo $value['product_size'];?>">
                            <font color="#878783" class="fa fa-chevron-right" aria-hidden="true"></font>
                        </a>
                        <a href="<?php echo $baseUrl; ?>/checkout?productID=<?php echo $value['product_id'] ;?>&productQuantity=<?php echo $value['quantity'];?>&product_size=<?php echo $value['product_size'];?>&buy=buyagian" class="btn myBtn fw-bold btn-sm">Buy Again</a>
                         <?php if($value['status'] != 'cancelled' && $value['status'] != 'delivered'){ ?>
                        <a class="btn myBtn btn-sm" title="You Can Cancelled Your Order" href="<?php echo $baseUrl; ?>/order_cancel?id=<?php echo $value['id'];?>&orderID=<?php echo $_REQUEST['id'];?>&product_Id=<?php echo $value['product_id'];?>&quantity=<?php echo $value['quantity'];?>" target="">Cancel</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once('footer.php'); ?>