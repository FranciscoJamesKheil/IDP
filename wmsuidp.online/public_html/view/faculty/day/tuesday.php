<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../../index.php");
    die();
  }
  //detect user username
  $sqlDetect = "SELECT * FROM users WHERE user_username = '$access'";
  $myDataDetect = mysqli_query($mysqli,$sqlDetect);
   
  while($record = mysqli_fetch_array($myDataDetect)) { 
    $userID = $record['user_id'];
  }

  //detect faculty id
  $sqlFacultyID = "SELECT * FROM faculty WHERE user_id_fk = '$userID'";
  $myDataFacultyID = mysqli_query($mysqli,$sqlFacultyID);
   
  while($record = mysqli_fetch_array($myDataFacultyID)) { 
    $facultyID = $record['faculty_id'];
  }
  //view
  $sqlfind = "SELECT * FROM faculty WHERE faculty_id = $facultyID";

  $myDataFind = mysqli_query($mysqli,$sqlfind);
  while($recordfound = mysqli_fetch_array($myDataFind)) { 
    $ftype = $recordfound['faculty_type'];
  }
  //time conflict check
  $conflictCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | My Schedule</title>
    <link rel="icon" href="../../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="../stylesheet/content/header.css" />
    <link rel="stylesheet" href="./day.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../font/preloader/loader.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Play&display=swap"
      rel="stylesheet"
    />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM <?php echo $facultyID ?></p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">MY SCHEDULE</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a href="../home.php" id="slide-home">
            <p class="far fa-home"></p>
            Home
          </a>
        </li>
        <li id="dashboard-mobile">
          <a href="../dashboard.php" id="slide-dashboard">
            <p class="far fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a class="active" href="../myIDP.php" id="slide-faculty"
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
                ><a href="../matrix.php" id="slide-matrix"
                  ><p class="far fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="../officials.php" id="slide-officials"
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
                ><a href="../profile.php" id="slide-profile"
                  ><p class="far fa-user-cog"></p>
                  Profile</a
                ></span
              >
              <br />
              <span
                ><a
                  href="../../../index.php"
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
        <img src="../../font/assets/logo/wmsulogo.png" alt="" />
        <p id="nav-hd">WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="../home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="../dashboard.php"
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="../myIDP.php"
          ><li class="active-sn">
            <span class="fas fa-calendar"></span>My Schedule
          </li></a
        >
        <a href="../matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="../officials.php"
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
      <script src="../../font/preloader/loader.js"></script>

      <!--content-->
      <div class="the-day">
        <div class="arrow-left">
          <a href="../myIDP.php"><span class="fas fa-arrow-left"></span></a>
        </div>
        <h2 id="day-text">TUESDAY</h2>
      </div>
      <br /><br /><br />
      <br />
      <!--actual teaching-->
      <div class="actual-teaching" id="show-actual">
        <div class="head-opt">
          <h3 id="ac-tag">Actual Teaching Load</h3>
          <div class="point"><span class="fas fa-arrow-left"></span></div>
          <span
            id="add-sd"
            class="fas fa-plus-circle"
            onclick="openAC()"
          ></span>
        </div>
        <div class="scroll">
          <table id="ac-tbl" border="1">
            <tr>
              <th>Subject/Section</th>
              <th>Number of Students</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
              <th colspan="2">Action</th>
            </tr>
            <?php          
              //view
              $sqlActual = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $facultyID AND sched_day = 'TUE'";

              $myDataActual = mysqli_query($mysqli,$sqlActual);
              while($record = mysqli_fetch_array($myDataActual)) {
                $sid = $record['sched_id'];
                $ssubject = $record['sched_subject'];
                $ssection = $record['sched_section'];
                $ssubjectid = $record['sched_subject_id'];
                $sstudents = $record['sched_no_students'];
                $stime = $record['sched_time'];
                $sroom = $record['sched_room'];
                $shours = $record['sched_hours'];
                $sfrom = $record['time_from'];
                $sto = $record['time_to'];
                for($a = $sfrom; $a < $sto; $a+=0.5) {
                    $conflict[$conflictCount] = $a;
                    $conflictCount++;
                }
            ?>
            <tr>
              <td><?php echo $ssubject . ' - ' . $ssection . ' (' . $ssubjectid . ')'?></td>
              <td><?php echo $sstudents ?></td>
              <td><?php echo $stime ?></td>
              <td><?php echo $sroom ?></td>
              <td><?php echo $shours ?></td>
              <td>
                <button type="button" id="edit" onclick="aceditsched('<?php echo $sid ?>','<?php echo $ssubject ?>','<?php echo $ssection ?>','<?php echo $ssubjectid ?>','<?php echo $sstudents ?>','<?php echo $sroom ?>')">
                  Edit
                </button>
              </td>
              <td>
                <button type="button" id="del" onclick="acdelsched('<?php echo $sid ?>')">
                  Delete
                </button>
              </td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
      </div>

      <!--modal-->
      <div class="modal-container" id="ac01">
        <div class="modal-content">
          <form action="./mysql/tue/add-actual.php" method="POST">
            <h2><span class="far fa-calendar"></span> Actual Teaching Load</h2>
            <br />
            <p>Add your new schedule for tuesday.</p>
            <br />
            <input type="text" value="<?php echo $facultyID ?>" name="faculty-id" hidden>
            <input type="text" autocomplete="off" value="TUE" name="actual-day" hidden>
            <label for="">Subject Code: </label>
            <input type="text" autocomplete="off" name="actual-subject" required />
            <label for="">Section: </label>
            <input type="text" autocomplete="off" name="actual-section" required />
            <label for="">Subject ID: </label>
            <input type="text" autocomplete="off" name="actual-subject-id" required />
            <label for="">Number of Students: </label>
            <input type="number" autocomplete="off" id="no-studs" name="actual-students" onchange="noStuds()" required />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select name="actual-from-time" id="time-from-ac" onchange="calac()">
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select name="actual-to-time" id="time-to-ac" onchange="calac()">
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Room: </label>
            <input type="text" autocomplete="off" name="actual-room" required />
            <label for="">Hours: </label>
            <input
              type="text"
              id="ac-hours"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text" name="actual-hours"
              id="ac-hours-put"
              style="cursor: not-allowed; display: none;"
              required
            />
            
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="actual-submit">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--Modal Edit for Actual Teaching Load -->
      <div class="modal-container" id="acedit01">
        <div class="modal-content">
          <form action="./mysql/tue/update-actual.php" method="POST">
            <h2><span class="far fa-calendar"></span> Actual Teaching Load</h2>
            <br />
            <p>Update your schedule for tuesday.</p>
            <br />
            <input type="text" id="actual-to-update" name="actual-schedid-update" hidden>
            <input type="text" value="TUE" name="actual-day-update" hidden>
            
            <label for="">Subject Code: </label>
            <input type="text" autocomplete="off" id="actual-subject-update" name="actual-subject-update" required />
            <label for="">Section: </label>
            <input type="text" autocomplete="off" id="actual-section-update" name="actual-section-update" required />
            <label for="">Subject ID: </label>
            <input type="text" autocomplete="off" id="actual-subjectID-update" name="actual-subjectID-update" required />
            <label for="">Number of Students: </label>
            <input
              type="number"
              id="no-studs-edit" autocomplete="off" name="no-studs-edit"
              onchange="noStudsedit()"
              required
            />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select
                name="time-from-ac-edit"
                id="time-from-ac-edit"
                onchange="calacedit()"
              >
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select
                name="time-to-ac-edit"
                id="time-to-ac-edit"
                onchange="calacedit()"
              >
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Room: </label>
            <input type="text" autocomplete="off" id="actual-room-update" name="actual-room-update" required />
            <label for="">Hours: </label>
            <input
              type="text"
              id="ac-hours-edit"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text"
              id="ac-hours-edit-put" name="ac-hours-edit-put"
              style="cursor: not-allowed; display: none;"
              required
            />
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="actual-update">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--Modal Delete for Actual Teaching Load-->
      <div class="modal-container" id="acdel01">
        <br /><br />
        <br /><br />
        <br /><br />
        <div class="modal-content">
          <form action="./mysql/tue/del-actual.php" method="POST">
            <h2><span class="fas fa-exclamation"></span> Message From ATL:</h2>
            <br />
            <p>Schedule will remove permanently.</p>
            <input type="text" id="actual-to-delete" name="actual-sched-id" hidden>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="actual-delete">
                <span class="fas fa-check"></span> Remove
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--overload-->
      <div class="actual-teaching" id="show-overload">
        <div class="head-opt">
          <h3 id="ac-tag">Overload</h3>
          <div class="point-1"><span class="fas fa-arrow-left"></span></div>
          <span
            id="add-sd"
            class="fas fa-plus-circle"
            onclick="openOL()"
          ></span>
        </div>
        <div class="scroll">
          <table id="ac-tbl" border="1">
            <tr>
              <th>Subject/Section</th>
              <th>Number of Students</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
              <th colspan="2">Action</th>
            </tr>
            <?php          
              //view
              $sqlOverload = "SELECT * FROM overload WHERE faculty_id_fk = $facultyID AND sched_day = 'TUE'";

              $myDataOverload = mysqli_query($mysqli,$sqlOverload);
              while($record = mysqli_fetch_array($myDataOverload)) {
                $sido = $record['sched_id'];
                $ssubjecto = $record['sched_subject'];
                $ssectiono = $record['sched_section'];
                $ssubjectoid = $record['sched_subject_id'];
                $sstudentso = $record['sched_no_students'];
                $stimeo = $record['sched_time'];
                $sroomo = $record['sched_room'];
                $shourso = $record['sched_hours'];
                $sfrom = $record['time_from'];
                $sto = $record['time_to'];
                for($a = $sfrom; $a < $sto; $a+=0.5) {
                    $conflict[$conflictCount] = $a;
                    $conflictCount++;
                }
            ?>
            <tr>
              <td><?php echo $ssubjecto . ' - ' . $ssectiono . ' (' . $ssubjectoid . ')'?></td>
              <td><?php echo $sstudentso ?></td>
              <td><?php echo $stimeo ?></td>
              <td><?php echo $sroomo ?></td>
              <td><?php echo $shourso ?></td>
              <td>
                <button type="button" id="edit" onclick="oleditsched('<?php echo $sido ?>','<?php echo $ssubjecto ?>','<?php echo $ssectiono ?>','<?php echo $ssubjectoid ?>','<?php echo $sstudentso ?>','<?php echo $sroomo ?>')">
                  Edit
                </button>
              </td>
              <td>
                <button type="button" id="del" onclick="oldelsched('<?php echo $sido ?>')">
                  Delete
                </button>
              </td>
            </tr>
            <?php 
              }
            ?>
          </table>
        </div>
      </div>

      <!--modal-->
      <div class="modal-container" id="ol01">
        <div class="modal-content">
          <form action="./mysql/tue/add-overload.php" method="POST">
            <h2><span class="far fa-calendar"></span> Overload</h2>
            <input type="text" value="<?php echo $facultyID ?>" name="overload-id-o" hidden>
            <input type="text" value="TUE" name="overload-day" hidden>
            <br />
            <p>Add your new schedule for tuesday.</p>
            <br />
            <label for="">Subject Code: </label>
            <input type="text" autocomplete="off" name="overload-subject" required />
            <label for="">Section: </label>
            <input type="text" autocomplete="off" name="overload-section" required />
            <label for="">Subject ID: </label>
            <input type="text" autocomplete="off" name="overload-subject-id" required />
            <label for="">Number of Students: </label>
            <input
              type="number"
              id="no-studs-ol" name="overload-students" autocomplete="off"
              onchange="noStudsOl()"
              required
            />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select name="overload-from-time" id="time-from-ol" onchange="calol()">
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select name="overload-to-time" id="time-to-ol" onchange="calol()">
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Room: </label>
            <input type="text" name="overload-room" autocomplete="off" required />
            <label for="">Hours: </label>
            <input
              type="text"
              id="ol-hours"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text"
              id="ol-hours-put" name="overload-hours-put"
              style="cursor: not-allowed; display: none;"
              required
            />
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="overload-submit">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--Modal Edit for OL -->

      <div class="modal-container" id="oledit01">
        <div class="modal-content">
          <form action="./mysql/tue/update-overload.php" method="POST">
            <h2><span class="far fa-calendar"></span> Overload</h2>
            <br />
            <p>Update your new schedule for tuesday.</p>
            <br />
            <input type="text" id="overload-to-update" name="overload-schedid-update" hidden>
            <input type="text" value="TUE" name="overload-day-update" hidden>

            <label for="">Subject Code: </label>
            <input type="text" autocomplete="off" id="overload-subject-update" name="overload-subject-update" required />
            <label for="">Section: </label>
            <input type="text" autocomplete="off" id="overload-section-update" name="overload-section-update" required />
            <label for="">Subject ID: </label>
            <input type="text" autocomplete="off" id="overload-subjectID-update" name="overload-subjectID-update" required />
            <label for="">Number of Students: </label>
            <input
              type="number" autocomplete="off"
              id="no-studs-ol-edit" name="no-studs-ol-edit"
              onchange="noStudsOledit()"
              required
            />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select
                name="time-from-ol-edit"
                id="time-from-ol-edit"
                onchange="caloledit()"
              >
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select
                name="time-to-ol-edit"
                id="time-to-ol-edit"
                onchange="caloledit()"
              >
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Room: </label>
            <input type="text" autocomplete="off" id="overload-room-update" name="overload-room-update" required />
            <label for="">Hours: </label>
            <input
              type="text"
              id="ol-hours-edit"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text"
              id="ol-hours-edit-put" name="ol-hours-edit-put"
              style="cursor: not-allowed; display: none;"
              required
            />
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="overload-update">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--Modal Delete for OL-->
      <div class="modal-container" id="oldel01">
        <br /><br />
        <br /><br />
        <br /><br />
        <div class="modal-content">
          <form action="./mysql/tue/del-overload.php" method="POST">
            <h2><span class="fas fa-exclamation"></span> Message from OL:</h2>
            <br />
            <input type="text" id="overload-to-delete" name="overload-sched-id" hidden>
            <p>Schedule will remove permanently.</p>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="overload-delete">
                <span class="fas fa-check"></span> Remove
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--quasi-->
      <div class="actual-teaching" id="show-quasi">
        <div class="head-opt">
          <h3 id="ac-tag">Quasi Teaching/Others</h3>
          <div class="point-2"><span class="fas fa-arrow-left"></span></div>
          <span
            id="add-sd"
            class="fas fa-plus-circle"
            onclick="openQuasi()"
          ></span>
        </div>
        <div class="scroll">
          <table id="ac-tbl" border="1">
            <tr>
              <th>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </th>
              <th>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </th>
              <th>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </th>
              <th>Activity</th>
              <th>Time</th>
              <th>Room</th>
              <th>Hours</th>
              <th colspan="2">Action</th>
            </tr>
            <?php          
              //view
              $sqlQuasi = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $facultyID AND quasi_day = 'TUE'";

              $myDataQuasi = mysqli_query($mysqli,$sqlQuasi);
              while($record = mysqli_fetch_array($myDataQuasi)) {
                $sidq = $record['quasi_id'];
                $scategoryq = $record['quasi_category'];
                $sdayq = $record['quasi_day'];
                $sactivityq = $record['quasi_activity'];
                $stimeq = $record['quasi_time'];
                $sroomq = $record['quasi_room'];
                $shoursq = $record['quasi_hours'];
                $sfrom = $record['time_from'];
                $sto = $record['time_to'];
                for($a = $sfrom; $a < $sto; $a+=0.5) {
                    $conflict[$conflictCount] = $a;
                    $conflictCount++;
                }
            ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><?php echo $sactivityq ?></td>
              <td><?php echo $stimeq ?></td>
              <td><?php echo $sroomq ?></td>
              <td><?php echo $shoursq ?></td>
              <td>
                <button type="button" id="edit" onclick="quasieditsched(<?php echo $sidq ?>,'<?php echo $sactivityq ?>','<?php echo $sroomq ?>')">
                  Edit
                </button>
              </td>
              <td>
                <button type="button" id="del" onclick="quasidelsched(<?php echo $sidq ?>)">
                  Delete
                </button>
              </td>
            </tr>
            <?php
              }
            ?>
          </table>
        </div>
      </div>

      <!--modal-->
      <div class="modal-container" id="quasi01">
        <div class="modal-content">
          <form action="./mysql/tue/add-quasi.php" method="POST">
              <input type="text" value="<?php echo $facultyID ?>" name="faculty-id-quasi" hidden>
              <input type="text" value="TUE" name="quasi-day" hidden>
            <h2><span class="far fa-calendar"></span> Quasi Teaching Load</h2>
            <br />
            <p>
              Others (Research, Attendance to meetings, Preparation of IDP, DTR,
              PES and other reports)
            </p>
            <br />
            <label for="">Category: </label>
            <select name="quasi-category" id="">
              <option value="Research, Extension or Production">Research, Extension or Production</option>
              <option value="Administrative Function">Administrative Function</option>
              <option value="Quality Assurance">Quality Assurance</option>
              <option value="Quasi Teaching">Quasi Teaching</option>
              <option value="Lesson Preparation">Lesson Preparation</option>
              <option value="Others">Others</option>
            </select>
            <label for="">Activity: </label>
            <input
              type="text"
              id="activity" autocomplete="off" name="quasi-activity"
              placeholder="Reasearch, Extension, Production, -Others Specify-"
              required
            />
            <label for="">Room: </label>
            <input type="text" id="room" autocomplete="off" name="quasi-room" required />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select name="time-from-qua" id="time-from-qua" onchange="calq()">
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select name="time-to-qua" id="time-to-qua" onchange="calq()">
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Hours: </label>
            <input
              type="text"
              id="qua-hours"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text"
              id="qua-hours-put" name="quasi-hours"
              style="cursor: not-allowed; display: none;"
              required
            />
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="quasi-submit">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--Modal Edit for Quasi-->
      <div class="modal-container" id="quaedit01">
        <div class="modal-content">
          <form action="./mysql/tue/update-quasi.php" method="POST">
            <h2><span class="far fa-calendar"></span> Quasi Teaching Load</h2>
            <input type="text" value="<?php echo $facultyID ?>" name="faculty-id-quasi-update" hidden>
            <input type="text" value="TUE" name="quasi-day-update" hidden>
            <input type="text" id="quasi-to-update" name="quasi-to-update" hidden>
            <br />
            <p>
              Others (Research, Attendance to meetings, Preparation of IDP, DTR,
              PES and other reports)
            </p>
            <br />
            <label for="">Category: </label>
            <select name="quasi-category-update" id="quasi-category-update">
              <option value="Research, Extension or Production">Research, Extension or Production</option>
              <option value="Administrative Function">Administrative Function</option>
              <option value="Quality Assurance">Quality Assurance</option>
              <option value="Quasi Teaching">Quasi Teaching</option>
              <option value="Lesson Preparation">Lesson Preparation</option>
              <option value="Others">Others</option>
            </select>
            <label for="">Activity: </label>
            <input
              type="text"
              id="activity-edit" name="activity-edit" autocomplete="off"
              placeholder="Reasearch, Extension, Production, -Others Specify-"
              required
            />
            <label for="">Room: </label>
            <input type="text" id="room-edit" name="room-edit" autocomplete="off" required />
            <label for="">Time: </label>
            <div class="time-gap">
              <p>From:</p>
              <select
                name="time-from-qua-edit"
                id="time-from-qua-edit"
                onchange="calqedit()"
              >
                <option value="7.0">7:00 AM</option>
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
              </select>
              <p>To:</p>
              <select
                name="time-to-qua-edit"
                id="time-to-qua-edit"
                onchange="calqedit()"
              >
                <option value="7.5">7:30 AM</option>
                <option value="8.0">8:00 AM</option>
                <option value="8.5">8:30 AM</option>
                <option value="9.0">9:00 AM</option>
                <option value="9.5">9:30 AM</option>
                <option value="10.0">10:00 AM</option>
                <option value="10.5">10:30 AM</option>
                <option value="11.0">11:00 AM</option>
                <option value="11.5">11:30 AM</option>
                <option value="12.0">12:00 PM</option>
                <option value="12.5">12:30 PM</option>
                <option value="13.0">1:00 PM</option>
                <option value="13.5">1:30 PM</option>
                <option value="14.0">2:00 PM</option>
                <option value="14.5">2:30 PM</option>
                <option value="15.0">3:00 PM</option>
                <option value="15.5">3:30 PM</option>
                <option value="16.0">4:00 PM</option>
                <option value="16.5">4:30 PM</option>
                <option value="17.0">5:00 PM</option>
                <option value="17.5">5:30 PM</option>
                <option value="18.0">6:00 PM</option>
                <option value="18.5">6:30 PM</option>
                <option value="19.0">7:00 PM</option>
                <option value="19.5">7:30 PM</option>
                <option value="20.0">8:00 PM</option>
                <option value="20.5">8:30 PM</option>
              </select>
            </div>
            <br />
            <label for="">Hours: </label>
            <input
              type="text"
              id="qua-hours-edit"
              style="cursor: not-allowed"
              disabled
            />
            <input
              type="text"
              id="qua-hours-edit-put" name="qua-hours-edit-put"
              style="cursor: not-allowed; display: none;"
              required
            />
            <div class="pro-button">
              <button type="reset" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="quasi-update">
                <span class="fas fa-check"></span> Save
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--Modal Delete for Quasi-->
      <div class="modal-container" id="quadel01">
        <br /><br />
        <br /><br />
        <br /><br />
        <div class="modal-content">
          <form action="./mysql/tue/del-quasi.php" method="POST">
            <h2>
              <span class="fas fa-exclamation"></span> Message from Quasi:
            </h2>
            <br />
            <input type="text" id="quasi-to-delete" name="quasi-sched-id" hidden>
            <p>Schedule will remove permanently.</p>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="quasi-delete">
                <span class="fas fa-check"></span> Remove
              </button>
            </div>
          </form>
        </div>
      </div>
      <?php
        $arrlength = count($conflict);
      ?>
    <script>
        //FOR ACTUAL TEACHING TIME CONFLICT CHECK
        var selectobjectAFrom = document.getElementById("time-from-ac");
        var selectobjectATo = document.getElementById("time-to-ac");
        var selectobjectAFromEdit = document.getElementById("time-from-ac-edit");
        var selectobjectAToEdit = document.getElementById("time-to-ac-edit");
        
        for (var i=0; i<selectobjectAFrom.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectAFrom.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectAFrom.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectATo.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectATo.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectATo.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectAFromEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectAFromEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectAFromEdit.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectAToEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectAToEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectAToEdit.remove(i);
            <?php
                }
            ?>
        }
        //FOR OVERLOAD TEACHING TIME CONFLICT CHECK
        var selectobjectOFrom = document.getElementById("time-from-ol");
        var selectobjectOTo = document.getElementById("time-to-ol");
        var selectobjectOFromEdit = document.getElementById("time-from-ol-edit");
        var selectobjectOToEdit = document.getElementById("time-to-ol-edit");
        
        for (var i=0; i<selectobjectOFrom.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectOFrom.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectOFrom.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectOTo.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectOTo.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectOTo.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectOFromEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectOFromEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectOFromEdit.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectOToEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectOToEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectOToEdit.remove(i);
            <?php
                }
            ?>
        }
        //FOR QUASI TEACHING TIME CONFLICT CHECK
        var selectobjectQFrom = document.getElementById("time-from-qua");
        var selectobjectQTo = document.getElementById("time-to-qua");
        var selectobjectQFromEdit = document.getElementById("time-from-qua-edit");
        var selectobjectQToEdit = document.getElementById("time-to-qua-edit");
        
        for (var i=0; i<selectobjectQFrom.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectQFrom.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectQFrom.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectQTo.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectQTo.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectQTo.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectQFromEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectQFromEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectQFromEdit.remove(i);
            <?php
                }
            ?>
        }
        for (var i=0; i<selectobjectQToEdit.length; i++) {
            <?php
                for($j=0; $j < $arrlength ; $j++) {
            ?>
                if (selectobjectQToEdit.options[i].value == <?php echo $conflict[$j] ?>)
                    selectobjectQToEdit.remove(i);
            <?php
                }
            ?>
        }
    </script>
    </main>
    <input type="text" value="<?php echo $ftype ?>" id="faculty-type" hidden>
    <script>
      //check for faculty type
      var factype = document.getElementById("faculty-type").value;

      if(factype === "Visiting Lecturer") {
        document.getElementById("show-actual").style.display = "none";
        document.getElementById("show-quasi").style.display = "none";
      } else {
        document.getElementById("show-actual").style.display = "block";
        document.getElementById("show-quasi").style.display = "block";
      }
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
      function aceditsched(a,b,c,bb,d,e) {
        document.getElementById("acedit01").style.display = "block";
        document.getElementById("actual-to-update").value = a;
        document.getElementById("actual-subject-update").value = b;
        document.getElementById("actual-section-update").value = c;
        document.getElementById("actual-subjectID-update").value = bb;
        document.getElementById("no-studs-edit").value = d;
        document.getElementById("actual-room-update").value = e;
      }
      function acdelsched(y) {
        document.getElementById("acdel01").style.display = "block";
        document.getElementById("actual-to-delete").value = y;
      }
      //function update and delete for OL
      function oleditsched(a,b,c,bb,d,e) {
        document.getElementById("oledit01").style.display = "block";
        document.getElementById("overload-to-update").value = a;
        document.getElementById("overload-subject-update").value = b;
        document.getElementById("overload-section-update").value = c;
        document.getElementById("overload-subjectID-update").value = bb;
        document.getElementById("no-studs-ol-edit").value = d;
        document.getElementById("overload-room-update").value = e;
      }
      function oldelsched(y) {
        document.getElementById("oldel01").style.display = "block";
        document.getElementById("overload-to-delete").value = y;
      }
      //function update and delete for Quasi

      function quasieditsched(a,b,c) {
        document.getElementById("quaedit01").style.display = "block";
        document.getElementById("quasi-to-update").value = a;
        document.getElementById("activity-edit").value = b;
        document.getElementById("room-edit").value = c;
      }
      function quasidelsched(y) {
        document.getElementById("quadel01").style.display = "block";
        document.getElementById("quasi-to-delete").value = y;
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
    </script>

    <!--Prevent duplicate hours-->
    <!--<script>
var txt = "";
var numbers = [8, 9, 10];
numbers.forEach(myFunction);
document.getElementById("demo").innerHTML = txt;

function myFunction(value, index, array) {
  txt = txt + value + "<br>"; 
}
</script>-->
  <?php
    mysqli_close($mysqli);
  ?>
  </body>
</html>
