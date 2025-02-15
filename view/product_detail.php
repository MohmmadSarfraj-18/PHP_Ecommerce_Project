<?php
    include('../controller/product_detail_controller.php');
    $conn = new ProductDetailController();
    ob_start();
    require('header.php');

    $record = $conn->fetch_product_detail($_REQUEST['product_Id']);
    // var_dump($record);
    $product_size_Array = explode(",",$record[0]['size']);    // covert all size string to array.

    // Product Add TO Cart
    if(!empty($_REQUEST['add_to_cart'])) {
        if(isset($_SESSION['user_id'])) { 
            $productid = $_REQUEST['product_id'];
            $size = $_REQUEST['user_select_size'];
            $quantity = $_REQUEST['quantity'];
            $userId = $_SESSION['user_id'];
            
            echo "<script>location.href='add_to_cart.php?pageName=productDetail&productId=$productid&size=$size&quantity=$quantity&userId=$userId'</script>";
        } 
        else {
            header('location: login.php');
        }
    }
?>

    <div class="container">
        <!-- PRODUCT RELATED INFORMATION -->
        <div class="d-flex justify-content-center alert alert-warning mt-3 mb-5">
            <h1 class="text-capitalize fw-bold ">product detail</h1>
        </div>

        <div class="row d-flex justify-content-center">
            
            <div class="col-4">
                <img src="../<?php echo $record[0]['product_image'];?>" alt="product_Image" class="img-fluid" width="100%" style="height: 28rem;" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';">
            </div>
            <div class="col-5">
                <ul class="list-unstyled" style="line-height:45px">
                    <li class="text-capitalize fw-bold  fs-1"><?php echo $record[0]['name']." , ".$record[0]['category_name'] ;?></li>
                    <!-- <li><?php //echo $record[0]['category_name'] ;?></li> -->
                    <li class="text-capitalize  fs-5"><?php echo $record[0]['description'] ;?></li>
                    <li class="text-capitalize  fs-4">
                        ₹ <font color="red" class="fw-bold"> <?php echo $record[0]['price'] ;?></font>
                        <span>
                            MRP <s>₹ <?php echo $record[0]['price'] * 2 ?></s> <font color="red">(50% off)</font>
                        </span>
                    </li>
                    <!-- <li class="text-capitalize  fs-5">Size - <?php //echo $record[0]['size'] ;?></li> -->
                    <li class="text-capitalize  fs-5">color - <?php echo $record[0]['color'] ;?></li>
                </ul>
                <form action="" method="post" class="myForm"> 
                    <div class="mb-2">
                        <label class="form-label">Size</label>
                        <select name="user_select_size" id="" class="form-select form-select-sm w-25 text-uppercase">
                            <option value="<?php echo $product_size_Array[0] ?>" selected><?php echo $product_size_Array[0] ?></option>
                            <?php foreach($product_size_Array as $key => $value) { 
                                if ($key != 0) {
                            ?>
                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                            <?php 
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    <div class="mt-2">
                        <div class="input-group input-group-sm quantity-input-group" style="width:100px">
                            <button class="btn btn-light minus text-dark fw-bold" type="button" >
                                <i class="fa fa-minus"></i>
                            </button>
                                <input type="text" name="quantity"  id="qtty" class="form-control input-number text-center quantity_input" value="1" min="1" readonly>
                            <button class="btn btn-light plus" type="button">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="mt-2"> 
                            <input type="hidden" name="product_id" id="myId" value="<?php echo $record[0]['id'];?>">

                            <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-sm myBtn"> 
                            <input type="button" name="buy" value="Buy" class="btn myBtn btn-sm buy">    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('footer.php'); ?>