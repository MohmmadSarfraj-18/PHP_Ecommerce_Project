<?php 
    include("../controller/orderController.php");
    require('header.php');
    $connection =  new OrderController(); 

    $order_Detail_Record = $connection->fetchSpecificOrdersDetail($_REQUEST['id']);
    foreach($order_Detail_Record as $key => $value) {
        // var_dump($value);
    }

    //UPDATE
    $order_id = $_REQUEST['order_id'];
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Update'){
        $result = $connection->updateProductStatus($_REQUEST);
       
        if($result){
            // echo "status updated successfully";
            // header('location: order_detail.php?id='.$data['order_id']); 
            echo "<script>location.href='order_detail.php?id=".$order_id."'</script>";
        }else{
            echo '<div class="alert alert-danger mt-5" role="alert">Error: Update failed.</div>';
        }
    } 
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Order Status</h1>         
    </div>
    <!-- CONTENT -->
    <div class="container"> 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Category Name</label>
                    <input type="hidden" name="id" value="<?php echo (!empty($value) ? $value['id'] : '' ); ?>">
                    <select class="form-select" name="status" required> 
                        <option value="pending"  <?php echo ((!empty($value) && $value['status'] == 'pending') ? 'selected' : '' );?> disabled> Pending </option>
                        <option value="shipped"  <?php echo ((!empty($value) && $value['status'] == 'shipped') ? 'selected' : '' );?> > Shipped </option>
                        <option value="out_of_delivery"  <?php echo ((!empty($value) && $value['status'] == 'out_of_delivery') ? 'selected' : '' );?> > Out of Delivery </option>
                        <option value="delivered"  <?php echo ((!empty($value) && $value['status'] == 'delivered') ? 'selected' : '' );?> > Delivered </option>
                    </select>
                </div> 
                <div class="col-lg-8 pt-4">
                   <input type="submit" class="btn btn-outline-primary" name="submit" value="<?php echo (!empty($value) ? "Update" : "Submit" ); ?>">
                </div>
            </div>
        </form> 
    </div>
  <!-- END CONTENT -->

  <?php include_once('footer.php'); ?>
