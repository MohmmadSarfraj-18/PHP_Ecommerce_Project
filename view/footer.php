
    <div class="container-fluid">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-6 col-md-3 col-sm-12">
                    <img class="mb-2" src="assets/image/logo.webp"  alt="" width="40">
                    <small class="d-block mb-3 text-body-secondary">Made by ♥ Mohmmad Sarfraj ● &copy; 2024</small>
                </div>
                <div class="col-6 col-md-3  col-sm-12">
                    <h5 id="heading">Product Catgory</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="<?php echo $baseUrl; ?>/all_products"> All Products </a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="<?php echo $baseUrl; ?>/male_product"> Male </a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="<?php echo $baseUrl; ?>/female_product">Female</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="<?php echo $baseUrl; ?>/kids_product">Kids</a></li> 
                    </ul>
                </div>
                <div class="col-6 col-md-3  col-sm-12">
                    <h5 id="heading">Support</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3  col-sm-12">
                    <h5 id="heading">About</h5>
                    <ul class="list-unstyled text-small">
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
                        <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>

    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/ajaxJquery.min.js"></script>
    
    <!-- Multiple Product Selected From Carts JS File -->
    <script src="../assets/js/carts_productSelect.js"></script>

    <!-- Index JS File -->
    <script src="../assets/js/index.js"></script>
    
    <script>

    //  GET PRODUCT_ID AND PRODUCT_Quantity ON CHECKOUT_PAGE 
        var form = document.getElementsByClassName("myForm");
        var btn = document.getElementsByClassName("buy");
        console.log(btn);

        for (let i = 0; i < btn.length; i++) {

            // Adding a submit event listener to the form
            btn[i].addEventListener("click", function(event) {
            // Preventing the default form submission
            event.preventDefault();
            
            // Accessing the input values using their names or IDs
            var productID = this.form.elements["product_id"].value;    // this refers to current form
            console.log(productID);

            var productQty = this.form.elements["quantity"].value;
            console.log(productQty);

            var productSize = this.form.elements["user_select_size"].value;
            console.log(productSize);
            
            // Creating a query string with the input values
            var queryString = "productID=" + encodeURIComponent(productID) + "&productQuantity=" + encodeURIComponent(productQty) + "&product_size=" + encodeURIComponent(productSize) + "&buy=product_buy";
            
            // Redirecting to the checkout page with the query parameters
            window.location.href = "checkout.php?" + queryString;
            });
        }
    </script>

    <script>
          $(document).ready(function() {

			$('#searchBar').keyup(function() {
				let searchValue = $(this).val();
                console.log(searchValue);
                // let pageName = window.location.pathname.split('/').pop();
				console.log(searchValue);
                // pageName = pageName.replace("%20",'');
                // console.log(pageName);
                $('#searchSuggetion').load("tempPage.php","search="+searchValue);   //+"&pageName="+pageName);
               
            });

            // $('#orderForm').submit(function() {
                $('#orderMessage').modal('show');
                $('#orderMessage').modal('show');

                // setTimeout(function() {
                //     window.location.href = '../index.php';
                // }, 3000); 
            // });

        });
    </script>
   
</html>