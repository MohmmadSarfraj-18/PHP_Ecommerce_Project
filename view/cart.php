<?php 
    include('../controller/cartController.php');
    $conn = new CartController();

    require('header.php'); 
    
    if(!isset($_SESSION['user_id'])) {  
       header('location: login.php'); 
    }
    
    $record = $conn->fetch_user_cart();
    if(!empty($_REQUEST['id'])) { 
        $result = $conn->remove_productTOCart($_REQUEST['id']);
        if($result) {
            echo "<script> location.replace('cart.php'); </script>";
        }
    }
?>
    <div class="container table-responsive" style="margin-top: 6rem;">
        <form action="<?php echo $baseUrl; ?>/checkout" method="get">
            <h2 id="heading" class="pb-2 border-bottom mb-3 text-muted">My Cart</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <input class="form-check-input border border-secondary" type="checkbox" name="" id="checkedAll" onchange="checkedAllCheckboxes()"> 
                            <label class=" fs-5">
                                Select All
                            </label>
                        </th>
                    </tr>
                    <tr class="table-secondary">
                    <th scope="col">Select</th>
                    <th scope="col">Product #</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>     
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>     
                    <th scope="col">Total Amount</th>     
                    <th scope="col">Action</th>     
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $isCartsEmpty = false;
                        foreach($record as $value) {  
                            $isCartsEmpty = true;
                    ?>
                    <tr>
                        <td>
                            <input class="form-check-input border border-secondary star" type="checkbox" name="checkoutProduct[]" id="" value="<?php echo $value['product_id'];?>" onchange="updateTotal()">     <!--Bind Product ID With Checkbox -->
                        </td>
                        <td>
                            <a href="<?php echo $baseUrl; ?>/product_detail?product_Id=<?php echo $value['product_id'];?>">
                                <img src="../<?php echo $value['product_image'];?>" class="img-thumbnail" width="60" height="60" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';">
                            </a>      
                        </td>
                        <td valign="center"> <?php echo $value['product_name'];?> </td>
                        <td> <?php echo $value['product_color'];?> </td>
                        <td> <?php echo $value['product_size']; ?> </td>
                        <td>₹ <?php echo $value['price'];?> </td>
                        <td> <?php echo $value['quantity'];?> </td>
                        <td>₹ <?php echo ($value['price'] * $value['quantity']);?></td>
                        <td>
                            <a class="btn myBtn btn-sm" href="<?php echo $baseUrl; ?>/cart?id=<?php echo $value['product_id'];?>">Remove</a>
                            <a class="btn myBtn btn-sm" href="<?php echo $baseUrl; ?>/checkout?id=<?php echo $value['id'];?>&productSize=<?php echo $value['product_size'];?>">Checkout</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php if($isCartsEmpty) { ?>
                <tfoot>
                    <tr class="table-warning">
                        <td colspan="6">Grand Total</td>
                        <td id="totalQuantity">0</td>
                        <td id="totalAmount">0</td>
                        <td>
                            <input class="btn myBtn btn-sm" type="submit" name="checkoutProducts" value="Checkout">
                        </td>
                    </tr>
                </tfoot>
                <?php } ?>
            </table>
        </form>
    </div>

<?php 
    include_once('footer.php'); 
?>