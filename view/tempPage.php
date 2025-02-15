<?php
    require('../connection/config.php');
    $conn = new Connection();
    $config = $conn->connect();

   
    if(!empty($_REQUEST['search'])) 
    {
       
        $searchValue = $_REQUEST['search'];
        // $page = $_REQUEST['pageName'];

        // echo "page name : ".$page;
        // var_dump($page);


        $query = "SELECT * FROM products WHERE status = 'active' AND stock > 0 AND name LIKE '$searchValue%'";
        
        // $query1 = "SELECT * , category.name AS pro_name FROM products 
        // INNER JOIN category ON products.category_id = category.id 
        // WHERE status = 'active' AND stock > 0 AND (category.name LIKE '".$_REQUEST['searchProduct']."%')";

        // if($page == "product_detail.php" || $page == "home.php" || $page == "all_products.php"){
        //     $query = "SELECT * FROM products where status = 'active' AND stock > 0 AND name LIKE '$searchValue%'";
        // } 
        // else if($page == "male_product.php") {
        //     $query = "SELECT * FROM products where status = 'active' AND stock > 0 AND type = 'male' AND name LIKE '$searchValue%'";
        // }
        // else if($page == "female_product.php") {
        //     $query = "SELECT * FROM products where status = 'active' AND stock > 0 AND type = 'female' AND name LIKE '$searchValue%'";
        // } 
        // else if($page == "kids_product.php") {
        //     $query = "SELECT * FROM products where status = 'active' AND stock > 0 AND type = 'kid' AND name LIKE '$searchValue%'";
        // }

    //    var_dump($query);
        // $resultCategory = mysqli_query($config, $query1);
       
        $result = mysqli_query($config, $query);
            // var_dump($result);
        // $cat_Row = mysqli_num_rows($resultCategory);
        $pro_Row = mysqli_num_rows($result);

        echo "<ul  class='dropdown-content list-unstyled'>";
            // if($cat_Row > 0)
            // {
            //     while($record = mysqli_fetch_assoc($resultCategory))
            //     {
            //         // var_dump($record);
            //         echo "<li  style=' list-style:none'><a class='text-decoration-none text-dark' href='showAllProduct.php?bookid=$record[id]'>$record[name]</a></li>";
            //         echo "<div class='divider'></div>";

            //     }
            // }
            
            if($pro_Row > 0) {
                while($record1 = mysqli_fetch_assoc($result))
                {
                    // var_dump($record1);
                    // var_dump($record1);
                    echo "<li  style=' list-style:none'><a class='text-decoration-none text-dark' href='searched_product.php?product_Name=$record1[name]'>$record1[name] </a></li>";
                    echo "<div class='divider'></div>";

                }
            }
        echo "</ul>";
    }
?>


