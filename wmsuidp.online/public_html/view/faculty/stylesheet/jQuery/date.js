var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var year = date.getFullYear();
var time = date.getHours();
var today = date.getDay();

if (time >= 5 && time < 12) {
  document.getElementById("greet-esp").innerHTML = "Good Morning";
} else if (time < 5) {
  document.getElementById("greet-esp").innerHTML = "Good Morning";
} else if (time >= 12 && time < 13) {
  document.getElementById("greet-esp").innerHTML = "Take a lunch break";
} else if (time >= 13 && time < 18) {
  document.getElementById("greet-esp").innerHTML = "Good Afternoon";
} else {
  document.getElementById("greet-esp").innerHTML = "Good Evening";
}

//day
switch (today) {
  case 0:
    today = "SUN";
    break;
  case 1:
    today = "MON";
    break;
  case 2:
    today = "TUE";
    break;
  case 3:
    today = "Wednesday";
    break;
  case 4:
    today = "THU";
    break;
  case 5:
    today = "FRI";
    break;
  case 6:
    today = "SAT";
    break;
}
//month
switch (month) {
  case 0:
    month = "JANUARY";
    break;
  case 1:
    month = "FEBRUARY";
    break;
  case 2:
    month = "MARCH";
    break;
  case 3:
    month = "APRIL";
    break;
  case 4:
    month = "MAY";
    break;
  case 5:
    month = "JUNE";
    break;
  case 6:
    month = "JULY";
    break;
  case 7:
    month = "AUGUST";
    break;
  case 8:
    month = "SEPTEMBER";
    break;
  case 9:
    month = "OCTOBER";
    break;
  case 10:
    month = "NOVEMBER";
    break;
  case 11:
    month = "DECEMBER";
    break;
}
document.getElementById("date-show").innerHTML =
  today + " " + month + " " + day + ", " + year;
