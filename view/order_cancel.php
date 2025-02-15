<?php
    include('../controller/cancel_order_controller.php');
    $conn = new CancelOrderController();
    require('header.php'); 
    
    if(!empty($_REQUEST['submit'])) {
        $orderID = $_REQUEST['orderID'];
        $record = $conn->update_order_lineItem($_REQUEST['id'] , $_REQUEST['product_Id'] , $_REQUEST['quantity']);
        if($record) {
            // header('location: order_detail.php?id='.$_REQUEST['orderID']);
            echo "<script>location.href='order_detail.php?id=$orderID'</script>";
        } else {
            echo '<div class="alert alert-danger mt-5" role="alert">Error: Cancelled failed.</div>';
        }
    } 
?>

<br/>
<!-- CONTENT -->
<div class="container"> 
    <form action="" method="post" enctype="multipart/form-data">
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Confirmation</h4>
            <hr> 
            <p>Do you want to cancel order?</p>
            <div class="mb-0">
                <input type="hidden" name="id" value="<?php echo (!empty($_REQUEST['id']) ? $_REQUEST['id'] : '' ); ?>">
                <input type="hidden" name="table_name" value="<?php echo (!empty($_REQUEST['tname']) ? $_REQUEST['tname'] : ''); ?>">

                <input type="submit" class="btn btn-dark me-3" name="submit" value="Confrim">
                <a type="button" href="<?php echo $baseUrl; ?>/order_detail?id=<?php echo $_REQUEST['orderID'];?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    <form>
</div>
<!-- END CONTENT -->

<?php include_once('footer.php'); ?>