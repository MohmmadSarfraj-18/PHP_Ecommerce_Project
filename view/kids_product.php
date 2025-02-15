<?php 
    include('../controller/kidProductsController.php');
    require('header.php');
    $conn = new KidProductsController();

    // Searching of Product
    if(isset($_REQUEST['search'])) {
        $record = $conn->search_kids_allProducts($_REQUEST);
    } else if($conn) {
        $record = $conn->fetch_allKidsProducts();
    }
    // Product Add TO Cart
    if(!empty($_REQUEST['add_to_cart'])) {
        if(isset($_SESSION['user_id'])) { 
            $productid = $_REQUEST['product_id'];
            $size = $_REQUEST['user_select_size'];
            $quantity = $_REQUEST['quantity'];
            $userId = $_SESSION['user_id'];
            echo "<script>location.href='add_to_cart.php?pageName=kidsProduct&productId=$productid&size=$size&quantity=$quantity&userId=$userId'</script>";
        } else {
            header('location: login.php');
        }
    }
?>

    <div id="carouselExampleControls" class="carousel slide  carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../slider/1.png" class="d-block w-100" height="520px" alt="Male_Poster">
            </div>
            <div class="carousel-item">
                <img src="../slider/2.png" class="d-block w-100" height="520px" alt="Female_Image_Poster">
            </div>
            <div class="carousel-item">
                <img src="../slider/3.png" class="d-block w-100" height="520px" alt="Kid_Poster">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </br>
    <!--CARD-->
    <div class="container-fluid"> 
        <!-- Kids Products -->
        <div class="row">
            <h2 id="heading" class="pb-2 border-bottom mb-4 text-muted" id="kids">Kid Products</h2>
            <?php foreach($record as $value) { 
                $product_size_Array = explode(",",$value['size']);    // covert all size string to array.
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                <div class="card shadow-sm">
                    <a href="<?php echo $baseUrl; ?>/product_detail?product_Id=<?php echo $value['id'];?>" target="">
                        <img src="../<?php echo $value['product_image'];?>" alt="product image" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';" class="img-fluid" width="100%" style="height: 220px;object-fit: cover;">
                    </a>

                    <div class="card-body">
                        <div class="d-flex justify-content-between text-capitalize">
                            <p class="h6"><span class="badge">₹ <?php echo $value['price'];?></span></p> 
                            <p><?php echo $value['name'];?></p> 
                        </div>
                        <small class="card-text txt-ellipsis text-capitalize text-muted  fw-bold">
                            <?php echo $value['description'];?>
                        </small>
                        <form action="" method="post" class="myForm"> 
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Size</label>
                                <select name="user_select_size" id="" class="form-select form-select-sm w-25 text-uppercase">
                                    <option value="<?php echo $product_size_Array[0] ?>" selected><?php echo $product_size_Array[0] ?></option>
                                    <?php foreach($product_size_Array as $key => $val) { 
                                        if ($key != 0) {
                                    ?>
                                        <option value="<?php echo $val ?>"><?php echo $val ?></option>
                                    <?php 
                                        }
                                    }
                                    ?>  
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="input-group input-group-sm quantity-input-group" style="width:100px">
                                    <button class="btn btn-light minus text-dark fw-bold" type="button" >
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" name="quantity"  id="qtty" class="form-control input-number text-center quantity_input" value="1" min="1" readonly>
                                    <button class="btn btn-light plus" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div> 
                                    <input type="hidden" name="product_id" value="<?php echo $value['id'];?>">
                                    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-sm myBtn"> 
                                    <input type="button" name="buy" value="Buy" class="btn btn-sm myBtn buy"> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </br>
    </div>

<?php 
    require_once('footer.php'); 
?>