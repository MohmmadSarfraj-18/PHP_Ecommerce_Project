<?php 
    include("../controller/productController.php");
    require('header.php');
    $connection =  new ProductController();
    $productsRecord = $connection->fetchAllProducts();
?>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="<?php echo $baseUrl; ?>/add_product" class="btn btn-sm btn-info text-white">Add Product</a>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <div>
                <table id="example"  class="data-table row-border hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productsRecord as $key => $value) { ?>
                            <tr>
                                <td>
                                    <img src="../../<?php echo $value['product_image'];?>" width="60" height="60" style="object-fit: cover;" onerror="if (this.src != 'error.jpg') this.src = 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg';">   
                                </td>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo $value['category_name'];?></td>
                                <td>₹ <?php echo $value['price'];?></td>
                                <td><?php echo $value['color'];?></td>
                                <td><?php echo $value['size'];?></td>
                                <td><?php echo $value['type'];?></td>
                                <td><?php echo $value['status'];?></td>
                                <td><?php echo $value['stock'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" >
                                        <a class="btn btn-outline-primary" href="<?php echo $baseUrl; ?>/add_product?id=<?php echo $value['id']; ?>" title="update product"><i class="fa fa-edit"></i></a>                   <!-- update button -->
                                        <a class="btn btn-outline-danger" href="<?php echo $baseUrl; ?>/delete_record?tname=products&id=<?php echo $value['id']; ?>" title="remove product"><i class="fa fa-trash"></i></a>  <!-- delete button -->
                                    </div>
                                </td> 
                            </tr>
                        <?php }?> 
                    </tbody> 
                </table>
            </div>
            <!-- END CONTENT -->

<?php include_once('footer.php'); ?>
