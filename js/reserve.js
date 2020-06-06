/*---- Hide and show the reservation form ----*/
// global varible
// ______________________________ Not used
var onOff = true;
var count = 0;

function hideMe() {
  var myForm = document.getElementById("myForm");
  if(onOff == true) {
    // myForm.style.visibility = 'hidden';
    // onOff = false;
  }
  
  count += 1;
  // alert (onOff + " " + count);  
}

function showMe() {
  var myForm = document.getElementById("myForm");
  if (onOff == false) {
    // myForm.style.visibility = 'visible';
    // onOff == true;

  }
  // window.stop();
  // alert (onOff);  
}
