<?php 
  include("../controller/productController.php");
  require('header.php');
  $connection =  new ProductController();

    //DELETE RECORD
    if(!empty($_REQUEST['submit'])) { 
        $connection->deleteProduct($_REQUEST);
    } 
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
<!-- <h1 class="h2">Confirmation</h1>          -->
</div>
<!-- CONTENT -->
<div class="container"> 

    <form action="" method="post" enctype="multipart/form-data">
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Confirmation</h4>
            <hr>
            <p>Do you want to delete record?</p>
            <div class="mb-0">

                <input type="hidden" name="id" value="<?php echo (!empty($_REQUEST['id']) ? $_REQUEST['id'] : '' ); ?>">
                <input type="hidden" name="table_name" value="<?php echo (!empty($_REQUEST['tname']) ? $_REQUEST['tname'] : ''); ?>">

                <input type="submit" class="btn btn-dark me-3" name="submit" value="Confrim">
                <a type="button" href="<?php echo $baseUrl; ?>/<?php echo (!empty($_REQUEST['tname']) ? $_REQUEST['tname'] : ''); ?>" class="btn btn-secondary">Cancel</a>
            
            </div>
        </div>
    <form>

</div>
<!-- END CONTENT -->

<?php include_once('footer.php'); ?>