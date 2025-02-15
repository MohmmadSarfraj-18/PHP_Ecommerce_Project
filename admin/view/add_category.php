<?php
    require('../controller/categoryController.php');
    require('header.php');
    $connection =  new CategoryController();

    // ADD CATEGORY
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Add') {
        $connection->addCategory($_REQUEST);
    }

    // GET RECORD FOR UPDATE CATEGORY
    if(!empty($_REQUEST) && !empty($_REQUEST['id'])){   
        $getRecord = $connection->getRecordUpdateCategory($_REQUEST);
        foreach ($getRecord as $key => $value) {
            // echo $value['name'];
        }
    }

    // UPDATE CATEGORY
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Update') {
        $connection->updateCategory($_REQUEST);
    }
?>
<!-- CONTENT -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Category</h1>         
</div>
<div class="container"> 
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return myFunction()">
        <div class="row">

            <div class="col-lg-4">
                <label class="form-label">Category Name</label>
                <input type="hidden" name="id" value="<?php echo (!empty($getRecord) ? $value['id'] : '' ); ?>">
                <input type="text" class="form-control" name="name" id="categoryName" onkeyup="category();" value="<?php echo (!empty($getRecord) ? $value['name'] : '' ); ?>" placeholder="Enter Cargory Name" >
                <span id="catgoryError" style="color:red"></span>
            </div> 
            <div class="col-lg-8 pt-4">
                <input type="submit" class="btn btn-outline-primary" name="submit" value="<?php echo (!empty($getRecord) ? "Update" : "Add" ); ?>" >
            </div>
        </div>
    </form> 
</div>
<!-- END CONTENT -->

<?php include_once('footer.php'); ?>