<?php 
    include('../controller/registration_controller.php');
    $conn = new RegistrationController();

    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] . '/shopingWebsite/view';

    $error_msg = "";
    // var_dump($_REQUEST);
    if(!empty($_REQUEST)) {
        $user_id = $conn->insert_Users_Regitrarion($_REQUEST);
        var_dump($user_id);
        if($user_id) {
            // var_dump($user_id);
            // $_SESSION["user_id"] = $user_id;
            header('location: login.php');   
        } else { 
            $error_msg = mysqli_error($conn);
        }
    }
?>

<html lang="en" data-bs-theme="auto">
    <head>
        <link rel="icon" type="image" href="../assets/image/fashionflock-favicon.png"></link>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Signin Template · Bootstrap v5.3</title> 
        
        <!-- Bootstrape Files -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Font awesome File -->
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <!-- CSS File -->
        <link rel="stylesheet" href="../assets/css/registrationStyle.css">

        <style>
            .parentCard{
                width : 70%;
                box-shadow : 0 0 5px #dbdbdb;
                border-radius : 15px;
            }
            h1{
                color : #400a5d ;
                font-weight : 600;
                text-shadow : 0 3px 4px #d4d4d4;
            }

            .form-floating i,label{
                height : 22px;
                margin : 0 10px;
                font-size : 1rem;
                color : #400a5d !important;
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
            @media screen and (max-width: 763px) {
                .logo {
                    margin-top: 10px;
                    width: 45% !important;
                    height : 12% !important;
                }
            }
        </style>

    </head>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">  
        <div class="row parentCard p-0 m-auto m-5">
            <div class="col-lg-6 col-sm-12 col-md-6 my-auto p-0">
                <div class="text-center">
                    <img  class="mb-4 logo"  src="../assets/image/transparentLogo.png" width="100%">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <main class="form-signin w-100 m-auto">    
                    <h1 class="h3 mb-3">Please sign up</h1>
                    <form  method="post" autocomplete="off" name="registerationForm" onsubmit="return ragistrationFormVAlidation()">
                        <div class="row">
                            <div class="form-floating">
                                <input type="text" class="form-control"  placeholder="Rohit Sharma" name="user" onkeyup="username();" autocomplete="off">
                                <label for="floatingInput" style="padding:20px">Full Name</label>
                                <span id="userError"></span>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control"  placeholder="name@example.com" name="email" onkeyup="emailValidation();" autocomplete="off">
                                <label for="floatingInput" style="padding:20px">Email address</label>
                                <span id="emailError"></span>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control"  placeholder="Password" name="password" id="typepass">
                                <label for="floatingPassword" style="padding:20px">Password</label>

                                <input type="checkbox" onclick="passwordToggle()">
                                <strong>Show Password</strong>
                                <br/>
                                <span id="passwordError"></span>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text"  name="address" class="form-control" id="address" placeholder="1234 Main St" autocomplete="off">
                                <span id="addressError"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="phone" class="form-label">Phone No</label>
                                <input type="number" name="phone" min="1" maxlength="10" class="form-control" id="phone" placeholder="9600012789">
                                <span id="phoneError"></span>
                            </div> 

                            <div class="col-md-5 col-lg-6">
                                <label for="city" class="form-label">city</label>
                                <select class="form-select" id="city" name="city" >
                                    <option value="" disabled selected>-- Select --</option>
                                    
                                </select>
                                <span class="cityError"></span>
                            </div>

                            <div class="col-md-4 col-lg-6">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" name="state" onchange="updateCityDropdown()">
                                    <option value="" disabled selected>-- select --</option>
                                    
                                </select>
                                <span class="stateError"></span>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <label for="zip" class="form-label">Pincode</label>
                                <input type="text" class="form-control" id="zip" placeholder="Enter Pincode"  name="pincode">
                                <span class="pinError"></span>
                            </div>
                        </div>
                        <p class="text-danger mt-3 text-center errorMessag"> <?php echo $error_msg;?> </p>
                        <input class="btn text-white w-100 py-2 mt-4" type="submit" value="Sign up" name="submit">

                        <!-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p> -->
                    </form>
                </main>
            </div>
        </div>
        
        
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/ragistrationForm.js"></script>
        <!-- <script src="assets/js/city_State_name.js"></script> -->
        <script>
            let statesData = "";
            fetch('../assets/json/state_city.json')
            .then(response => response.json())
            .then(data => {
                // Store the loaded JSON data in a variable
                statesData = data;
                // console.log(statesData);

                let stateDropdown = document.getElementById("state");
                statesData.states.forEach(function (state) {
                    let option = document.createElement("option");
                    option.value = state.state;
                    option.text = state.state;
                    stateDropdown.add(option);
                });
            })
            .catch(err => console.log("Record Not Fetching"));

            function updateCityDropdown() {
                let selectedState = document.getElementById("state").value;
                // console.log(selectedState);
                let cityDropdown = document.getElementById("city");

                // Clear existing options in the city dropdown
                cityDropdown.innerHTML = '<option value="" disabled selected>Select a city</option>';

                // Find the selected state in the JSON data
                let selectedStateData = statesData.states.find(state => state.state === selectedState);
                // console.log(selectedStateData);

                // Populate the city dropdown with districts of the selected state
                if (selectedStateData && selectedStateData.districts) {
                    selectedStateData.districts.forEach(function (district) {
                        let option = document.createElement("option");
                        option.value = district;
                        option.text = district;
                        cityDropdown.add(option);
                    });
                }
            }
        </script>
    </body>
</html>