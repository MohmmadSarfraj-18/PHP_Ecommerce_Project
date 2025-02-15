<?php
    include("../controller/productController.php");
    require('header.php');
    $connection =  new ProductController();

    // fetch categories
    $categoryRecords = $connection->fetchCategoryData();

    // Add Product
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Add') {
        $filename = $_FILES['product_image']['name']; 
        $target_path = $_FILES['product_image']['tmp_name']; 
        $connection->addProduct($_REQUEST , $filename , $target_path);
    } 

    // GET RECORD OF Product FOR UPDATE
    $size1 = "";
    $size2 = "";
    $size3 = "";
    $size4 = "";
    $size5 = "";
    $size6 = "";
    if(!empty($_REQUEST['id'])) {   
        $record = $connection->getSpecificProductRecord($_REQUEST['id']);
        foreach ($record as $key => $val) {
            if(!empty($val['size'])){
                $sizeArray = explode(",",$val['size']);
                foreach ($sizeArray as $key => $value) {
                    // var_dump($value);
                    if($value == 'xs') $size1 = $value;
                    if($value == ' s' || $value == 's' ) $size2 = $value;
                    if($value == ' m' || $value == 'm' ) $size3 = $value;
                    if($value == ' l' || $value == 'l')  $size4 = $value;
                    if($value == ' xl' || $value == 'xl' ) $size5 = $value;
                    if($value == ' xxl' || $value == 'xxl' ) $size6 = $value;
                }
            }
        }
    }

    //UPDATE Product
    if(!empty($_REQUEST['submit']) && $_REQUEST['submit'] == 'Update') {
            $filename = $_FILES['product_image']['name'];
            $target_path = $_FILES['product_image']['tmp_name']; 
            $result = $connection->updateProductRecord($_REQUEST , $filename , $target_path);
            if($result){
                // header('location: products.php'); 
                echo "<script>location.href='products.php'</script>";
            }else{
                echo '<div class="alert alert-danger mt-5" role="alert">Error: Update failed.</div>';
            }
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Product</h1>         
</div>
<!-- CONTENT -->
<div class="container"> 
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return productValidateForm()">
        <div class="row">
            <div class="col-lg-4">
                <label class="form-label">Category</label>
                <select id="categorySelect" class="form-select" name="category_id">
                    <option value="" disabled selected>--Select Category--</option>
                    <?php  foreach($categoryRecords as $key => $value) { ?>
                        <option class="text-capitalize" value="<?php echo $value['id'] ;?>" <?php echo ((!empty($val) && $val['category_id'] == $value['id'])  ? 'selected' : '' );?> > <?php echo $value['name'];?> </option>
                    <?php  } ?>
                </select>
            </div>
        
            <div class="col-lg-4">
                <label class="form-label">Name</label>
                <input type="text" id="productName" class="form-control" name="name" maxlength="20" placeholder="Brand Name" value="<?php echo (!empty($val) ? $val['name'] : '' ); ?>">
            </div>

            <div class="col-lg-4">
                <label class="form-label">Price</label>
                <input type="number" id="productPrice" class="form-control" name="price" min="1" maxlength="10"  placeholder="Product Price" value="<?php echo (!empty($val) ? $val['price'] : '' ); ?>" >
            </div>

            <div class="col-lg-4">
                <label class="form-label">Gender Type</label>
                <select class="form-select transparent" name="type" id="typeSelect">
                    <option value="" disabled selected>--Select Type--</option>
                    <option value="male" <?php echo (!empty($val) && $val['type'] == 'male' ? 'selected' : '' );?> > Male </option>
                    <option value="female" <?php echo (!empty($val) && $val['type'] == 'female' ? 'selected' : '' );?> > Female </option>
                    <option value="kid" <?php echo (!empty($val) && $val['type'] == 'kid' ? 'selected' : '' ); ?> > Kids </option>
                </select>
                <span  id="typeSelectError" style="color:red"></span>
            </div>

            <div class="col-lg-4">
                <label class="form-label" >Size</label>
                <select class="form-select transparent" name="size[]" multiple size='2' id="productSize">
                    <option value="" disabled selected>--Select Type--</option>
                    <option value="xs" <?php echo (!empty($val['size']) && $size1 == 'xs' ? 'selected' : '' ); ?> > XS </option>
                    <option value="s" <?php echo (!empty($val) && $size2 == ' s' || $size2 == 's' ? 'selected' : '' );?> > S </option>
                    <option value="m" <?php echo (!empty($val) && $size3 == ' m' || $size3 == 'm' ? 'selected' : '' );?> > M </option>
                    <option value="l" <?php echo (!empty($val) && $size4 == ' l' || $size4 == 'l' ? 'selected' : '' );?> > L </option>
                    <option value="xl" <?php echo (!empty($val) && $size5 == ' xl' || $size5 == 'xl' ? 'selected' : '' );?> > XL </option>
                    <option value="xxl" <?php echo (!empty($val) && $size6 == ' xxl' || $size6 == 'xxl' ? 'selected' : '' );?> > XXL </option>
                </select>
                <span  id="sizeSelectError" style="color:red"></span>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" name="color" id="productColor" maxlength="30" placeholder="Product Color" value="<?php echo (!empty($val) ? $val['color'] : '' ); ?>">
                <span  id="colorError" style="color:red"></span>
            </div>  

            <div class="col-lg-4">
                <label class="form-label">Product Status</label>
                <select class="form-select" name="status" > 
                    <option value="active"  <?php echo ((!empty($val) && $val['status'] == 'active') ? 'selected' : '' );?> > Active </option>
                    <option value="inactive"  <?php echo ((!empty($val) && $val['status'] == 'inactive') ? 'selected' : '' );?> > Inactive </option>
                </select>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Stock Quantity</label>
                <input type="number" name="stock" id="productStock" class="form-control" min="0" maxlength="10" placeholder="Product stock" value="<?php echo (!empty($val) ? $val['stock'] : '' ); ?>" >
                <span  id="stockError" style="color:red"></span>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Image</label>
                <input type="hidden" name="image_url" value="<?php echo (!empty($val) ? $val['product_image'] : '' ); ?>">
                <input type="file" class="form-control" name="product_image" accept="image/png, image/jpeg, image/webp, image/jpg" id="<?php echo (empty($val) ? 'productImage' : '' ); ?>">
                <span id="imageError"  style="color:red"></span>
            </div>

            <div class="col-lg-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="description" id="proDescription"><?php echo (!empty($val) ? $val['description'] : '' ); ?></textarea>
                <span id="descError" style="color:red"></span>
            </div> 

            <div class="col-lg-12 text-end mt-4">
                <input type="submit" class="btn btn-outline-primary" name="submit" value="<?php echo (!empty($val) ? "Update" : "Add" ); ?>">
            </div>
        </div>
    </form> 
</div>
<!-- END CONTENT -->

<?php include_once('footer.php'); ?>