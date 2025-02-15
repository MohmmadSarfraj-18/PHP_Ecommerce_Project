<?php 
    include("../controller/orderController.php");
    require('header.php');
    $connection =  new OrderController(); 
    $order_Detail_Record = $connection->fetchOrdersDetail($_REQUEST['id']);
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Detail #<?php echo $_REQUEST['id'] ?></h1>
    </div>
    <!-- CONTENT -->
    <div>
        <table  class="data-table row-border hover" style="width:100%">
            <thead>
                <tr>
                    <th>Order Item #</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   foreach($order_Detail_Record as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['product_name'];?></td>
                        <td><?php echo $value['category_name'];?></td>
                        <td><?php echo $value['product_size'];?></td>
                        <td><?php echo $value['product_color'];?></td>
                        <td><?php echo $value['quantity'];?></td>
                        <td>₹ <?php echo $value['product_price'];?></td>
                        <td>₹ <?php echo ($value['product_price'] * $value['quantity']);?></td>
                        <td><?php echo $value['status'];?></td>
                        <td>
                        <?php  if(($value['status'] != 'delivered' && $value['status'] != 'cancelled')){ ?>
                            <a class="btn btn-outline-primary" title="update order status" href="<?php echo $baseUrl; ?>/update_order_status?id=<?php echo $value['id']; ?>&order_id=<?php echo $_REQUEST['id'];?>"><i class="fa fa-edit"></i></a>  
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>     
            </tbody>
        </table>
    </div>
  <!-- END CONTENT -->

  <?php include_once('footer.php'); ?>
