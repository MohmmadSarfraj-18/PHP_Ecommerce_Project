<?php 
    include("../controller/orderController.php");
    require('header.php');
    $connection =  new OrderController(); 
    $ordersRecord = $connection->fetchAllOrdersData();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
</div>
<!-- CONTENT -->
<div class="table-responsive">
    <table id="order_table"  class="data-table row-border" style="width:100%">
        <thead class="text-uppercase">
            <tr>
                <th>Order No#</th>
                <th>Customer Name</th>
                <th>Transaction Id</th>
                <th>Payment mode</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordersRecord as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['transaction_id'];?></td>
                    <td><?php echo $value['payment_mode'];?></td>
                    <td>₹ <?php echo $value['total_amount'];?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" >
                            <a class="btn btn-outline-primary" title="view order details" href="<?php echo $baseUrl; ?>/order_detail?id=<?php echo $value['id']; ?>"><i class="fa fa-eye"></i></a> 
                        </div>
                    </td> 
                </tr>
            <?php } ?>
        </tbody> 
    </table>
</div>
  <!-- END CONTENT -->

  <?php include_once('footer.php'); ?>
