<?php 
    include("../controller/userController.php");
    require('header.php');
    $connection =  new UserController();
    $usersRecord = $connection->fetch_users_data($_REQUEST);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>
<!-- CONTENT -->
<div>
    <table  class="data-table row-border hover" style="width:100%" id="user_table">
        <thead>
            <tr>
                <!-- <th>Customer Id</th> -->
                <th>Customer Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usersRecord as $key => $value) { ?>
                <tr>
                    <!-- <td><?php //echo $records['id'];?></td> -->
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['phone_no'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['address']."<br/>".$value['city'].", ".$value['state'].", ".$value['pincode'];?></td>
                    <td><?php echo $value['role'];?></td>
                    <td><?php echo $value['status'];?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" >
                            <a class="btn btn-outline-primary" title="update users status" href="<?php echo $baseUrl; ?>/update_user_status?id=<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a>  
                        </div>
                    </td> 
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- END CONTENT -->

<?php include_once('footer.php'); ?>
