<?php 
   session_start();

   if(!isset($_SESSION['admin_id'])) {  
       header('location: login.php'); 
   }

    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] . '/shoppingWebsite/admin/view';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="../../assets/image/fashionflock-favicon.png"></link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrape Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Admin Login Page CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- font aewsome -->
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="../../assets/css/JQDataTable.css">
 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    
   <style>
        header ,.headerBackground {
            background : #edebeb;
            color : #311247;
        }
        .nav-link {
            color : #490f63 !important;
        }
   </style>
   
</head>
<body>
    <header class="navbar sticky-top headerBackground flex-md-nowrap p-1 shadow-sm" data-bs-theme="dark">
        <a class=" headerBackground px-3" href="../index.php">
            <img src="../../assets/image/transparentLogo.png" class="img-fluid" width="100">
        </a>

        <div class="d-flex align-items-center gap-2  fs-4 me-3">
            <i class="fa fa-user"></i>
            <span class="text-capitalize"><?php echo (!empty($_SESSION['admin'])?$_SESSION['admin']['name'] :'');?></span>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active fs-5" aria-current="page" href="<?php echo $baseUrl;?>/home">
                                    <i class="fa fa-home"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2  fs-5" href="<?php echo $baseUrl;?>/category">
                                    <i class="fa fa-object-group"></i>
                                    Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2  fs-5" href="<?php echo $baseUrl;?>/products">
                                <i class="fa fa-shopping-cart"></i>
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2  fs-5" href="<?php echo $baseUrl;?>/orders">
                                <i class="fa fa-sticky-note"></i>
                                    Orders
                                </a>
                            </li> 
                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2  fs-5" href="<?php echo $baseUrl;?>/users">
                                <i class="fa fa-users"></i>
                                    Users
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2  fs-5" href="<?php echo $baseUrl;?>/logout">
                                    <i class="fa fa-sign-out"></i>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">