/*--------------------------------------------
    Add Product Price & Quantity IN tfoot 
---------------------------------------------*/

// Function to update total based on checked checkboxes
function updateTotal() {
	console.log("update total function calling");
	var totalQuantity = 0;
	var totalAmount = 0;

	// Iterate through all checkboxes with the class 'star'
	var checkboxes = document.querySelectorAll(".star");
	checkboxes.forEach(function (checkbox) {
		if (checkbox.checked) {
			var row = checkbox.closest("tr");
			var quantity = parseInt(row.cells[6].innerText.trim()) || 0; // Default to 0 if not a valid integer
			var price =
				parseInt(row.cells[5].innerText.replace("₹", "").trim()) || 0; // Default to 0 if not a valid integer

			totalQuantity += quantity;
			totalAmount += price * quantity;

			console.log(totalQuantity);
			console.log(totalAmount);
		}
	});

	// Update the total in the footer
	document.getElementById("totalQuantity").innerText = totalQuantity;
	document.getElementById("totalAmount").innerText = "₹ " + totalAmount;
}

/*--------------------------
    Checked All Products 
---------------------------*/
// Function to check/uncheck all checkboxes
function checkedAllCheckboxes() {
	console.log("checkedAllCheckboxes function calling");

	let checkedAllCheckbox = document.getElementById("checkedAll");
	let checkboxes = document.querySelectorAll(".star");

	for (let i = 0; i < checkboxes.length; i++) {
		checkboxes[i].checked = checkedAllCheckbox.checked;
	}

	updateTotal(); // Call update total function after checking/unchecking all checkboxes
}

// Ensure that the 'checkedAllCheckboxes' function is bound to the 'onchange' event of the 'checkedAll' checkbox
// document.getElementById('checkedAll').addEventListener('change', checkedAllCheckboxes);
