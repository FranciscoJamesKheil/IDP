//checking no.students
function noStuds() {
  var ac = document.getElementById("no-studs").value;

  if (ac <= 20) {
    alert("Note: Minimum number(20) of students, but still valid.");
  } else if (ac > 60) {
    alert("Note: Maximum number(60) of students");
    document.getElementById("no-studs").value = "";
  } else {
    return ac;
  }
}
//edit ac
function noStudsedit() {
  var ac = document.getElementById("no-studs-edit").value;

  if (ac <= 20) {
    alert("Note: Minimum number(20) of students, but still valid.");
  } else if (ac > 60) {
    alert("Note: Maximum number(60) of students");
    document.getElementById("no-studs-edit").value = "";
  } else {
    return ac;
  }
}

//function for overload
function noStudsOl() {
  var ac = document.getElementById("no-studs-ol").value;

  if (ac <= 20) {
    alert("Note: Minimum number(20) of students, but still valid.");
  } else if (ac > 60) {
    alert("Note: Maximum number(60) of students");
    document.getElementById("no-studs-ol").value = "";
  } else {
    return ac;
  }
}
//edit ol
function noStudsOledit() {
  var ac = document.getElementById("no-studs-ol-edit").value;

  if (ac <= 20) {
    alert("Note: Minimum number(20) of students, but still valid.");
  } else if (ac > 60) {
    alert("Note: Maximum number(60) of students");
    document.getElementById("no-studs-ol-edit").value = "";
  } else {
    return ac;
  }
}

//checking hours
function calac() {
  var fromac = document.getElementById("time-from-ac").value;
  var toqac = document.getElementById("time-to-ac").value;
  var validate = toqac - fromac;

  if (validate > 0) {
    document.getElementById("ac-hours").value = validate;
    document.getElementById("ac-hours-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("ac-hours").value = "";
    document.getElementById("ac-hours-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("ac-hours").value = "";
    document.getElementById("ac-hours-put").value = "";
  }
}
//edit ac
function calacedit() {
  var fromac = document.getElementById("time-from-ac-edit").value;
  var toqac = document.getElementById("time-to-ac-edit").value;
  var validate = toqac - fromac;

  if (validate > 0) {
    document.getElementById("ac-hours-edit").value = validate;
    document.getElementById("ac-hours-edit-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("ac-hours-edit").value = "";
    document.getElementById("ac-hours-edit-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("ac-hours-edit").value = "";
    document.getElementById("ac-hours-edit-put").value = "";
  }
}
function calol() {
  var fromol = document.getElementById("time-from-ol").value;
  var toqol = document.getElementById("time-to-ol").value;
  var validate = toqol - fromol;

  if (validate > 0) {
    document.getElementById("ol-hours").value = validate;
    document.getElementById("ol-hours-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("ol-hours").value = "";
    document.getElementById("ol-hours-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("ol-hours").value = "";
    document.getElementById("ol-hours-put").value = "";
  }
}
//checking ol edit
function caloledit() {
  var fromol = document.getElementById("time-from-ol-edit").value;
  var toqol = document.getElementById("time-to-ol-edit").value;
  var validate = toqol - fromol;

  if (validate > 0) {
    document.getElementById("ol-hours-edit").value = validate;
    document.getElementById("ol-hours-edit-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("ol-hours-edit").value = "";
    document.getElementById("ol-hours-edit-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("ol-hours-edit").value = "";
    document.getElementById("ol-hours-edit-put").value = "";
  }
}
//quasi
function calq() {
  var fromqua = document.getElementById("time-from-qua").value;
  var toqua = document.getElementById("time-to-qua").value;
  var validate = toqua - fromqua;

  if (validate > 0) {
    document.getElementById("qua-hours").value = validate;
    document.getElementById("qua-hours-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("qua-hours").value = "";
    document.getElementById("qua-hours-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("qua-hours").value = "";
    document.getElementById("qua-hours-put").value = "";
  }
}
function calqedit() {
  var fromqua = document.getElementById("time-from-qua-edit").value;
  var toqua = document.getElementById("time-to-qua-edit").value;
  var validate = toqua - fromqua;

  if (validate > 0) {
    document.getElementById("qua-hours-edit").value = validate;
    document.getElementById("qua-hours-edit-put").value = validate;
  } else if (validate < 0) {
    alert("Invalid: Negative Hours");
    document.getElementById("qua-hours-edit").value = "";
    document.getElementById("qua-hours-edit-put").value = "";
  } else {
    alert("Invalid: The same value");
    document.getElementById("qua-hours-edit").value = "";
    document.getElementById("qua-hours-edit-put").value = "";
  }
}

//open/close modal

function openAC() {
  document.getElementById("ac01").style.display = "block";
}
function openOL() {
  document.getElementById("ol01").style.display = "block";
}
function openQuasi() {
  document.getElementById("quasi01").style.display = "block";
}

//open modal for delete and edit

//function update and delete for AC
function aceditsched() {
  document.getElementById("acedit01").style.display = "block";
}
function acdelsched(x) {
  document.getElementById("acdel01").style.display = "block";
  document.getElementById("actual-to-delete").value = x;
}
//function update and delete for OL
function oleditsched() {
  document.getElementById("oledit01").style.display = "block";
}
function oldelsched() {
  document.getElementById("oldel01").style.display = "block";
}
//function update and delete for Quasi

function quasieditsched() {
  document.getElementById("quaedit01").style.display = "block";
}
function quasidelsched() {
  document.getElementById("quadel01").style.display = "block";
}

function closeModal() {
  document.getElementById("ac01").style.display = "none";
  document.getElementById("acedit01").style.display = "none";
  document.getElementById("ol01").style.display = "none";
  document.getElementById("oledit01").style.display = "none";
  document.getElementById("quasi01").style.display = "none";
  document.getElementById("quaedit01").style.display = "none";

  //delete buttons
  document.getElementById("acdel01").style.display = "none";
  document.getElementById("oldel01").style.display = "none";
  document.getElementById("quadel01").style.display = "none";
}
