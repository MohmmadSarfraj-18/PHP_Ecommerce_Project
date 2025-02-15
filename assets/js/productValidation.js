// Product Validatio START
function productValidateForm() {
    let categorySelect = document.getElementById("categorySelect").value;
    let productCompName = document.getElementById("productName").value;
    let productPrice = document.getElementById("productPrice").value;
    
    let checkCategorySelect = false;
    let checkProductCompName = false;
    let checkProductPrice = false;
    let checkType = false;
    let checkSize = false;
    let checkColor = false;
    let checkStock = false;
    let checkImage = false;
    let checkDesc = false;


    // Checking for Select Category Name
    if (categorySelect !== "") {
        document.getElementById("categorySelect").style = "border : 2px solid green";
        checkCategorySelect =  true;
    } else {
        document.getElementById("categorySelect").style = "border : 2px solid red";
    }

    // Checking for Product Company Name
    if(/^[a-zA-Z][a-zA-Z\s]*$/.test(productCompName) && productCompName != "") {
        document.getElementById("productName").style = "border : 2px solid green";
        checkProductCompName = true;
    } else {
        document.getElementById("productName").style = "border : 2px solid red";
    }

    // Checking for Product Price
    if(/^[0-9]+$/.test(productPrice) && productPrice != "") {
        document.getElementById("productPrice").style = "border : 2px solid green";
        checkProductPrice = true;
    } else {
        document.getElementById("productPrice").style = "border : 2px solid red";
    }

    // Checking Atleast on soption selected form Product (Type[male, female, kids] & Size[xs/s/m/l/xl/xxl]).   
    function isAtLeastOneOptionSelected(selectElement) {
        let selectedOptions = Array.from(selectElement.options).filter(option => option.selected && !option.disabled);
        return selectedOptions.length > 0;
    }

    // Example usage:
    let mySelectElement = document.getElementById('typeSelect'); // Replace 'mySelect' with the actual ID of your select element
    if (isAtLeastOneOptionSelected(mySelectElement)) {
        document.getElementById('typeSelect').style="";
        document.getElementById('typeSelectError').innerHTML="";
        checkType = true;
    } else {
        document.getElementById('typeSelect').style="border : 2px solid red";
        document.getElementById('typeSelectError').innerHTML="* Please select Type[male/female/kids]";
    }

    // product size Validation START
    let myProductSizeElement = document.getElementById('productSize');
    if(isAtLeastOneOptionSelected(myProductSizeElement)) {
        document.getElementById('productSize').style="";
        document.getElementById('sizeSelectError').innerHTML="";
        checkSize = true;
    } else {
        document.getElementById('productSize').style="border : 2px solid red";
        document.getElementById('sizeSelectError').innerHTML="* Please select Atleast 1 product Size";
    }
    // product size Validation END

    // Color Feild Validation START
    let productColor = document.getElementById('productColor').value;
    if(/^[a-zA-Z][a-zA-Z\s]*$/.test(productColor) && productColor != "") {
        document.getElementById('productColor').style="";
        document.getElementById('colorError').innerHTML="";
        checkColor = true;
    } else {
        document.getElementById('productColor').style="border : 2px solid red";
        document.getElementById('colorError').innerHTML="* Please Fill The Color Feild & Only Char";
    }
    // Color Feild Validation END

    // product Stock Validation START
    let productStock = document.getElementById('productStock').value;
    if(/^[0-9]+$/.test(productStock) && productStock != "") {
        document.getElementById('productStock').style="";
        document.getElementById('stockError').innerHTML="";
        checkStock = true;
    } else {
        document.getElementById('productStock').style="border : 2px solid red";
        document.getElementById('stockError').innerHTML="* Fill product Stock Quantity Atleast 1";
    }
    // product Stock Validation END

    // image Validation START
    let productImage = document.getElementById('productImage').value;
    if(productImage != "") {
        document.getElementById('productImage').style="";
        document.getElementById('imageError').innerHTML="";
        checkImage = true;
    } else {
        document.getElementById('productImage').style="border : 2px solid red";
        document.getElementById('imageError').innerHTML="* Please Choose a Image For Product";
    }
    // image Validation END

    // product Description Validation START
    let description = document.getElementById('proDescription').value;
    if(description != ""){
        document.getElementById('proDescription').style="";
        document.getElementById('descError').innerHTML="";
        checkDesc = true;
    } else {
        document.getElementById('proDescription').style="border : 2px solid red";
        document.getElementById('descError').innerHTML="* Please Enter product Description.";
    }
    // product Description Validation END


    //  IF All Variable has TRUE value then form get return TRUE value & submitted , other wise form Not Submitted
    if(checkCategorySelect && checkProductCompName  && checkProductPrice && checkType && checkSize && checkColor && checkStock && checkDesc && checkImage) {
        return true;
    } else {
        return false;
    }
}