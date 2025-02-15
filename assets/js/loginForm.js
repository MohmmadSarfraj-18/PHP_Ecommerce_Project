const loginValidation = (formType) => {
    // reset error message
    document.getElementById(`${formType}EmailError`).innerText = "";
    document.getElementById(`${formType}PasswordError`).innerText = "";

    let checkEmail = false;
    let checkPassword = false;

    // Get values
    let email = document.getElementById(`${formType}Email`).value.trim();
    let password = document.getElementById(`${formType}Password`).value.trim();

    // Email validation
    if (email !== "") {
        if (isValidEmail(email)) {
            document.getElementById(`${formType}Email`).style = "";
            document.getElementById(`${formType}EmailError`).innerText = "";
            checkEmail = true;
        } else {
            document.getElementById(`${formType}Email`).style = "border: 2px solid red";
            document.getElementById(`${formType}EmailError`).innerText = "* Please Enter Correct Email (example@gmail.com)";
        }
    } else {
        document.getElementById(`${formType}Email`).style = "border: 2px solid red";
        document.getElementById(`${formType}EmailError`).innerText = "* This Field Cannot be empty";
    }

    // Password validation
    if (password !== "") {
        // Adjusted condition to check for an acceptable password length
        if (password.length > 0 && password.length < 9) {
            document.getElementById(`${formType}Password`).style = "";
            document.getElementById(`${formType}PasswordError`).innerText = "";
            checkPassword = true;
        } else {
            document.getElementById(`${formType}Password`).style = "border: 2px solid red";
            document.getElementById(`${formType}PasswordError`).innerText = "* Password length should be between 1 and 8 characters";
        }
    } else {
        document.getElementById(`${formType}Password`).style = "border: 2px solid red";
        document.getElementById(`${formType}PasswordError`).innerText = "* Password is required";
    }

    // If both variables are true, then form submitted; otherwise, not
    return checkEmail && checkPassword;
};

// Function for checking email
const isValidEmail = (email) => {
    let emailFormat = /^[a-zA-Z][a-zA-Z0-9._-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailFormat.test(email);
};
