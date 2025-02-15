$(document).ready(function() {
    $('#menu').click(function(){
        $('#nav').toggle();
    });
});


/*--------------------------------------
    Navbar jQuery Code.. scroll-triger
---------------------------------------*/
$(document).ready(function(){
    $('.nav-item').click(function(){
        $('.navbar-collapse').collapse('hide');
    });
});


// Quantity Increase & Decrease functionality 
$(document).ready(function () {
    // Add a common class to identify the quantity input group
    $('.quantity-input-group').each(function () {
        var quantityInput = $(this).find(".quantity_input");
        var decreaseBtn = $(this).find(".minus");
        var increaseBtn = $(this).find(".plus");

        // Decrease button click event
        decreaseBtn.click(function () {
            var currentVal = parseInt(quantityInput.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                quantityInput.val(currentVal - 1);
            }
        });

        // Increase button click event
        increaseBtn.click(function () {
            var currentVal = parseInt(quantityInput.val());
            if (!isNaN(currentVal)) {
                quantityInput.val(currentVal + 1);
            }
        });
    });
    /* SELECT SIZE OF PRODUCT END */
        
    /*  PAYMENT METHOD
        Function to hide all payment fields 
    */
    function hideAllFields() {
        $('#upiFields, #qrCodeImage').addClass('d-none');
    }
    
    // Initial(Default) hide
    hideAllFields();
    
    // Toggle UPI fields visibility
    $('#upiRadio').change(function() {
        hideAllFields();
        $('#upiFields').toggleClass('d-none', !this.checked);
    });
    
    // Toggle QR Code image visibility
    $('#qrCodeRadio').change(function() {
        hideAllFields();
        $('#qrCodeImage').toggleClass('d-none', !this.checked);
    });
    
    // Toggle Cash on Delivery fields visibility
    $('#codRadio').change(function() {
        hideAllFields();
    });
    /* END Payment Method */

});

