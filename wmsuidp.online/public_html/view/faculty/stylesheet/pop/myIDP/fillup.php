<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../../../../index.php");
    die();
  }
  $detectSQL = "SELECT * FROM users WHERE user_username = '$access'";
  $detectSave = mysqli_query($mysqli, $detectSQL);

  while($detectrow = mysqli_fetch_array($detectSave)) {
    $detectedID = $detectrow['user_id'];
  }
  //view
  $sql = "SELECT * FROM faculty WHERE user_id_fk = $detectedID";

  $myData = mysqli_query($mysqli,$sql);
  while($record = mysqli_fetch_array($myData)) { 
    $ffn = $record['faculty_firstname'];
    $fln = $record['faculty_lastname'];
    $fmi = $record['faculty_mi'];
    $fr = $record['faculty_rank'];
    $fd = $record['faculty_designation'];
    $frt = $record['faculty_actual_time'];
    $fq = $record['faculty_qualification'];
    $fa = $record['faculty_assignment'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | My Schedule</title>
    <link rel="icon" href="../../../../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="../../../stylesheet/content/header.css" />
    <link rel="stylesheet" href="../../../stylesheet/content/myidp.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../../../../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../../../font/preloader/loader.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Play&display=swap"
      rel="stylesheet"
    />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../../../../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM</p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">MY SCHEDULE UPDATE</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a href="../../../home.php" id="slide-home">
            <p class="far fa-home"></p>
            Home
          </a>
        </li>
        <li id="dashboard-mobile">
          <a href="../../../dashboard.php" id="slide-dashboard">
            <p class="far fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a class="active" href="../../../myIDP.php" id="slide-faculty"
                  ><p class="fas fa-calendar"></p>
                  My Schedule</a
                ></span
              >
            </div>
          </div>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a href="../../../matrix.php" id="slide-matrix"
                  ><p class="far fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="../../../officials.php" id="slide-officials"
                  ><p class="far fa-users"></p>
                  University Officials</a
                ></span
              >
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown-nav">
            <p class="far fa-user-circle"></p>
            <div class="dropdown-content-nav">
              <span
                ><a href="../../../profile.php" id="slide-profile"
                  ><p class="far fa-user-cog"></p>
                  Profile</a
                ></span
              >
              <br />
              <span
                ><a
                  href="../../../../../index.php"
                  id="slide-sign-out"
                  class="bdr-top-line"
                  ><p class="far fa-sign-out"></p>
                  Logout</a
                ></span
              >
            </div>
          </div>
        </li>
      </ul>
    </header>
    <nav class="side-nav">
      <div class="side-nav-logo">
        <img src="../../../../font/assets/logo/wmsulogo.png" alt="" />
        <p id="nav-hd">WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="../../../home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="../../../dashboard.php"
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="../../../myIDP.php"
          ><li class="active-sn">
            <span class="fas fa-calendar"></span>My Schedule
          </li></a
        >
        <a href="../../../matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="../../../officials.php"
          ><li><span class="far fa-users"></span>University Officials</li></a
        >
      </ul>
    </nav>
    <main>
      <!--preloader-->
      <div class="loader">
        <div class="preloadermain">
          <div class="precircle"></div>
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
        <div class="preloadermain1">
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
        <div class="preloadermain">
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
      </div>
      <script src="../../../../font/preloader/loader.js"></script>
      <!--content-->
      <div class="main">
        <div class="note">
          <p>Hello, <span><?php echo $ffn ?></span>. <br>Please take note that if you have change the faculty type, keep your <b>Total Hours</b> to 0 (delete all schedules).</p>
        </div>
        <div class="content-header">
          <div class="img-head">
            <img
              src="../../../../font/assets/vector/3125019.jpg"
              id="idpvector"
              alt=""
            />
          </div>
          <div class="basic">
            <form action="./add-info.php" method="POST">
              <div class="info"> 
                <p>Faculty Type:</p>
                <select name="faculty-type" id="faculty-type" onchange="facultyType();">
                  <option value="Regular">Regular</option>
                  <option value="Visiting Lecturer">Visiting Lecturer</option>
                </select>
                <p>First Name</p>
                <input
                  type="text"
                  id="name" name="faculty-firstname" style="text-transform: capitalize"
                  value="<?php echo $ffn ?>"
                  autocomplete="off"
                  required
                />
                <p>Last Name</p>
                <input
                  type="text"
                  id="name" name="faculty-lastname" style="text-transform: capitalize"
                  value="<?php echo $fln ?>"
                  autocomplete="off"
                  required
                />
                <p>M.I (Optional)</p>
                <input type="text" id="mi" maxlength="1" style="text-transform: capitalize" name="faculty-mi" value="<?php echo $fmi ?>" autocomplete="off" />
                <p>Academic Rank:</p>
                <select name="faculty-rank" id="faculty-rank" onchange="myMatrix();">
                  <option value="Instructor I">Instructor I</option>
                  <option value="Instructor II">Instructor II</option>
                  <option value="Instructor III">Instructor III</option>
                  <option value="Assistant Professor I">Assistant Professor I</option>
                  <option value="Assistant Professor II">Assistant Professor II</option>
                  <option value="Assistant Professor III">Assistant Professor III</option>
                  <option value="Assistant Professor IV">Assistant Professor IV</option>
                  <option value="Associate Professor I">Associate Professor I</option>
                  <option value="Associate Professor II">Associate Professor II</option>
                  <option value="Associate Professor III">Associate Professor III</option>
                  <option value="Associate Professor IV">Associate Professor IV</option>
                  <option value="Associate Professor V">Associate Professor V</option>
                  <option value="Professor I">Professor I</option>
                  <option value="Professor II">Professor II</option>
                  <option value="Professor III">Professor III</option>
                  <option value="Professor IV">Professor IV</option>
                  <option value="Professor V">Professor V</option>
                  <option value="Professor VI">Professor VI</option>
                  <option value="College Professor">College Professor</option>
                  <option value="University Professor">University Professor</option>
                </select>
                <input type="text" id="visiting" disabled>
                <p id="lbldesignation">Designation:</p>
                <input
                  type="text"
                  id="designation" style="text-transform: capitalize"
                  value=""
                  autocomplete="off" name="faculty-designation"
                  onchange="mode()"
                />
                <p id="lbl-actual">Actual Teaching Load:</p>
                <select name="faculty-actual-time" id="selectBox" onchange="result();">
                  <option value="0">0</option>
                  <?php
                    //view
                    $sqlrelease = "SELECT release_time FROM wdesignation";

                    $myDataRelease = mysqli_query($mysqli,$sqlrelease);
                    while($recordTime = mysqli_fetch_array($myDataRelease)) { 
                      $rl = $recordTime['release_time'];
                  ?>
                    <option value="<?php echo $rl ?>"><?php echo $rl ?></option>
                  <?php
                    }
                  ?>
                </select>
                <select name="faculty-actual-time-wo" id="nonDesignation" style="display: none">
                </select>
                <!--script for actual teaching load-->
                <script>
                  //onchange key
                  function myMatrix() {
                    document.getElementById("nonDesignation").innerHTML = "";
                    var selectType = document.getElementById("faculty-rank");
                    var selectedType = selectType.options[selectType.selectedIndex].value;
                    if(selectedType === "Professor I" || selectedType === "Professor II" || selectedType === "Professor III" || selectedType === "Professor IV" || selectedType === "Professor V" || selectedType === "Professor VI" || selectedType === "College Professor" || selectedType === "University Professor") {
                      <?php
                        //view
                        $sqlwithout = "SELECT instruction FROM wodesignation WHERE rank_type='Professors'";

                        $myDataWithout = mysqli_query($mysqli,$sqlwithout);
                        while($recordOut = mysqli_fetch_array($myDataWithout)) { 
                          $optInstruct = $recordOut['instruction'];
                      ?>
                      document.getElementById("nonDesignation").innerHTML += "<option value='<?php echo $optInstruct ?>'><?php echo $optInstruct ?></option>";
                      <?php
                        }
                      ?> 
                    } 
                    else {
                      <?php
                        //view
                        $sqlwithout = "SELECT instruction FROM wodesignation WHERE rank_type='IAAP'";

                        $myDataWithout = mysqli_query($mysqli,$sqlwithout);
                        while($recordOut = mysqli_fetch_array($myDataWithout)) { 
                          $optInstruct = $recordOut['instruction'];
                      ?>
                      document.getElementById("nonDesignation").innerHTML += "<option value='<?php echo $optInstruct ?>'><?php echo $optInstruct ?></option>";
                      <?php
                        }
                      ?> 
                    }
                  }
                  //auto actual teaching time
                    document.getElementById("nonDesignation").innerHTML = "";
                    var selectType = document.getElementById("faculty-rank");
                    var selectedType = selectType.options[selectType.selectedIndex].value;
                    if(selectedType === "Professor I" || selectedType === "Professor II" || selectedType === "Professor III" || selectedType === "Professor IV" || selectedType === "Professor V" || selectedType === "Professor VI" || selectedType === "College Professor" || selectedType === "University Professor") {
                      <?php
                        //view
                        $sqlwithout = "SELECT instruction FROM wodesignation WHERE rank_type='Professors'";

                        $myDataWithout = mysqli_query($mysqli,$sqlwithout);
                        while($recordOut = mysqli_fetch_array($myDataWithout)) { 
                          $optInstruct = $recordOut['instruction'];
                      ?>
                      document.getElementById("nonDesignation").innerHTML += "<option value='<?php echo $optInstruct ?>'><?php echo $optInstruct ?></option>";
                      <?php
                        }
                      ?> 
                    } 
                    else {
                      <?php
                        //view
                        $sqlwithout = "SELECT instruction FROM wodesignation WHERE rank_type='IAAP'";

                        $myDataWithout = mysqli_query($mysqli,$sqlwithout);
                        while($recordOut = mysqli_fetch_array($myDataWithout)) { 
                          $optInstruct = $recordOut['instruction'];
                      ?>
                      document.getElementById("nonDesignation").innerHTML += "<option value='<?php echo $optInstruct ?>'><?php echo $optInstruct ?></option>";
                      <?php
                        }
                      ?> 
                    }
                </script>
                <!--Visiting Lecturer-->
                <select name="visiting-actual-time" id="selectLecturer" onchange="resultLecturer();">
                  <option value="3">3</option>
                  <option value="6">6</option>
                  <option value="9">9</option>
                  <option value="12">12</option>
                  <option value="15">15</option>
                  <option value="18">18</option>
                  <option value="21">21</option>
                  <option value="24">24</option>
                  <option value="specify">specify</option>
                </select>
                <input type="number" id="visiting-specify" onchange="visitLec()" name="visiting-actual-time-specify" placeholder="Specify your Actual time">
                <br />
                <p id="lbl-release">Release Time:</p>
                <input
                  type="number"
                  id="release"
                  style="cursor: not-allowed; width: 4rem"
                  disabled
                />
                <input type="number" name="faculty-release-time" id="faculty-release-time" hidden>
              </div>
              <script>
                var designation = document.getElementById("designation").value;
                
                //faculty type
                function facultyType() {
                  var selectType = document.getElementById("faculty-type");
                  var selectedType = selectType.options[selectType.selectedIndex].value;
                  if(selectedType === "Visiting Lecturer") {
                    document.getElementById("visiting").value = "Visiting Lecturer";
                    document.getElementById("visiting").style.display = "block";
                    document.getElementById("faculty-rank").style.display = "none";
                    document.getElementById("designation").value = "";
                    document.getElementById("lbldesignation").style.display = "none";
                    document.getElementById("designation").value = "";
                    document.getElementById("designation").style.display = "none";
                    document.getElementById("selectLecturer").style.display = "block";
                    document.getElementById("selectLecturer").value = "0";
                    document.getElementById("nonDesignation").style.display = "none";
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("selectBox").style.display = "none";
                    document.getElementById("release").value = "0";
                  }
                  else {
                    document.getElementById("visiting").style.display = "none";
                    document.getElementById("visiting").value = "Regular";
                    document.getElementById("faculty-rank").style.display = "block";
                    document.getElementById("lbldesignation").style.display = "block";
                    document.getElementById("designation").style.display = "block";
                    document.getElementById("selectLecturer").style.display = "none";
                    document.getElementById("selectLecturer").value = "";
                    document.getElementById("nonDesignation").style.display = "block";
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("visiting-specify").value = "";
                    document.getElementById("selectBox").style.display = "none";
                  }
                }
                //auto faculty type
                  var selectType = document.getElementById("faculty-type");
                  var selectedType = selectType.options[selectType.selectedIndex].value;
                  if(selectedType === "Visiting Lecturer") {
                    document.getElementById("visiting").value = "Visiting Lecturer";
                    document.getElementById("visiting").style.display = "block";
                    document.getElementById("faculty-rank").style.display = "none";
                    document.getElementById("lbldesignation").style.display = "none";
                    document.getElementById("designation").value = "";
                    document.getElementById("designation").style.display = "none";
                    document.getElementById("selectLecturer").style.display = "block";
                    document.getElementById("selectLecturer").value = "0";
                    document.getElementById("nonDesignation").style.display = "none";
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("selectBox").style.display = "none";
                    document.getElementById("release").value = "0";
                  }
                  else {
                    document.getElementById("visiting").style.display = "none";
                    document.getElementById("visiting").value = "Regular";
                    document.getElementById("faculty-rank").style.display = "block";
                    document.getElementById("lbldesignation").style.display = "block";
                    document.getElementById("designation").style.display = "block";
                    document.getElementById("selectLecturer").style.display = "none";
                    document.getElementById("selectLecturer").value = "";
                    document.getElementById("nonDesignation").style.display = "block";
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("visiting-specify").value = "";
                    document.getElementById("selectBox").style.display = "none";
                  }
                //visiting lecturer actual time
                function resultLecturer() {
                  var selectSpecify = document.getElementById("selectLecturer");
                  var selectedSpecify = selectSpecify.options[selectSpecify.selectedIndex].value;
                  if(selectedSpecify === "specify") {
                    document.getElementById("visiting-specify").style.display = "block";
                  }
                  else {
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("visiting-specify").value = "";
                  }
                }
                //auto visiting lecturer actual time
                  var selectSpecify = document.getElementById("selectLecturer");
                  var selectedSpecify = selectSpecify.options[selectSpecify.selectedIndex].value;
                  if(selectedSpecify === "specify") {
                    document.getElementById("visiting-specify").style.display = "block";
                  }
                  else {
                    document.getElementById("visiting-specify").style.display = "none";
                    document.getElementById("visiting-specify").value = "";
                  }

                //designation mode
                function mode() {
                  var designation = document.getElementById("designation").value;
                  if(designation != "") { 
                    document.getElementById("nonDesignation").style.display = "none";
                    document.getElementById("selectBox").style.display = "block";
                    
                    var selectBox = document.getElementById("selectBox");
                    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                    <?php
                      //view
                      $greatest = 0;
                      $sqlrelease = "SELECT release_time FROM wdesignation";

                      $myDataRelease = mysqli_query($mysqli,$sqlrelease);
                      while($recordTime = mysqli_fetch_array($myDataRelease)) {
                        $grl = $recordTime['release_time'];
                        if($greatest < $grl)
                          $greatest = $grl;
                      }
                    ?>
                    if(selectedValue){
                      document.getElementById("release").value = <?php echo $greatest ?> - selectedValue;
                      document.getElementById("faculty-release-time").value = <?php echo $greatest ?> - selectedValue;
                    }
                  } else {
                      document.getElementById("release").value = "0";
                      document.getElementById("faculty-release-time").value = "0";
                      document.getElementById("nonDesignation").style.display = "block";
                      document.getElementById("selectBox").style.display = "none";
                  }
                }
                //auto designation
                if(designation != "") { 
                  document.getElementById("nonDesignation").style.display = "none";
                  document.getElementById("selectBox").style.display = "block";
                  
                  var selectBox = document.getElementById("selectBox");
                  var selectedValue = selectBox.options[selectBox.selectedIndex].value;

                    <?php
                      //view
                      $greatest = 0;
                      $sqlrelease = "SELECT release_time FROM wdesignation";

                      $myDataRelease = mysqli_query($mysqli,$sqlrelease);
                      while($recordTime = mysqli_fetch_array($myDataRelease)) {
                        $grl = $recordTime['release_time'];
                        if($greatest < $grl)
                          $greatest = $grl;
                      }
                    ?>
                  if(selectedValue) {
                    document.getElementById("release").value = <?php echo $greatest ?> - selectedValue;
                    document.getElementById("faculty-release-time").value = <?php echo $greatest ?> - selectedValue;
                  }
                } else {
                    document.getElementById("release").value = "0";
                    document.getElementById("faculty-release-time").value = "0";
                    document.getElementById("nonDesignation").style.display = "block";
                    document.getElementById("selectBox").style.display = "none";
                }
                
                //computation
                function result() {
                  var selectBox = document.getElementById("selectBox");
                  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                  //faculty type
                  var selectType = document.getElementById("faculty-type");
                  var selectedType = selectType.options[selectType.selectedIndex].value;
                  
                  <?php
                    //view
                    $greatest = 0;
                    $sqlrelease = "SELECT release_time FROM wdesignation";

                    $myDataRelease = mysqli_query($mysqli,$sqlrelease);
                    while($recordTime = mysqli_fetch_array($myDataRelease)) {
                      $grl = $recordTime['release_time'];
                      if($greatest < $grl)
                        $greatest = $grl;
                    }
                  ?>
                  if(selectedType != "Visiting Lecturer") {
                    if(selectedValue) {
                      document.getElementById("release").value = <?php echo $greatest ?> - selectedValue;
                      document.getElementById("faculty-release-time").value = <?php echo $greatest ?> - selectedValue;
                    }
                  }
                }
                //visit lecturer specify should input greater than 18
                function visitLec() {
                  var specify = document.getElementById("visiting-specify").value;

                  if(specify < 18) {
                    alert("Atleast 18 Hours aboved.");
                    document.getElementById("visiting-specify").value = "";
                  } 
                }
              </script>
              <div class="info">
                <p>Educational Qualification:</p>
                <input
                  type="text"
                  id="qualification"
                  value="<?php echo $fq ?>" style="text-transform: capitalize"
                  autocomplete="off" name="faculty-qualification"
                  required
                />
                <p>Major Assignment:</p>
                <input
                  type="text" style="text-transform: capitalize"
                  id="assessment" name="faculty-assignment"
                  value="<?php echo $fa ?>"
                  autocomplete="off"
                  required
                />
                <div class="btn-field">
                  <a href="../../../myIDP.php"
                    ><button type="button" id="backdet">Back</button>
                  </a>
                  <button type="submit" id="editdetf" name="submit">Update Details</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
