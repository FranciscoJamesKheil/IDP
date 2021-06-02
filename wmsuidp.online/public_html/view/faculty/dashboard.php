<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
  //view
  $sql = "SELECT * FROM users INNER JOIN faculty ON user_id = user_id_fk WHERE user_type='faculty' AND user_username = '$access'";

  $myData = mysqli_query($mysqli,$sql);
  while($record = mysqli_fetch_array($myData)) { 
    $uname = $record['user_name'];
    $uprofile = $record['user_profile_pic'];
    $username = $record['user_username'];
    $password = $record['user_password'];
    $facultyID = $record['faculty_id'];
    $ft = $record['faculty_type'];
    $fn = $record['faculty_firstname'];
    $ln = $record['faculty_lastname'];
    $mi = $record['faculty_mi'];
    $fr = $record['faculty_rank'];
    $fd = $record['faculty_designation'];
    $frt = $record['faculty_release_time'];
    $fq = $record['faculty_qualification'];
    $fa = $record['faculty_assignment'];
    $email = $record['faculty_email'];
  }
  //college
  $detect = "SELECT * FROM users WHERE user_username = '$access'";
  $detectID = mysqli_query($mysqli, $detect);
  while($row = mysqli_fetch_array($detectID)) {
    $detectedID = $row['college_id_fk'];
  }
  //view
  $sqlcollege = "SELECT * FROM college INNER JOIN dean ON college_id = college_id_fk WHERE college_id_fk = $detectedID";

  $myDataCollege = mysqli_query($mysqli,$sqlcollege);
  while($collegerow = mysqli_fetch_array($myDataCollege)) { 
    $clogo = $collegerow['college_logo'];
    $cname = $collegerow['college_name'];
    $dfn = $collegerow['dean_firstname'];
    $dln = $collegerow['dean_lastname'];
    $dmi = $collegerow['dean_mi'];
    $dposition = $collegerow['dean_position'];
    $ddegree = $collegerow['dean_degree'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Dashboard</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/dashboard.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Play&display=swap"
      rel="stylesheet"
    />
    <style>
      .faculty-identification {
        /*
        background-color: rgb(255, 237, 237);*/
        background: url("../font/assets/bg/25102.jpg");
        background-size: cover;
        color: black;
      }
    </style>
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM</p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">Dashboard</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a href="./home.php" id="slide-home">
            <p class="far fa-home"></p>
            Home
          </a>
        </li>
        <li id="dashboard-mobile">
          <a class="active" href="./dashboard.php" id="slide-dashboard">
            <p class="fas fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a href="./myIDP.php" id="slide-faculty"
                  ><p class="far fa-calendar"></p>
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
                ><a href="./matrix.php" id="slide-matrix"
                  ><p class="far fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="./officials.php" id="slide-officials"
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
                ><a href="./profile.php" id="slide-profile"
                  ><p class="far fa-user-cog"></p>
                  Profile</a
                ></span
              >
              <br />
              <span
                ><a
                  href="./mysql/logout.php"
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
        <img src="../font/assets/logo/wmsulogo.png" alt="" />
        <p id="nav-hd">WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="./home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="./dashboard.php"
          ><li class="active-sn">
            <span class="fas fa-tachometer-alt"></span>Dashboard
          </li></a
        >
        <a href="./myIDP.php"
          ><li><span class="far fa-calendar"></span>My Schedule</li></a
        >
        <a href="./matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="./officials.php"
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
      <script src="../font/preloader/loader.js"></script>

      <div class="content-dashboard">
        <div class="greet" style="background: white;" id="greet-bg">
          <p style="text-transform: capitalize"><span id="greet-esp">Buenas Dias</span>, <?php echo $fn ?></p>
          <p id="date-show">JAN 01, 2020</p>
        </div>
        <script src="./stylesheet/jQuery/date.js"></script>

        <div class="content-information">
          <div class="container">
            <div class="faculty-identification">
              <p>Faculty Information <br> <i style="font-size: 14px"><?php echo $ft ?></i></p>
              <div class="photoview">
                <img src="<?php echo $uprofile!=NULL? './mysql/profile/images/'.$uprofile : '../font/assets/icon/user.png'?>" id="user-profile" alt="">
              </div>
            </div>
            <div class="faculty-information">
                <div class="label">
                  <p>Name: </p>
                  <i id="capitalize"><?php echo $mi !=NULL ? $fn. " " . $mi . ". ". $ln : $fn. " " . $ln ?></i>
                </div>
                <div class="label">
                  <p>Academic Rank: </p>
                  <i><?php echo $fr ?></i>
                </div>
                <div class="label">
                  <p>Designation: </p>
                  <i><?php echo $fd != NULL ? $fd : "none"?></i>
                </div>
                <div class="label">
                  <p>Release Time: </p>
                  <i><?php echo $frt ?></i>
                </div>
                <div class="label">
                  <p>Educational Qualification: </p>
                  <i id="capitalize"><?php echo $fq ?></i>
                </div>
                <div class="label">
                  <p>Major Assignment: </p>
                  <i id="capitalize"><?php echo $fa ?></i>
                </div>
            </div>
          </div>
          <div class="container" title="Progress required 40-hour aboved." >
            <div class="faculty-identification">
              <p>Individual Daily Program Status</p>
              <div class="photoview">
                <img src="../font/assets/logo/wmsulogo.png" alt="">
              </div>
            </div>
            <div class="faculty-information" >
                <?php
                  $actualsum=0;
                  $overloadsum=0;
                  $quasisum=0;
                  $tota_hours=0;
                  $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $facultyID";
                    
                  $aresult = mysqli_query($mysqli,$sqlaresult);
                  while ($row = mysqli_fetch_array($aresult)){
                      $value = $row['SUM(sched_hours)'];

                      $actualsum += $value;
                  }
                  //overload sum
                  $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $facultyID";
                    
                  $oresult = mysqli_query($mysqli,$sqloresult);
                  while ($row = mysqli_fetch_array($oresult)){
                      $value = $row['SUM(sched_hours)'];

                      $overloadsum += $value;
                  }
                  //quasi
                  $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $facultyID";
                    
                  $qresult = mysqli_query($mysqli,$sqlqresult);
                  while ($row = mysqli_fetch_array($qresult)){
                      $value = $row['SUM(quasi_hours)'];

                      $quasisum += $value;
                  }
                  $total_hours = $actualsum + $overloadsum + $quasisum;
                  
                  //count subjects of actual
                  $thisSubjA = "";
                  //count subjects of overload
                  $thisSubjO = "";
    
                  //totalSubjects
                  $totalSubjects = 0;
                  
                  $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID";
                  $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID";
                  
                  $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
                  $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);
    
                  while ($row = mysqli_fetch_array($totalsubjA)){
                    $a1 = $row['sched_subject'];
                    $a2 = $row['sched_section'];
                    $a3 = $row['sched_subject_id'];
                    $a4 = $a1 . ' - ' . $a2 . ' (' . $a3 . ')';
                    if($thisSubjA != strtoupper($a4)) {
                      $thisSubjA = $a4;
                      $totalSubjects++;
                    } else {
                      $totalSubjects;
                    }
                  }
                  while ($rowO = mysqli_fetch_array($totalsubjO)){
                    $o1 = $rowO['sched_subject'];
                    $o2 = $rowO['sched_section'];
                    $o3 = $rowO['sched_subject_id'];
                    $o4 = $o1 . ' - ' . $o2 . ' (' . $o3 . ')';
    
                    if($thisSubjO != strtoupper($o4)) {
                      $thisSubjO = $o4;
                      $totalSubjects++;
                    } else {
                      $totalSubjects;
                    }
                  }
                ?>
                <div class="label">
                  <p>Number of Course Preparation: </p>
                  <p>(<?php echo $totalSubjects ?>)</p>
                </div>
                <div class="label">
                  <p>Actual Teaching Load: </p>
                  <p><?php echo $actualsum ?></p>
                </div>
                <div class="label">
                  <p>Overload: </p>
                  <p><?php echo $overloadsum ?></p>
                </div>
                <div class="label">
                  <p>Quasi Teaching / Others: </p>
                  <p><?php echo $quasisum ?></p>
                </div>
                <div class="label">
                  <b>Total Hours: </b>
                  <b><?php echo $total_hours ?></b>
                </div>
                <div class="label">
                  <p>Total Hours (<?php echo $total_hours ?>/40):</p>
                  <progress id="progress" value="<?php echo $total_hours ?>" max="40"></progress>
                </div>
            </div>
          </div>
          <div class="container">
            <div class="faculty-identification">
                <p>College Information</p>
                <div class="photoview">
                  <img id="anilogo" src="<?php echo $clogo!=NULL? '../general/mysql/registration/images/'.$clogo : '../font/assets/logo/wmsulogo.png'?>" alt="">
                </div>
            </div>
            <div class="faculty-information">
                <div class="label">
                  <p>Name: </p>
                  <i id="capitalize"><?php echo $cname ?></i>
                </div>
                <div class="label">
                  <p>Dean: </p>
                  <i id="capitalize"><?php echo $dmi != NULL ? $dfn . ' ' . $dmi . '. ' . $dln . ', ' . $ddegree : $dfn . ' ' . $dln . ', ' . $ddegree ?></i>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content-update">
        <p>Schedule for Today: <b id="day-to-show">(No Schedule Pleas re-login)</b></p>
        <br />
        <p id="table-tag-actual">Actual Teaching Load</p>
        <script>
          var date = new Date();
          var today = date.getDay();
          var forToday = date.getDay();

          //day
          switch (today) {
            case 0:
              forToday = "SUNDAY";
              break;
            case 1:
              forToday = "MONDAY";
              break;
            case 2:
              forToday = "TUESDAY";
              break;
            case 3:
              forToday = "WEDNESDAY";
              break;
            case 4:
              forToday = "THURSDAY";
              break;
            case 5:
              forToday = "FRIDAY";
              break;
            case 6:
              forToday = "SATURDAY";
              break;
          }
          document.getElementById("day-to-show").innerHTML = forToday;
        </script>
        <div class="scroll" id="show-actual">
          <table border="1" width="100%">
            <tr>
              <th>Subject</th>
              <th>Section</th>
              <th>Number of Students</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
            </tr>
            <?php
              $day = $_SESSION['daynow'];
              
              //view actual teaching load
              $sqlactual = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = '$day'";
              $myDataActual = mysqli_query($mysqli,$sqlactual);
              while($actualRow = mysqli_fetch_array($myDataActual)) { 
                $asd = $actualRow['sched_day'];
                $assub = $actualRow['sched_subject'];
                $assec = $actualRow['sched_section'];
                $asstud = $actualRow['sched_no_students'];
                $ast = $actualRow['sched_time'];
                $asr = $actualRow['sched_room'];
                $ash = $actualRow['sched_hours'];
            ?>
            <tr>
              <td><?php echo $assub ?></td>
              <td><?php echo $assec ?></td>
              <td><?php echo $asstud ?></td>
              <td><?php echo $ast ?></td>
              <td><?php echo $asr ?></td>
              <td><?php echo $ash ?></td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
        <p id="table-tag-overload">Overload</p>
        <div class="scroll" id="show-overload">
          <table border="1" width="100%">
            <tr>
              <th>Subject</th>
              <th>Section</th>
              <th>Number of Students</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
            </tr>
            <?php
              //view actual teaching load
              $sqloverload = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = '$day'";
              $myDataOverload = mysqli_query($mysqli,$sqloverload);
              while($overRow = mysqli_fetch_array($myDataOverload)) { 
                $osd = $overRow['sched_day'];
                $ossub = $overRow['sched_subject'];
                $ossec = $overRow['sched_section'];
                $osstud = $overRow['sched_no_students'];
                $ost = $overRow['sched_time'];
                $osr = $overRow['sched_room'];
                $osh = $overRow['sched_hours'];
            ?>
            <tr>
              <td><?php echo $ossub ?></td>
              <td><?php echo $ossec ?></td>
              <td><?php echo $osstud ?></td>
              <td><?php echo $ost ?></td>
              <td><?php echo $osr ?></td>
              <td><?php echo $osh ?></td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
        <p id="table-tag-quasi">Quasi Teaching Load</p>
        <div class="scroll" id="show-quasi">
          <table border="1" width="100%">
            <tr>
              <th>Activity</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
            </tr>
            <?php
              //view actual teaching load
              $sqlquasi = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = '$day'";
              $myDataQuasi = mysqli_query($mysqli,$sqlquasi);
              while($quasiRow = mysqli_fetch_array($myDataQuasi)) { 
                $qsd = $quasiRow['quasi_day'];
                $qsa = $quasiRow['quasi_activity'];
                $qst = $quasiRow['quasi_time'];
                $qsr = $quasiRow['quasi_room'];
                $qsh = $quasiRow['quasi_hours'];
            ?>
            <tr>
              <td><?php echo $qsa ?></td>
              <td><?php echo $qst ?></td>
              <td><?php echo $qsr ?></td>
              <td><?php echo $qsh ?></td>
            </tr>
            <?php 
              }
            ?>
          </table>
        </div>
        <div class="btn-goto-day">
          <a href="./myIDP.php">
            <button type="button">Go to Schedule</button>
          </a>
        </div>
      </div>

      <div class="content-day">
        <button type="button" id="btn-show-more-days" onclick="openDays()">
          <span class="far fa-angle-right"></span> Show Other Schedule
        </button>
        <button type="button" id="btn-show-less-days" onclick="closeDays()">
          <span class="far fa-angle-down"></span> Hide Other Schedule
        </button>
        <div class="more-content" id="more-content">
          <p id="tap-note">Tap the table to see clearly the schedules.</p>
          <div class="show-the-day">
            <h4 id="day-more">MONDAY</h4>
            <p id="table-tag-actual-1">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-1">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for monday
                  $sqlactualmon = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'MON'";
                  $myDataActualmon = mysqli_query($mysqli,$sqlactualmon);
                  while($actualRowmon = mysqli_fetch_array($myDataActualmon)) { 
                    $monasd = $actualRowmon['sched_day'];
                    $monassub = $actualRowmon['sched_subject'];
                    $monassec = $actualRowmon['sched_section'];
                    $monasstud = $actualRowmon['sched_no_students'];
                    $monast = $actualRowmon['sched_time'];
                    $monasr = $actualRowmon['sched_room'];
                    $monash = $actualRowmon['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $monassub ?></td>
                  <td><?php echo $monassec ?></td>
                  <td><?php echo $monasstud ?></td>
                  <td><?php echo $monast ?></td>
                  <td><?php echo $monasr ?></td>
                  <td><?php echo $monash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-1">OverLoad</p>
            <div class="scroll" id="show-overload-1">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for monday
                  $sqloverloadmon = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'MON'";
                  $myDataOverloadmon = mysqli_query($mysqli,$sqloverloadmon);
                  while($overRowmon = mysqli_fetch_array($myDataOverloadmon)) { 
                    $monosd = $overRowmon['sched_day'];
                    $monossub = $overRowmon['sched_subject'];
                    $monossec = $overRowmon['sched_section'];
                    $monosstud = $overRowmon['sched_no_students'];
                    $monost = $overRowmon['sched_time'];
                    $monosr = $overRowmon['sched_room'];
                    $monosh = $overRowmon['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $monossub ?></td>
                  <td><?php echo $monossec ?></td>
                  <td><?php echo $monosstud ?></td>
                  <td><?php echo $monost ?></td>
                  <td><?php echo $monosr ?></td>
                  <td><?php echo $monosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-1">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-1">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for monday
                  $sqlquasimon = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'MON'";
                  $myDataQuasimon = mysqli_query($mysqli,$sqlquasimon);
                  while($quasiRowmon = mysqli_fetch_array($myDataQuasimon)) { 
                    $monqsd = $quasiRowmon['quasi_day'];
                    $monqsa = $quasiRowmon['quasi_activity'];
                    $monqst = $quasiRowmon['quasi_time'];
                    $monqsr = $quasiRowmon['quasi_room'];
                    $monqsh = $quasiRowmon['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $monqsa ?></td>
                  <td><?php echo $monqst ?></td>
                  <td><?php echo $monqsr ?></td>
                  <td><?php echo $monqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--TUESDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">TUESDAY</h4>
            <p id="table-tag-actual-2">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-2">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for tue
                  $sqlactualtue = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'TUE'";
                  $myDataActualtue = mysqli_query($mysqli,$sqlactualtue);
                  while($actualRowtue = mysqli_fetch_array($myDataActualtue)) { 
                    $tueasd = $actualRowtue['sched_day'];
                    $tueassub = $actualRowtue['sched_subject'];
                    $tueassec = $actualRowtue['sched_section'];
                    $tueasstud = $actualRowtue['sched_no_students'];
                    $tueast = $actualRowtue['sched_time'];
                    $tueasr = $actualRowtue['sched_room'];
                    $tueash = $actualRowtue['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $tueassub ?></td>
                  <td><?php echo $tueassec ?></td>
                  <td><?php echo $tueasstud ?></td>
                  <td><?php echo $tueast ?></td>
                  <td><?php echo $tueasr ?></td>
                  <td><?php echo $tueash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-2">OverLoad</p>
            <div class="scroll" id="show-overload-2">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for tuesday
                  $sqloverloadtue = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'TUE'";
                  $myDataOverloadtue = mysqli_query($mysqli,$sqloverloadtue);
                  while($overRowtue = mysqli_fetch_array($myDataOverloadtue)) { 
                    $tueosd = $overRowtue['sched_day'];
                    $tueossub = $overRowtue['sched_subject'];
                    $tueossec = $overRowtue['sched_section'];
                    $tueosstud = $overRowtue['sched_no_students'];
                    $tueost = $overRowtue['sched_time'];
                    $tueosr = $overRowtue['sched_room'];
                    $tueosh = $overRowtue['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $tueossub ?></td>
                  <td><?php echo $tueossec ?></td>
                  <td><?php echo $tueosstud ?></td>
                  <td><?php echo $tueost ?></td>
                  <td><?php echo $tueosr ?></td>
                  <td><?php echo $tueosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-2">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-2">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for tue
                  $sqlquasitue = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'TUE'";
                  $myDataQuasitue= mysqli_query($mysqli,$sqlquasitue);
                  while($quasiRowtue = mysqli_fetch_array($myDataQuasitue)) { 
                    $tueqsd = $quasiRowtue['quasi_day'];
                    $tueqsa = $quasiRowtue['quasi_activity'];
                    $tueqst = $quasiRowtue['quasi_time'];
                    $tueqsr = $quasiRowtue['quasi_room'];
                    $tueqsh = $quasiRowtue['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $tueqsa ?></td>
                  <td><?php echo $tueqst ?></td>
                  <td><?php echo $tueqsr ?></td>
                  <td><?php echo $tueqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--WEDNESDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">WEDNESDAY</h4>
            <p id="table-tag-actual-3">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-3">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for wed
                  $sqlactualwed = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'WED'";
                  $myDataActualwed = mysqli_query($mysqli,$sqlactualwed);
                  while($actualRowwed = mysqli_fetch_array($myDataActualwed)) { 
                    $wedasd = $actualRowwed['sched_day'];
                    $wedassub = $actualRowwed['sched_subject'];
                    $wedassec = $actualRowwed['sched_section'];
                    $wedasstud = $actualRowwed['sched_no_students'];
                    $wedast = $actualRowwed['sched_time'];
                    $wedasr = $actualRowwed['sched_room'];
                    $wedash = $actualRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedassub ?></td>
                  <td><?php echo $wedassec ?></td>
                  <td><?php echo $wedasstud ?></td>
                  <td><?php echo $wedast ?></td>
                  <td><?php echo $wedasr ?></td>
                  <td><?php echo $wedash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-3">OverLoad</p>
            <div class="scroll" id="show-overload-3">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for wed
                  $sqloverloadwed = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'WED'";
                  $myDataOverloadwed = mysqli_query($mysqli,$sqloverloadwed);
                  while($overRowwed = mysqli_fetch_array($myDataOverloadwed)) { 
                    $wedosd = $overRowwed['sched_day'];
                    $wedossub = $overRowwed['sched_subject'];
                    $wedossec = $overRowwed['sched_section'];
                    $wedosstud = $overRowwed['sched_no_students'];
                    $wedost = $overRowwed['sched_time'];
                    $wedosr = $overRowwed['sched_room'];
                    $wedosh = $overRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedossub ?></td>
                  <td><?php echo $wedossec ?></td>
                  <td><?php echo $wedosstud ?></td>
                  <td><?php echo $wedost ?></td>
                  <td><?php echo $wedosr ?></td>
                  <td><?php echo $wedosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-3">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-3">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for wed
                  $sqlquasiwed = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'WED'";
                  $myDataQuasiwed = mysqli_query($mysqli,$sqlquasiwed);
                  while($quasiRowwed = mysqli_fetch_array($myDataQuasiwed)) { 
                    $wedqsd = $quasiRowwed['quasi_day'];
                    $wedqsa = $quasiRowwed['quasi_activity'];
                    $wedqst = $quasiRowwed['quasi_time'];
                    $wedqsr = $quasiRowwed['quasi_room'];
                    $wedqsh = $quasiRowwed['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $wedqsa ?></td>
                  <td><?php echo $wedqst ?></td>
                  <td><?php echo $wedqsr ?></td>
                  <td><?php echo $wedqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--THURSDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">THURSDAY</h4>
            <p id="table-tag-actual-4">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-4">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for wed
                  $sqlactualwed = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'THU'";
                  $myDataActualwed = mysqli_query($mysqli,$sqlactualwed);
                  while($actualRowwed = mysqli_fetch_array($myDataActualwed)) { 
                    $wedasd = $actualRowwed['sched_day'];
                    $wedassub = $actualRowwed['sched_subject'];
                    $wedassec = $actualRowwed['sched_section'];
                    $wedasstud = $actualRowwed['sched_no_students'];
                    $wedast = $actualRowwed['sched_time'];
                    $wedasr = $actualRowwed['sched_room'];
                    $wedash = $actualRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedassub ?></td>
                  <td><?php echo $wedassec ?></td>
                  <td><?php echo $wedasstud ?></td>
                  <td><?php echo $wedast ?></td>
                  <td><?php echo $wedasr ?></td>
                  <td><?php echo $wedash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-4">OverLoad</p>
            <div class="scroll" id="show-overload-4">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for wed
                  $sqloverloadwed = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'THU'";
                  $myDataOverloadwed = mysqli_query($mysqli,$sqloverloadwed);
                  while($overRowwed = mysqli_fetch_array($myDataOverloadwed)) { 
                    $wedosd = $overRowwed['sched_day'];
                    $wedossub = $overRowwed['sched_subject'];
                    $wedossec = $overRowwed['sched_section'];
                    $wedosstud = $overRowwed['sched_no_students'];
                    $wedost = $overRowwed['sched_time'];
                    $wedosr = $overRowwed['sched_room'];
                    $wedosh = $overRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedossub ?></td>
                  <td><?php echo $wedossec ?></td>
                  <td><?php echo $wedosstud ?></td>
                  <td><?php echo $wedost ?></td>
                  <td><?php echo $wedosr ?></td>
                  <td><?php echo $wedosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-4">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-4">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for thu
                  $sqlquasiwed = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'THU'";
                  $myDataQuasiwed = mysqli_query($mysqli,$sqlquasiwed);
                  while($quasiRowwed = mysqli_fetch_array($myDataQuasiwed)) { 
                    $wedqsd = $quasiRowwed['quasi_day'];
                    $wedqsa = $quasiRowwed['quasi_activity'];
                    $wedqst = $quasiRowwed['quasi_time'];
                    $wedqsr = $quasiRowwed['quasi_room'];
                    $wedqsh = $quasiRowwed['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $wedqsa ?></td>
                  <td><?php echo $wedqst ?></td>
                  <td><?php echo $wedqsr ?></td>
                  <td><?php echo $wedqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--FRIDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">FRIDAY</h4>
            <p id="table-tag-actual-5">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-5">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for wed
                  $sqlactualwed = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'FRI'";
                  $myDataActualwed = mysqli_query($mysqli,$sqlactualwed);
                  while($actualRowwed = mysqli_fetch_array($myDataActualwed)) { 
                    $wedasd = $actualRowwed['sched_day'];
                    $wedassub = $actualRowwed['sched_subject'];
                    $wedassec = $actualRowwed['sched_section'];
                    $wedasstud = $actualRowwed['sched_no_students'];
                    $wedast = $actualRowwed['sched_time'];
                    $wedasr = $actualRowwed['sched_room'];
                    $wedash = $actualRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedassub ?></td>
                  <td><?php echo $wedassec ?></td>
                  <td><?php echo $wedasstud ?></td>
                  <td><?php echo $wedast ?></td>
                  <td><?php echo $wedasr ?></td>
                  <td><?php echo $wedash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-5">OverLoad</p>
            <div class="scroll" id="show-overload-5">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for wed
                  $sqloverloadwed = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'FRI'";
                  $myDataOverloadwed = mysqli_query($mysqli,$sqloverloadwed);
                  while($overRowwed = mysqli_fetch_array($myDataOverloadwed)) { 
                    $wedosd = $overRowwed['sched_day'];
                    $wedossub = $overRowwed['sched_subject'];
                    $wedossec = $overRowwed['sched_section'];
                    $wedosstud = $overRowwed['sched_no_students'];
                    $wedost = $overRowwed['sched_time'];
                    $wedosr = $overRowwed['sched_room'];
                    $wedosh = $overRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedossub ?></td>
                  <td><?php echo $wedossec ?></td>
                  <td><?php echo $wedosstud ?></td>
                  <td><?php echo $wedost ?></td>
                  <td><?php echo $wedosr ?></td>
                  <td><?php echo $wedosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-5">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-5">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for wed
                  $sqlquasiwed = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'FRI'";
                  $myDataQuasiwed = mysqli_query($mysqli,$sqlquasiwed);
                  while($quasiRowwed = mysqli_fetch_array($myDataQuasiwed)) { 
                    $wedqsd = $quasiRowwed['quasi_day'];
                    $wedqsa = $quasiRowwed['quasi_activity'];
                    $wedqst = $quasiRowwed['quasi_time'];
                    $wedqsr = $quasiRowwed['quasi_room'];
                    $wedqsh = $quasiRowwed['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $wedqsa ?></td>
                  <td><?php echo $wedqst ?></td>
                  <td><?php echo $wedqsr ?></td>
                  <td><?php echo $wedqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--SATURDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">SATURDAY</h4>
            <p id="table-tag-actual-6">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-6">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for sat
                  $sqlactualwed = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'SAT'";
                  $myDataActualwed = mysqli_query($mysqli,$sqlactualwed);
                  while($actualRowwed = mysqli_fetch_array($myDataActualwed)) { 
                    $wedasd = $actualRowwed['sched_day'];
                    $wedassub = $actualRowwed['sched_subject'];
                    $wedassec = $actualRowwed['sched_section'];
                    $wedasstud = $actualRowwed['sched_no_students'];
                    $wedast = $actualRowwed['sched_time'];
                    $wedasr = $actualRowwed['sched_room'];
                    $wedash = $actualRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedassub ?></td>
                  <td><?php echo $wedassec ?></td>
                  <td><?php echo $wedasstud ?></td>
                  <td><?php echo $wedast ?></td>
                  <td><?php echo $wedasr ?></td>
                  <td><?php echo $wedash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-6">OverLoad</p>
            <div class="scroll" id="show-overload-6">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for sat
                  $sqloverloadwed = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'SAT'";
                  $myDataOverloadwed = mysqli_query($mysqli,$sqloverloadwed);
                  while($overRowwed = mysqli_fetch_array($myDataOverloadwed)) { 
                    $wedosd = $overRowwed['sched_day'];
                    $wedossub = $overRowwed['sched_subject'];
                    $wedossec = $overRowwed['sched_section'];
                    $wedosstud = $overRowwed['sched_no_students'];
                    $wedost = $overRowwed['sched_time'];
                    $wedosr = $overRowwed['sched_room'];
                    $wedosh = $overRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedossub ?></td>
                  <td><?php echo $wedossec ?></td>
                  <td><?php echo $wedosstud ?></td>
                  <td><?php echo $wedost ?></td>
                  <td><?php echo $wedosr ?></td>
                  <td><?php echo $wedosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-6">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-6">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for sat
                  $sqlquasiwed = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'SAT'";
                  $myDataQuasiwed = mysqli_query($mysqli,$sqlquasiwed);
                  while($quasiRowwed = mysqli_fetch_array($myDataQuasiwed)) { 
                    $wedqsd = $quasiRowwed['quasi_day'];
                    $wedqsa = $quasiRowwed['quasi_activity'];
                    $wedqst = $quasiRowwed['quasi_time'];
                    $wedqsr = $quasiRowwed['quasi_room'];
                    $wedqsh = $quasiRowwed['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $wedqsa ?></td>
                  <td><?php echo $wedqst ?></td>
                  <td><?php echo $wedqsr ?></td>
                  <td><?php echo $wedqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
          <!--SUNDAY-->
          <br>
          <div class="show-the-day">
            <h4 id="day-more">SUNDAY</h4>
            <p id="table-tag-actual-7">Actual Teaching Load</p>
            <div class="scroll" id="show-actual-7">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view actual teaching load for sun
                  $sqlactualwed = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'SUN'";
                  $myDataActualwed = mysqli_query($mysqli,$sqlactualwed);
                  while($actualRowwed = mysqli_fetch_array($myDataActualwed)) { 
                    $wedasd = $actualRowwed['sched_day'];
                    $wedassub = $actualRowwed['sched_subject'];
                    $wedassec = $actualRowwed['sched_section'];
                    $wedasstud = $actualRowwed['sched_no_students'];
                    $wedast = $actualRowwed['sched_time'];
                    $wedasr = $actualRowwed['sched_room'];
                    $wedash = $actualRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedassub ?></td>
                  <td><?php echo $wedassec ?></td>
                  <td><?php echo $wedasstud ?></td>
                  <td><?php echo $wedast ?></td>
                  <td><?php echo $wedasr ?></td>
                  <td><?php echo $wedash ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-overload-7">OverLoad</p>
            <div class="scroll" id="show-overload-7">
              <table border="1" width="100%">
                <tr>
                  <th>Subject</th>
                  <th>Section</th>
                  <th>Number of Students</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view overload for sun
                  $sqloverloadwed = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'SUN'";
                  $myDataOverloadwed = mysqli_query($mysqli,$sqloverloadwed);
                  while($overRowwed = mysqli_fetch_array($myDataOverloadwed)) { 
                    $wedosd = $overRowwed['sched_day'];
                    $wedossub = $overRowwed['sched_subject'];
                    $wedossec = $overRowwed['sched_section'];
                    $wedosstud = $overRowwed['sched_no_students'];
                    $wedost = $overRowwed['sched_time'];
                    $wedosr = $overRowwed['sched_room'];
                    $wedosh = $overRowwed['sched_hours'];
                ?>
                <tr>
                  <td><?php echo $wedossub ?></td>
                  <td><?php echo $wedossec ?></td>
                  <td><?php echo $wedosstud ?></td>
                  <td><?php echo $wedost ?></td>
                  <td><?php echo $wedosr ?></td>
                  <td><?php echo $wedosh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
            <p id="table-tag-quasi-7">Quasi Teaching Load</p>
            <div class="scroll" id="show-quasi-7">
              <table border="1" width="100%">
                <tr>
                  <th>Activity</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Hours</th>
                </tr>
                <?php
                  //view quasi teaching load for sun
                  $sqlquasiwed = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'SUN'";
                  $myDataQuasiwed = mysqli_query($mysqli,$sqlquasiwed);
                  while($quasiRowwed = mysqli_fetch_array($myDataQuasiwed)) { 
                    $wedqsd = $quasiRowwed['quasi_day'];
                    $wedqsa = $quasiRowwed['quasi_activity'];
                    $wedqst = $quasiRowwed['quasi_time'];
                    $wedqsr = $quasiRowwed['quasi_room'];
                    $wedqsh = $quasiRowwed['quasi_hours'];
                ?>
                <tr>
                  <td><?php echo $wedqsa ?></td>
                  <td><?php echo $wedqst ?></td>
                  <td><?php echo $wedqsr ?></td>
                  <td><?php echo $wedqsh ?></td>
                </tr>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
        </div>
        <hr />
      </div>
    <input type="text" value="<?php echo $ft ?>" id="faculty-type" hidden>
      <script>
        //check for faculty type
        var factype = document.getElementById("faculty-type").value;

        if(factype === "Visiting Lecturer") {
          document.getElementById("show-actual").style.display = "none";
          document.getElementById("show-quasi").style.display = "none";
          
          document.getElementById("table-tag-actual").style.display = "none";
          document.getElementById("table-tag-quasi").style.display = "none";

          for(var a=1; a<=7; a++) {
            document.getElementById("show-actual-"+a).style.display = "none";
            document.getElementById("show-quasi-"+a).style.display = "none";

            document.getElementById("table-tag-actual-"+a).style.display = "none";
            document.getElementById("table-tag-quasi-"+a).style.display = "none";
          }
        } else {
          document.getElementById("show-actual").style.display = "block";
          document.getElementById("show-quasi").style.display = "block";
          
          document.getElementById("table-tag-actual").style.display = "block";
          document.getElementById("table-tag-quasi").style.display = "block";

          for(var a=1; a<=7; a++) {
            document.getElementById("show-actual-"+a).style.display = "block";
            document.getElementById("show-quasi-"+a).style.display = "block";

            document.getElementById("table-tag-actual-"+a).style.display = "block";
            document.getElementById("table-tag-quasi-"+a).style.display = "block";
          }
        }
        function openDays() {
          document.getElementById("btn-show-more-days").style.display = "none";
          document.getElementById("btn-show-less-days").style.display = "block";

          document.getElementById("more-content").style.height = "300rem";
        }
        function closeDays() {
          document.getElementById("btn-show-more-days").style.display = "block";
          document.getElementById("btn-show-less-days").style.display = "none";

          document.getElementById("more-content").style.height = "0";
        }
      </script>

      <!-- Who is in the room right room
      <div class="content-day">
        <button type="button" id="btn-show-more-room" onclick="openRoom()">
          <span class="far fa-angle-right"></span> Show Room Status
        </button>
        <button type="button" id="btn-show-less-room" onclick="closeRoom()">
          <span class="far fa-angle-down"></span> Hide Room Status
        </button>
        <div class="more-content" id="more-content-who">
          <div class="know">
            <b>CPADS 4 : </b>
            <p>7:00 AM - 8:30 AM <span class="far fa-arrow-right"></span> Occupied</p>
            <p>8:30 AM - 10:00 AM <span class="far fa-arrow-right"></span> Occupied</p>
          </div>
          <br />
          <div class="know">
            <b>CPADS 5 : </b>
            <p>7:00 AM - 8:30 AM <span class="far fa-arrow-right"></span> Occupied</p>
          </div>
        </div>
        <hr />
      </div>
      <script>
        function openRoom() {
          document.getElementById("btn-show-more-room").style.display = "none";
          document.getElementById("btn-show-less-room").style.display = "block";

          document.getElementById("more-content-who").style.height = "10rem";
        }
        function closeRoom() {
          document.getElementById("btn-show-more-room").style.display = "block";
          document.getElementById("btn-show-less-room").style.display = "none";

          document.getElementById("more-content-who").style.height = "0";
        }
      </script>-->
      <footer>
        <p>
          <img
            id="img-footer"
            src="../font/assets/logo/wmsulogo.png"
            alt="IDP"
          />All Rights Reserved &copy 2021 WMSU IDP
          <img
            id="img-footer"
            src="../font/assets/logo/idplogo.png"
            alt="IDP"
          />
        </p>
      </footer>
    </main>
    <script src="../font/jQuery/time.js"></script>
    <script src="./stylesheet/jQuery/time.js"></script>
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
