<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
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
    $faculty_ID = $record['faculty_id'];
    $ft = $record['faculty_type'];
    $ffn = $record['faculty_firstname'];
    $fln = $record['faculty_lastname'];
    $fmi = $record['faculty_mi'];
    $fr = $record['faculty_rank'];
    $fd = $record['faculty_designation'];
    $frt = $record['faculty_release_time'];
    $fat = $record['faculty_actual_time'];
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
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/myidp.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Play&display=swap"
      rel="stylesheet"
    />
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
        <p id="page-title">MY SCHEDULE (<i><?php echo $ft ?></i>)</p>
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
          <a href="./dashboard.php" id="slide-dashboard">
            <p class="far fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a class="active" href="./myIDP.php" id="slide-faculty"
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
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="./myIDP.php"
          ><li class="active-sn">
            <span class="fas fa-calendar"></span>My Schedule
          </li></a
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
      <!--content-->
      <div class="main">
        <div class="content-header">
          <div class="img-head">
            <img
              src="../font/assets/vector/3125019.jpg"
              id="idpvector"
              alt=""
            />
          </div>
          <div class="basic">
            <div class="info">
              <p>Name</p>
              <input type="text" style="text-transform: capitalize" id="name" value="<?php echo $fmi !=NULL ? $ffn. " " . $fmi . ". ". $fln : $ffn. " " . $fln ?>" disabled />
              <p>Academic Rank:</p>
              <input type="text" style="text-transform: capitalize" id="rank" value="<?php echo $fr ?>" disabled />
              <p>Designation:</p>
              <input type="text" style="text-transform: capitalize" id="designation" value="<?php echo $fd ?>" disabled />
              <p>Release Time:</p>
              <input type="text" id="release" value="<?php echo $frt ?>" disabled />
            </div>
            <div class="info">
              <p>Educational Qualification:</p>
              <input type="text" style="text-transform: capitalize" id="qualification" value="<?php echo $fq ?>" disabled />
              <p>Major Assignment:</p>
              <input type="text" style="text-transform: capitalize" id="assessment" value="<?php echo $fa ?>" disabled />
              <p>Actual Teahing:</p>
              <input type="text" style="text-transform: capitalize" id="actual-teaching" value="<?php echo $fat ?>" disabled />
              <div class="btn-field">
                <a href="./stylesheet/pop/myIDP/fillup.php"
                  ><button type="button" id="editdet"><div class="edit-slide"></div>Go to Update</button></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <p id="day-tag">DAYS OF WORK</p>
      <div class="day-content">
        <div class="divide">
          <div class="horizontal">
            <!--MON-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_mon=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'MON'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_mon = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day">
                <p id="day-txt">MON</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_mon ?></b>
                  <!--SUM DATABASE-->
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/monday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
            <!--TUE-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_tue=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'TUE'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_tue = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="tue">
                <p id="day-txt">TUE</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_tue ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/tuesday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="divide">
          <div class="horizontal">
            <!--WED-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_wed=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'WED'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_wed = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="wed">
                <p id="day-txt">WED</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_wed ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/wednesday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
            <!--THU-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_thu=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'THU'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_thu = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="thu">
                <p id="day-txt">THU</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_thu ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/thursday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="divide">
          <div class="horizontal">
            <!--FRI-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_fri=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'FRI'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_fri = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="fri">
                <p id="day-txt">FRI</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_fri ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/friday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
            <!--SAT-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_sat=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'SAT'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_sat = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="sat">
                <p id="day-txt">SAT</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_sat ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/saturday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="divide">
          <div class="horizontal">
            <!--SUN-->
            <?php
            $actualsum=0;
            $overloadsum=0;
            $quasisum=0;
            $total_hours_sun=0;
            $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";
              
            $aresult = mysqli_query($mysqli,$sqlaresult);
            while ($row = mysqli_fetch_array($aresult)){
                $value = $row['SUM(sched_hours)'];

                $actualsum += $value;
            }
            //overload sum
            $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";
              
            $oresult = mysqli_query($mysqli,$sqloresult);
            while ($row = mysqli_fetch_array($oresult)){
                $value = $row['SUM(sched_hours)'];

                $overloadsum += $value;
            }
            //quasi
            $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'SUN'";
              
            $qresult = mysqli_query($mysqli,$sqlqresult);
            while ($row = mysqli_fetch_array($qresult)){
                $value = $row['SUM(quasi_hours)'];

                $quasisum += $value;
            }
            $total_hours_sun = $actualsum + $overloadsum + $quasisum;

            //count subjects of actual and overload
            $thisSubjA = "";
            $thisSubjO = "";

            //totalSubjects
            $totalSubjects = 0;

            $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";
            $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";
            
            $totalsubjA = mysqli_query($mysqli,$sqlsubjectA);
            $totalsubjO = mysqli_query($mysqli,$sqlsubjectO);

            while ($row = mysqli_fetch_array($totalsubjA)){
              if($thisSubjA == "") {
                $thisSubjA = $row['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
            while ($rowO = mysqli_fetch_array($totalsubjO)){
              if($thisSubjO == "") {
                $thisSubjO = $rowO['sched_subject'];
                $totalSubjects ++;
              } else {
                $totalSubjects ++;
              }
            }
          ?>
            <div class="content">
              <div class="img-day" id="fri">
                <p id="day-txt">SUN</p>
              </div>
              <div class="day-info">
                <div class="day-total">
                  <p>Total Subject:</p>
                  <b><?php echo $totalSubjects ?></b>
                </div>
                <div class="day-total">
                  <p>Daily Hours:</p>
                  <b><?php echo $total_hours_sun ?></b>
                </div>
              </div>
              <div class="day-btn">
                <a href="./day/sunday.php"
                  ><button type="text"><div class="add-slide"></div>Add Schedule</button></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grand-total">
        <div class="load-div">
          <div class="load-label">
            <p>Number of course preparation:</p>
            <p>Actual Teaching Load:</p>
            <p>Overload:</p>
            <p>Quasi Teaching/ Others:</p>
          </div>
          <div class="load-label">
            <?php
              $actualsum=0;
              $overloadsum=0;
              $quasisum=0;
              $total_hours=0;
              $sqlaresult = "SELECT SUM(sched_hours) FROM actualteachingload WHERE faculty_id_fk = $faculty_ID";
                
              $aresult = mysqli_query($mysqli,$sqlaresult);
              while ($row = mysqli_fetch_array($aresult)){
                  $value = $row['SUM(sched_hours)'];

                  $actualsum += $value;
              }
              //overload sum
              $sqloresult = "SELECT SUM(sched_hours) FROM overload WHERE faculty_id_fk = $faculty_ID";
                
              $oresult = mysqli_query($mysqli,$sqloresult);
              while ($row = mysqli_fetch_array($oresult)){
                  $value = $row['SUM(sched_hours)'];

                  $overloadsum += $value;
              }
              //quasi
              $sqlqresult = "SELECT SUM(quasi_hours) FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID";
                
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
              
              $sqlsubjectA = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID";
              $sqlsubjectO = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID";
              
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
            <p><?php echo $totalSubjects ?></p>
            <p><?php echo $actualsum ?></p>
            <p><?php echo $overloadsum ?></p>
            <p><?php echo $quasisum ?></p>
          </div>
        </div> 
        <div class="plot-div" id="plot-div" title="Individual Daily Program Status">
          <table border="1" id="status-plot">
            <tr>
              <th rowspan="2" id="bgrey">Activity</th>
              <th colspan="3" id="bgrey">Hours</th>
            </tr>
            <tr>
              <td id="bgrey">Required</td>
              <td id="bgrey">Plot</td>
              <td id="bgrey">Deficient</td>
            </tr>
            <?php
              //matrix with
              $sqlMatrix =  "SELECT * FROM wdesignation WHERE release_time = $frt ";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $with_research = $matrixRow['research_ext_pro'];
                  $with_function = $matrixRow['admin_function'];
                  $with_instruction = $matrixRow['instruction'];
                  $with_quasi = $matrixRow['quasi'];
                  $with_prep = $matrixRow['lesson_prep'];
                  $with_others = $matrixRow['others'];
              }
              //check rank type
              $sqlMatrixR = "SELECT * FROM wodesignation WHERE instruction = $fat";
                
              $matrixResultR = mysqli_query($mysqli,$sqlMatrixR);
              while ($matrixRow = mysqli_fetch_array($matrixResultR)){
                $ranktype = $matrixRow['rank_type'];
              }
              $thisRank = "";
              if($fr == "Professor I" || $fr == "Professor II" || $fr == "Professor III" || $fr == "Professor IV" || $fr == "Professor V" || $fr == "Professor VI" || $fr == "College Professor" || $fr == "University Professor") {
                $thisRank = "Professors";
              } else {
                $thisRank = "IAAP";
              }
              //matrix without display
              $sqlMatrix = "SELECT * FROM wodesignation WHERE instruction = $fat AND rank_type = '$thisRank'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $without_research = $matrixRow['research_ext_pro'];
                  $without_assurance = $matrixRow['quality_assurance'];
                  $without_instruction = $matrixRow['instruction'];
                  $without_quasi = $matrixRow['quasi'];
                  $without_prep = $matrixRow['lesson_prep'];
                  $without_others = $matrixRow['others'];
              }
              //quasi category
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Research, Extension or Production'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qhstatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qhstatus += $matrixRow['quasi_hours'];
              }
              //quasi assurance
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Quality Assurance'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qastatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qastatus += $matrixRow['quasi_hours'];
              }
              //quasi function
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Administrative Function'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qfstatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qfstatus += $matrixRow['quasi_hours'];
              }
              //quasi teaching
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Quasi Teaching'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qtstatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qtstatus += $matrixRow['quasi_hours'];
              }
              //quasi lesson prep
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Lesson Preparation'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qlstatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qlstatus += $matrixRow['quasi_hours'];
              }
              //quasi others
              $sqlMatrix = "SELECT quasi_hours FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_category = 'Others'";
                
              $matrixResult = mysqli_query($mysqli,$sqlMatrix);
              $qostatus = 0;
              while ($matrixRow = mysqli_fetch_array($matrixResult)){
                  $qostatus += $matrixRow['quasi_hours'];
              }
            ?>
            <tr>
              <td>Actual Teaching: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_instruction : $with_instruction ?></td>
              <td><?php echo $actualsum ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_instruction-$actualsum : $with_instruction-$actualsum ?></td>
            </tr>
            <tr>
              <td>Research / Extension / Production: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_research : $with_research ?></td>
              <td><?php echo $qhstatus ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_research-$qhstatus : $with_research-$qhstatus ?></td>
            </tr>
            <tr>
              <td id="modefunction">Administrative Function: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_assurance : $with_function ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $qastatus : $qfstatus ?></</td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_assurance-$qastatus : $with_function-$qfstatus ?></td>
            </tr>
            <script>
              var des = document.getElementById("designation").value;

              if(des === "")
                document.getElementById("modefunction").innerHTML = "Quality Assurance Process: ";
              else
                document.getElementById("modefunction").innerHTML = "Administrative Function: ";
            </script>
            <tr>
              <td>Quasi: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_quasi : $with_quasi ?></td>
              <td><?php echo $qtstatus ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_quasi-$qtstatus : $with_quasi-$qtstatus ?></td>
            </tr>
            <tr>
              <td>Lesson Preparation: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_prep : $with_prep ?></td>
              <td><?php echo $qlstatus ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_prep-$qlstatus : $with_prep-$qlstatus ?></td>
            </tr>
            <tr>
              <td>Others: </td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_others : $with_others ?></td>
              <td><?php echo $qostatus ?></td>
              <td><?php echo $fd == "" ? $fr == "" || $fr == "Visiting Lecturer" ? "0" : $without_others-$qostatus : $with_others-$qostatus ?></td>
            </tr>
          </table>
        </div>
        <input type="text" id="type-fac" value="<?php echo $ft ?>" hidden />
        <div class="grand-div" title="Your Weekly Total Hours">
          <div class="total">
            <h3>TOTAL HOURS: <input type="text" id="total-hours" style="width: 3rem;text-align: center;" value="<?php echo $total_hours ?>" disabled/></h3>
          </div>
          <p id="vl-show" style="display: none">Your Total Hours should be less than 40-hour and equals or greater than 3-hour as a Visiting Lecturer. To be able to print your IDP.</p>
          <br />
          <button type="button" id="btn-print" onclick="printornot()"><span class="fas fa-print"></span> Print</button>
          <script>
            var totalH = document.getElementById("total-hours").value;
            var type = document.getElementById("type-fac").value;

            if(type === "Visiting Lecturer") {
              if(totalH < 40 && totalH >= 3) {
                document.getElementById("btn-print").style="display: block";
                document.getElementById("vl-show").style="display: none";
                document.getElementById("btn-print").style="background: rgb(140, 0, 0)";
              }
              else {
                document.getElementById("btn-print").style="display: none";
                document.getElementById("vl-show").style="display: block";
              }
            } else {
              if(totalH < 40)
                document.getElementById("btn-print").style="background: rgb(200, 200, 200)";
            }

            function printornot() {
              var verify = document.getElementById("rank").value;
              if(type === "Visiting Lecturer") {
                if(totalH < 40 && totalH >= 3) {
                  //print
                  open("./idp/print.php");
                }
              } else {
                if(totalH < 40)
                  alert("It requires at least 40 hours to print your Individual Daily Program.\nIt is ready to print, once the print button becomes dark red.");
                else if(totalH >= 40 && verify == "") {
                    alert("<?php echo ucwords($ffn) ?>, Fill up first the form.. 😪");
                } else 
                    open("./idp/print.php");
              }
            }
          </script>
        </div>
      </div>
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

    <div class="modal-container" id="notification01">
      <div class="modal-content">
        <div class="arrow"></div>
        <h2 style="text-transform: capitalize">Hello, <?php echo $ffn ?></h2>
        <br />
        <p>Fill up first the form...</p>
        <p>Update Now?</p>
        <div class="btn-alert">
          <button type="button" onclick="closeNotif()" id="skip">Skip</button>
          <a href="./stylesheet/pop/myIDP/fillup.php"
            ><button type="button">Okay</button></a
          >
        </div>
      </div>
    </div>
    <script>
      var name = document.getElementById("name").value;
      var rank = document.getElementById("rank").value;
      var quali = document.getElementById("qualification").value;
      var assess = document.getElementById("assessment").value;

      if (name === "" || rank === "" || quali === "" || assess === "") {
        setInterval(() => {
          document.getElementById("notification01").style.opacity = 1;
        }, 2000);
      } else {
        document.getElementById("notification01").style.display = "none";
      }
      function closeNotif() {
        setInterval(() => {
          document.getElementById("notification01").style.opacity = 0;
        }, 0);
        setInterval(() => {
          document.getElementById("notification01").style.display = "none";
        }, 1000);
      }
    </script>
  </body>
</html>
