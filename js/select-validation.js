/*---- if user choose invalid option values ----*/
// restrict same origin and destination
function routeSelect() {
  var from = document.getElementById("from");
  var to = document.getElementById("to");      

  if(from.value == to.value) {
    alert ("Warning! Your origin and destination cannot be the same!");
    from.value = "";
    to.value = "";
  }
}
// restrict same departure and arrival time
function timeSelect() {
  var dep = document.getElementById("dep");
  var arr = document.getElementById("arr");

  if(dep.selectedIndex == arr.selectedIndex) {
    alert ("Warning! Departure and arrival cannot be the same!");
    
    dep.value = "";
    arr.value = "";
  }

  if (arr.selectedIndex != 0 && dep.selectedIndex > arr.selectedIndex) {
    alert ("Invalid! Departure time must be before arrival time!");

    dep.value = "";
    arr.value = "";
  }

}
