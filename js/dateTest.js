/*---- restrict past date on Date Picker ----*/
// global variable
// restrict past dates
function getToday() {
  
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  var x1 = document.getElementById("date").min = today;
  var x2 = document.getElementById("cdate").min = today;
}
// dob should restrict future dates
function getDob() {
  
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  
  var x = document.getElementById("dob").max = today;
}

