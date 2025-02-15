/*----------------------------
    User Name Validation 
----------------------------*/
let checkUser = false;
let checkEmail = false;
let checkPassword = false;
let checkAddress = false;
let checkPhone = false;
let checkCity = false;
let checkState = false;
let checkPin = false;

function username() {
    let username = document.registerationForm.user.value;

    // user cannot input accept string(character).
    if(/^[a-zA-Z][a-zA-Z\s]*$/.test(username) && username != "") {
        // console.log(username + "is a string value");
        document.registerationForm.user.style="";
        document.getElementById('userError').innerText="";
        checkUser = true;
    } 
    else {
        document.registerationForm.user.style="border : 3px solid red ; color : red";
        document.getElementById('userError').innerText="* Only charcter Allowed";
    }
}

function emailValidation() {
    let email = document.registerationForm.email.value;

    // Email validation
    let emailFormate = /^[[a-zA-Z][a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if(email.match(emailFormate)) {
        // console.log(username + "is a string value");
        document.registerationForm.email.style="";
        document.getElementById('emailError').innerText="";
        checkEmail = true;
    } else{
        document.registerationForm.email.style="border : 3px solid red ; color : red";
        document.getElementById('emailError').innerText="* Please Enter Email Proper (name@gmail.com)";
    }
}

// show/hide password 
function passwordToggle() {
    let temp = document.getElementById("typepass");
    if (temp.type === "password") 
        temp.type = "text";
    else  
        temp.type = "password";
}
/*-------------------------
    Form Validation
--------------------------*/
function ragistrationFormVAlidation() {
    // password validation START
    
    let password = document.registerationForm.password.value;
    let address = document.registerationForm.address.value;
    let phone_no = document.registerationForm.phone.value;
    let city = document.registerationForm.city;
    let state = document.registerationForm.state;
    let pin = document.registerationForm.pincode.value;

    if(password != ""){
        if(password.length < 4){
            document.registerationForm.password.style="border : 2px solid red";
            document.getElementById('passwordError').innerHTML="* Password length must be 4 digits/char";
        } else {
            document.registerationForm.password.style="";
            document.getElementById('passwordError').innerHTML="";
            checkPassword = true;
        }
    }
     else {
        document.registerationForm.password.style="border : 2px solid red ;";
        document.getElementById('passwordError').innerHTML="* This feild can't be empty.";
    }
    // password validation END

    // Address check isEmpty OR not
    if(address !== "") 
    {
        if(/[!@#$%^&*+=~]/.test(address)) 
        {
            
            document.registerationForm.address.style="border : 2px solid red ";
            document.getElementById('addressError').innerHTML="* Special characters are not allowed in the address.";
        }  else {
            document.registerationForm.address.style="";
            document.getElementById('addressError').innerHTML="";
            checkAddress = true;
        }
    }
    else {
        document.registerationForm.address.style="border : 2px solid red ";
        document.getElementById('addressError').innerHTML="* Address cannot be empty.";
    }
    // Address Validation END

    // Phone NO START
    if(phone_no != "") {
        if(phone_no.length > 9 && phone_no.length < 11 ){
            document.registerationForm.phone.style="";
            document.getElementById('phoneError').innerHTML="";
            checkPhone = true;
        } else {
            document.registerationForm.phone.style="border : 2px solid red";
            document.getElementById('phoneError').innerHTML="* phone no must be 10 digits";
        }
    } else {
        document.registerationForm.phone.style="border : 2px solid red ";
        document.getElementById('phoneError').innerHTML="* Please Fill the Field Phone Number";
    } 
    // Phone_nO Validation END
 
    // make sure atleast one City Selected
    let selectedCity = "";
    for (let i = 0; i < city.options.length; i++) {
        if(city.options[i].selected) {
            selectedCity += city.options[i].value;
        }  
    }
    if (selectedCity != "" ) {
        document.registerationForm.city.style="";
        document.querySelector('.cityError').innerHTML="";   
        checkCity = true;     
    } else{
        document.registerationForm.city.style="border : 2px solid red";
        document.querySelector('.cityError').innerHTML="* Please select atleast one city";
    }
    // City Validation END

    // make sure atleast one State Selected
    let selectedState = "";
    for (let i = 0; i < state.options.length; i++) {
        if(state.options[i].selected) {
            selectedState += state.options[i].value;
        }  
    }
    if (selectedState != "" ) {
        document.registerationForm.state.style="";
        document.querySelector('.stateError').innerHTML="";   
        checkState = true;     
    } else{
        document.registerationForm.state.style="border : 2px solid red";
        document.querySelector('.stateError').innerHTML="* Please select atleast one state";
    }
    // State Validation END

    // PIN START
    if(/^[0-9]+$/.test(pin) && pin !== "") {
        if(pin.length == 6){
            document.registerationForm.pincode.style="";
            document.querySelector('.pinError').innerHTML="";
            checkPin = true;
        } 
        else {
            document.registerationForm.pincode.style="border : 2px solid red";
            document.querySelector('.pinError').innerHTML="* pincode must be 6 digits";
        }
    } else {
        document.registerationForm.pincode.style="border : 2px solid red ";
        document.querySelector('.pinError').innerHTML="* Please enter pincode";
    } 
    // PIN Validation END

    // IF All Feild's Requirement is Fullfill then Form submitted Otherwise Not submitted
    if(checkUser && checkEmail && checkPassword && checkAddress && checkPhone && checkCity && checkState && checkPin) {
        return true;
    } else {
        return false;
    }
};