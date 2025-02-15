 /*----------------------------------
            JavaScript Validatio Start 
        ----------------------------------*/

        // CATEGORY VALIDATION START
        let checkCategory = false;
        function category() {
            let category = document.getElementById('categoryName').value;
            // console.log(category);
            // user cannot input accept string(character).
            if(/^[a-zA-Z][a-zA-Z\s]*$/.test(category)) {
                console.log(category + "is a string value");
                document.getElementById('categoryName').style="border : 3px solid green";
                checkCategory = true;
            } 
            else {
                document.getElementById('categoryName').style="border : 3px solid darkred ; color : darkred";
                checkCategory = false;
            }
        }

        function myFunction() {
            let category = document.getElementById('categoryName').value;
            if(category != "" && /^[a-zA-Z][a-zA-Z\s]*$/.test(category)) {
                document.getElementById('categoryName').style="";
                document.getElementById('catgoryError').innerHTML = "";
                checkCategory = true;
            } else {
                document.getElementById('categoryName').style="border : 3px solid red";
                document.getElementById('catgoryError').innerHTML = "* Please Enter Catgory Name & Only Char";
            }
            if(checkCategory == true){
                return true;
            } else {
                return false;
            }
        }
        // CATEGORY VALIDATION END