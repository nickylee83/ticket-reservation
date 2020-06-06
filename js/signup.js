/*--------------------- check password and confirm password ------------------------------------------*/
var password = document.getElementById("password");
var confirm = document.getElementById("confirm");
var submit = document.getElementById("submit-pass");

var key = 10;
var encrypted;


function validatePassword(){
  var str = String(confirm.value);
  
  if(password.value != confirm.value) {
    confirm.setCustomValidity("Password and confirm password do not match!");
  }
  else {
    confirm.setCustomValidity('');
    encrypted = caesarShift(str, key);
    document.myform.confirm.value(encrypted);
    // alert(confrim.value);
    return true;
  }    
}

password.onchange = validatePassword;
confirm.onkeyup = validatePassword;

/* ----------------- Caesar Cipher for password ------------------------------- */ // Not used
function caesarShift (str, key) {

	// Wrap the amount
	if (key < 0)
		return caesarShift(str, key + 26);

	// Make an output variable
	var output = '';

	// Go through each character
	for (var i = 0; i < str.length; i ++) {

		// Get the character we'll be appending
		var c = str[i];

		// If it's a letter...
		if (c.match(/[a-z]/i)) {

			// Get its code
			var code = str.charCodeAt(i);

			// Uppercase letters
			if ((code >= 65) && (code <= 90))
				c = String.fromCharCode(((code - 65 + key) % 26) + 65);

			// Lowercase letters
			else if ((code >= 97) && (code <= 122))
				c = String.fromCharCode(((code - 97 + key) % 26) + 97);

		}

		// Append
		output += c;

	}
	// All done!
	return output;

}
