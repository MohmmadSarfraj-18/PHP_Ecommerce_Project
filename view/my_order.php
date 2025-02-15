<?php  
    include('../controller/my_orders_controller.php');
    $conn = new MyOrderController();
    require('header.php');
    $record = $conn->fetchAllOrdersRecord($_SESSION['user_id']);
    // var_dump($record);
    
?>
<div class="container table-responsive" style="margin-top: 6rem;">
    <h2 id="heading" class="pb-2 border-bottom mb-3 text-muted">My Orders</h2>
    <table class="table table-hover">
        <thead>
            <tr class="table-secondary">
                <th scope="col">Order No #</th>
                <th scope="col">Transaction Id</th>     
                <th scope="col">Payment Mode</th>
                <th scope="col">Total Amount</th>     
                <th scope="col">Shipping Address</th>
                <!-- <th scope="col">Status</th> -->
                <th scope="col">Order Date/Time</th>     
                <th scope="col">Action</th>     
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($record as $value) { 
                // var_dump($value);        
            ?>
                <tr>
                    <td> <?php echo $value['id'];?> </td>
                    <td> <?php echo $value['transaction_id'];?> </td>
                    <td> <?php echo $value['payment_mode'];?> </td>
                    <td>₹ <?php echo $value['total_amount'];?> </td>
                    <td> <?php echo $value['delivery_address']."</br>". $value['city'].", ". $value['state'].",".$value['pincode'];?> </td>
                    <!-- <td> <?php //echo $value['status'];?> </td> -->
                    <td> <?php echo $value['order_date'];?> </td>
                    <td>
                        <a class="btn myBtn btn-sm" href="<?php echo $baseUrl; ?>/order_detail?id=<?php echo $value['id'];?>">Veiw</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once('footer.php'); ?>