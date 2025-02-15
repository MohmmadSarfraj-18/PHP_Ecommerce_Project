<?php 
    //session_start();
    
    include('../controller/loginController.php');
    $connection =  new loginController();

    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] . '/shopingWebsite/admin/view';

    $error = "";
    if(isset($_REQUEST['adminLogin'])) {
        $data = $connection->check_Users_Active($_REQUEST);

        // var_dump($data);

        if(!empty($data)) {
            // var_dump($data);
            foreach ($data as $key => $value) {
                $_SESSION['admin_id'] = $value['id'];
                $_SESSION['admin'] = $value;
            }
           
            echo "<script>window.location.assign('../index.php')</script>";
            // header('location : index.php');
        } else {
            $error =  '<p class="text-danger">Login Error: Email OR Password invalid..!</p>';
        }
    } 
?>

<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Signin Template · Bootstrap v5.3</title> 
        <!-- Bootstrape Files -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <!-- Font Swesome File -->
        <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">


        <style>
            html,
            body {
                height: 100%;
                background : #FAF9F6;
                color : #400a5d;
                font-family: 'Nunito', sans-serif;

            }

            .form-signin {
                max-width: 330px;
                padding: 1rem;
                border-radius : 25px;
                box-shadow: 0 0 5px #B6B6B6;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-radius : 3rem !important;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-radius : 3rem !important;
            }

            .form-control {
                border : none;
                outline : none;
                background : none;
                box-shadow : inset 8px 8px 8px #cbced1,
                             inset -8px -8px 8px #ffffff;
                color : #400a5d !important;
                font-size : 1.2rem;
            }
            .form-floating i,label{
                height : 22px;
                margin : 0 10px;
                font-size : 1.2rem;
            }

            /* Error Message Color */
            span{
                color : red;
            }

            .btn {
                outline : none;
                border : none;
                border-radius : 30px;
                font-size : 20px;
                font-weight: 600;
                background : #50345D;
                box-shadow : 3px 3px 3px #B6B6B6;
            }
            .btn:hover {
                background : #400a5d;
            }
            

        </style>
        
    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary"> 
        <main class="form-signin w-100 m-auto text-center">
            <form action="" method="POST" autocomplete="off" onsubmit="return loginValidation('admin')">
                <img  class="mb-4"  src="../../assets/image/transparentLogo.png" width="45%" height="10%">
                <div class="fs-2">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </div>
                <h1 class="h3 mb-3 fw-normal">Admin Login</h1>

                <div class="form-floating">
                    <input name="email" type="text" class="form-control rounded" id="adminEmail" placeholder="name@example.com">
                    <label for="adminEmail">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Email address
                    </label>
                    <span id="adminEmailError"></span>
                </div>
                <br/>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control rounded" id="adminPassword" placeholder="Password">
                    <label for="adminPassword">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        Password
                    </label>
                    <span id="adminPasswordError"></span>
                </div>
                <p class=""><?php echo $error; ?></p>
                <input class="btn text-white w-100 py-2 mt-2" type="submit" name="adminLogin" value="Login"> 
            </form>
        </main>
    </body>
        
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/loginForm.js"></script>
    
</html>


