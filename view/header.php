<?php
    session_start();

    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] . '/shoppingWebsite/view';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image" href="../assets/image/fashionflock-favicon.png"></link>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>fashion_clothes</title>

        <!-- Bootstrape Files -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- font aewsome -->
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <!-- CSS File -->
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/timeline.css">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    
        <style>
            #searchBar{
                width:280px;
                border : 2px solid #490f63 !important;
            }
            #searchBtn{
                margin-bottom: 1px !important;
                font-size : 1.3rem;
                padding : 0 6px;
            }

            .dropdown-content {
                display: none; 
                position: absolute;
                background-color: #f5f3f2;
                min-width: 160px;
                z-index: 1;
            }

            .dropdown:focus-within .dropdown-content {
                display: block;
            }

            .dropdown-content a {
                color: black;
                padding: 8px 12px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
            }

            .myBtn:hover{
                background : #490f63;
                color : white;
            }
            .myBtn{
                border : 1px solid #490f63;
                color : #490f63;
            }
            /* heading */
            #heading{
                color : #490f63 !important;
                text-shadow : 0 3px 5px #d8d7d9;
            }
            /* Navbar CSS */
            .navbar-nav .nav-link{
                color : #490f63 !important; 
                font-size : 20px;
                font-weight : 700;
                text-transform : uppercase;
                padding:10px !important;
            }
            /* badges price */
            .badge{
                background : #663e85;
            }

            .proFileMenu {
                background-color: white;
                text-decoration : none;
                font-size : 17px;
                color : #490f63;
                font-weight : 600;
            }
            .proFileMenu:hover{
                /* background : #490f63; */
                color : #490f63;
                font-weight : 600;
            }
            .li:hover{

            }
           
            
        </style>

    </head>
    <body>
        <div style="margin-bottom: 4rem;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.php">
                        <img src="../assets/image/transparentLogo.png" style="width:100px; height:60px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="all_products.php">All Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="male_product.php #male">Male</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="female_product.php #female">Female</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="kids_product.php #kids">Kids</a>
                            </li>
                        </ul>
                        <div class=" my-auto ms-5">
                            <form action="" method="get" autocomplete="off">
                                <div class="form-group" style="margin-top:10px">    
                                    <div class="dropdown">
                                        <input type="text" name="searchProduct" id="searchBar" class="form-control-sm" placeholder="Search" data-toggle="dropdown">
                                        <!-- <button type="submit" name="search" id="searchBtn" class="btn myBtn btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                                        <div id="searchSuggetion" class="dropdown-content w-100"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 

                            <?php  if(!empty($_SESSION['user_id'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="profile-pic">
                                            <img src="https://www.ssrl-uark.com/wp-content/uploads/2014/06/no-profile-image.png" alt="Profile Picture">
                                        </div>
                                        <span class="text-capitalize fs-5"><?php echo $_SESSION['user']['name'] ;?></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="li" >
                                            <a class=" proFileMenu ms-2" href="<?php echo  $baseUrl;?>/cart"><i class="fa fa-shopping-cart" ></i> My Cart </a>
                                        </li>
                                        <li class="li" >
                                            <a class=" proFileMenu ms-2" href="<?php echo  $baseUrl;?>/my_order"><i class="fa fa-shopping-bag" aria-hidden="true" ></i> My Orders </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="li" >
                                            <a class=" proFileMenu ms-2" href="<?php echo $baseUrl;?>/logout"><i class="fa fa-sign-out" aria-hidden="true" ></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>    
                            <?php } else {  ?>
                                <a class="btn myBtn" href="<?php echo $baseUrl;?>/login">Login</a>
                            <?php }  ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>