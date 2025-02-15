<?php 
    include("../controller/userController.php");
    require('header.php');
    $connection =  new UserController();

    //GET RECORD FOR UPDATE
    if(!empty($_REQUEST) && !empty($_REQUEST['id'])) {  
        $userRecord = $connection->get_User_Details($_REQUEST);
        foreach ($userRecord as $key => $value) {
            // var_dump($value);
        }
    }

    //UPDATE
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Update') { 
        $connection->update_User_Status($_REQUEST);
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update User Status</h1>         
</div>
    <!-- CONTENT -->
      <div class="container"> 

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Status</label>
                    <input type="hidden" name="id" value="<?php echo (!empty($value) ? $value['id'] : '' ); ?>">
                    <select class="form-select" name="status" required> 
                        <option value="active"  <?php echo ((!empty($value) && $value['status'] == 'active') ? 'selected' : '' );?> > Active </option> <!-- default active -->
                        <option value="inactive"  <?php echo ((!empty($value) && $value['status'] == 'inactive') ? 'selected' : '' );?> > Inactive </option> 
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
