<?php 
    require('../controller/categoryController.php');
    require('header.php');
    $connection =  new CategoryController();
    $categoryRecord = $connection->fetchCategoryData($_REQUEST);
?>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Product Categories</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="<?php echo $baseUrl;?>/add_category" class="btn btn-sm btn-info text-white">Add Category</a>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <div>
                <table id="category" class="data-table row-border hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categoryRecord as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['name'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" >
                                    <a class="btn btn-outline-primary" href="<?php echo $baseUrl; ?>/add_category?id=<?php echo $value['id']; ?>" title="update category name"><i class="fa fa-edit"></i></a> 
                                </div>
                            </td>  
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
<!-- END CONTENT -->
<?php require('footer.php'); ?>
