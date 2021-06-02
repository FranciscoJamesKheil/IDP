<?php
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
    
    session_start();
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../index.php");
      die();
    }
    $detectSQL = "SELECT * FROM users WHERE user_username = '$access'";
    $detectSave = mysqli_query($mysqli, $detectSQL);

    while($detectrow = mysqli_fetch_array($detectSave)) {
      $detectedID = $detectrow['user_id'];
      $collegeDetected = $detectrow['college_id_fk'];
    }
    //college
    $detectColSQL = "SELECT * FROM college WHERE college_id = '$collegeDetected'";
    $detectColSave = mysqli_query($mysqli, $detectColSQL);

    while($detectcol = mysqli_fetch_array($detectColSave)) {
      $colLogo = $detectcol['college_logo'];
      $colName = $detectcol['college_name'];
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
    //dean
    $sqlcollegeDean = "SELECT * FROM college INNER JOIN dean ON college_id = college_id_fk WHERE college_id_fk = $collegeDetected";

    $myDataCollegeDean = mysqli_query($mysqli,$sqlcollegeDean);
    while($deanrow = mysqli_fetch_array($myDataCollegeDean)) { 
      $clogo = $deanrow['college_logo'];
      $cname = $deanrow['college_name'];
      $dfn = $deanrow['dean_firstname'];
      $dln = $deanrow['dean_lastname'];
      $dmi = $deanrow['dean_mi'];
      $dposition = $deanrow['dean_position'];
      $ddegree = $deanrow['dean_degree'];
    }
    //officials
      $sqlOfficials = "SELECT * FROM officials";

      $myDataOfficials = mysqli_query($mysqli,$sqlOfficials);

    //for qrcode display
    $generated =$fmi !="" ? strtoupper($fln. ', ' . $ffn . ' ' . $fmi . './' . $cname):strtoupper($fln. ', ' . $ffn . '/' . $cname);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP - Generator</title>
    <link rel="icon" href="../../font/assets/logo/wmsu.ico" />
    <link rel="stylesheet" href="./print.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../../font/fontawesome/css/all.css" />
  </head>
  <body ondragstart="return false">
    <!--QR input-->
    <input type="text" id="content" value="<?php echo $generated ?>" hidden>
    <div class="code" id="code">
      <div class="panel" onclick="zoomOut()" title="Click to zoom-out">
        <!--QR Code Generator-->
        <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
            alt="QR CODE" class="qr-code" id="qrIDZoom" onclick="zoomIn()"/>
      </div>
    </div>
    <img class="elephant-animate" src="../../font/assets/vector/elephant.gif" alt="">
    <div id="printableTable">
      <header class="header">
        <div class="header-0">
          <table class="QTB">
            <tr>
              <th colspan="2">Quasi Teaching Breakdown</th>
            </tr>
            <tr>
              <td id="tbl-AC">ACTIVITY</td>
              <td style="font-weight: 600" id="tbl-right">HOURS</td>
            </tr>
            <tr>
              <td>RESEARCH/EXTENSION/PRODUCTION</td>
              <td id="tbl-right">6</td>
            </tr>
            <tr>
              <td>ADMINISTRATIVE FUNCTION</td>
              <td id="tbl-right">22</td>
            </tr>
            <tr>
              <td>QUASI</td>
              <td id="tbl-right">3</td>
            </tr>
            <tr>
              <td>LESSON PREPARATION</td>
              <td id="tbl-right">2</td>
            </tr>
            <tr>
              <td>OTHERS</td>
              <td id="tbl-right">1</td>
            </tr>
          </table>
        </div>
        <div class="header-1">
          <div class="header-1-1">
            <img src="../../font/assets/logo/wmsu.ico" alt="WMSU Logo" />
          </div>
          <div class="header-1-2">
            <section class="header-center-text">
              <p>WESTERN MINDANAO STATE UNIVERSITY</p>
              <p id="uppercase"><?php echo $colName ?></p>
              <p>Zamboanga City</p>
            </section>
            <section class="header-center-bold">
              <b>INDIVIDUAL DAILY PROGRAM</b>
              <p>1ST Semester, S.Y. 2020-2021</p>
            </section>
          </div>
          <div class="header-1-3">
            <img src="../../general/mysql/registration/images/<?php echo $colLogo ?>" alt="College Seal" />
          </div>
        </div>
        <div class="header-2">
          <table class="OO">
            <tr>
              <th colspan="2">OFFICIAL TIME</th>
              <th>OVERLOAD</th>
            </tr>
            <tr>
              <td>M</td>
              <td>8:00 - 12:00 / 1:00 - 5:00</td>
              <td>5:30 - 8:30</td>
            </tr>
            <tr>
              <td>T</td>
              <td>8:00 - 1:00 / 1:30 - 4:30</td>
              <td>-</td>
            </tr>
            <tr>
              <td>W</td>
              <td>8:00 - 1:00 / 1:30 - 4:30</td>
              <td>-</td>
            </tr>
            <tr>
              <td>TH</td>
              <td>8:00 - 1:00 / 1:30 - 4:30</td>
              <td>-</td>
            </tr>
            <tr>
              <td>F</td>
              <td>8:00 - 12:00 / 1:00 - 5:00</td>
              <td>-</td>
            </tr>
            <tr>
              <td>S</td>
              <td>FREE HALF/DAY</td>
              <td>1:30 - 4:30</td>
            </tr>
            <tr>
              <td>SU</td>
              <td></td>
              <td>-</td>
            </tr>
          </table>
        </div>
      </header>
      <main>
        <div class="user-details">
          <table class="tbl-user-details-left">
            <tr>
              <td>Name:</td>
              <td id="uppercase"><?php echo $fmi != NULL ? $fln . ', ' . $ffn . ' ' . $fmi . '. ': $fln . ', ' . $ffn ?></td>
            </tr>
            <tr>
              <td>Academic Rank:</td>
              <td id="uppercase"><?php echo $fr ?></td>
            </tr>
            <tr>
              <td>Designation:</td>
              <td id="uppercase"><?php echo $fd ?></td>
            </tr>
            <tr>
              <td>Release Time:</td>
              <td id="uppercase"><?php echo $frt ?></td>
            </tr>
          </table>
          <table class="tbl-user-details-right">
            <tr>
              <td>Educational Qualification:</td>
              <td id="uppercase"><?php echo $fq ?></td>
            </tr>
            <tr>
              <td>Major Assignment:</td>
              <td id="uppercase"><?php echo $fa ?></td>
            </tr>
          </table>
        </div>
        <br>
        <div class="schedule">
          <table
            border="1"
            style="border-collapse: collapse"
            class="tbl-schedule"
          >
            <tr>
              <th rowspan="3">DAY</th>
              <th colspan="10">CONTACT HOURS</th>
              <th colspan="4" rowspan="2">QUASI TEACHING/OTHERS</th>
              <th rowspan="3">TOTAL DAILY HOURS</th>
            </tr>
            <tr>
              <th colspan="5">ACTUAL TEACHING LOAD</th>
              <th colspan="5">OVERLOAD</th>
            </tr>
            <tr>
              <td colspan="5">
                <table id="tbl-sched-display">
                  <tr>
                    <td>SUBJECT</td>
                    <td>NO. OF STUDS</td>
                    <td id="tdwidth">TIME</td>
                    <td>ROOM</td>
                    <td>HRS</td>
                  </tr>
                </table>
              </td>
              <td colspan="5">
                <table id="tbl-sched-display">
                  <tr>
                    <td>SUBJECT</td>
                    <td>NO. OF STUDS</td>
                    <td id="tdwidth">TIME</td>
                    <td>ROOM</td>
                    <td>HRS</td>
                  </tr>
                </table>
              </td>
              <td colspan="4">
                <table id="tbl-sched-display">
                  <tr>
                    <td>ACTIVITIES</td>
                    <td id="tdwidth">TIME</td>
                    <td>ROOM</td>
                    <td>HRS</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr id="lightor">
              <td id="midDay">MON</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;

                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'MON'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'MON'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--TUESDAY-->
            <tr id="lightor">
              <td id="midDay">TUE</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;

                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'TUE'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'TUE'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--WEDNESDAY-->
            <tr id="lightor">
              <td id="midDay">WED</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;
                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'WED'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'WED'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--THURSDAY-->
            <tr id="lightor">
              <td id="midDay">THU</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;

                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'THU'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'THU'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--FRIDAY-->
            <tr id="lightor">
              <td id="midDay">FRI</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;

                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'FRI'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'FRI'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--SATURDAY-->
            <tr id="lightor">
              <td id="midDay">SAT</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;

                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SAT'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'SAT'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--SUNDAY-->
            <tr id="lightor">
              <td id="midDay">SUN</td>
              <!--Actual-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    //total daily hour
                    $totalPerDay = 0;
                    $sqlDay = "SELECT * FROM actualteachingload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Overload-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM overload WHERE faculty_id_fk = $faculty_ID AND sched_day = 'SUN'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $ssm = $row['sched_subject'];
                      $ssm1 = $row['sched_section'];
                      $ssm2 = $row['sched_subject_id'];
                      $sns = $row['sched_no_students'];
                      $stm = $row['sched_time'];
                      $srm = $row['sched_room'];
                      $shm = $row['sched_hours'];
                  ?>
                  <tr>
                    <td><?php echo $ssm . ' - ' . $ssm1 . ' (' . $ssm2 . ')'?></td>
                    <td><?php echo $sns ?></td>
                    <td id="tdwidth"><?php echo $stm ?></td>
                    <td><?php echo $srm ?></td>
                    <td><?php echo $shm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $shm;
                    }
                  ?>
                </table>
              </td>
              <!--Quasi-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <?php
                    $sqlDay = "SELECT * FROM quasiteachingload WHERE faculty_id_fk = $faculty_ID AND quasi_day = 'SUN'";

                    $myDataDay = mysqli_query($mysqli,$sqlDay);
                    while($row = mysqli_fetch_array($myDataDay)) { 
                      $qam = $row['quasi_activity'];
                      $qtm = $row['quasi_time'];
                      $qhm = $row['quasi_hours'];
                      $qrm = $row['quasi_room'];
                  ?>
                  <tr>
                    <td><?php echo $qam ?></td>
                    <td id="tdwidth"><?php echo $qtm ?></td>
                    <td><?php echo $qrm ?></td>
                    <td><?php echo $qhm ?></td>
                  </tr>
                  <?php
                    $totalPerDay += $qhm;
                    }
                  ?>
                </table>
              </td>
              <td id="midDay"><?php echo $totalPerDay ?></td>
            </tr>
            <!--END QUASI-->
            <!--Over all-->
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
            <tr>
              <td>***</td>
              <!--Actual total-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <tr>
                    <td style="border: 1px solid white">No. of Course: <?php echo $totalSubjects ?></td>
                    <td style="border: 1px solid white"></td>
                    <td id="tdwidth"></td>
                    <td>TOTAL</td>
                    <td><?php echo $actualsum ?></td>
                  </tr>
                </table>
              </td>
              <!--Overload total-->
              <td colspan="5">
                <table id="tbl-sched-display">
                  <tr>
                    <td style="border: 1px solid white"></td>
                    <td style="border: 1px solid white"></td>
                    <td id="tdwidth"></td>
                    <td>TOTAL</td>
                    <td><?php echo $overloadsum ?></td>
                  </tr>
                </table>
              </td>
              <!--Quasi total-->
              <td colspan="4">
                <table id="tbl-sched-display">
                  <tr>
                    <td style="border: 1px solid white"></td>
                    <td id="tdwidth"></td>
                    <td>TOTAL</td>
                    <td><?php echo $quasisum ?></td>
                  </tr>
                </table>
              </td>
              <!--Grand Total-->
              <td><b><?php echo $total_hours ?></b></td>
            </tr>
          </table>
        </div>
      </main>
      <footer>
        <table class="officials">
          <tr>
            <td>Prepared by:</td>
            <td>Recommending Approval:</td>
            <td colspan="2">Approved by:</td>
          </tr>
          <tr>
            <th id="uppercase"><?php echo $fmi != NULL ? $ffn . ' ' . $fmi . '. ' . $fln : $ffn . ' ' . $fln ?>
              <hr />
              <?php echo $fr ?>
            </th>
            <th id="uppercase">
              <?php echo $dmi != NULL ? $dfn . ' ' . $dmi . '. ' . $dln : $dfn . ' ' . $dln ?>
              <hr />
              DEAN
            </th>
            <?php
              while($record = mysqli_fetch_array($myDataOfficials)) { 
                $oid = $record['officials_id'];
                $ofn = $record['officials_firstname'];
                $oln = $record['officials_lastname'];
                $omi = $record['officials_mi'];
                $op = $record['officials_position'];
                $od = $record['officials_degree'];
            ?>
            <th id="uppercase">
              <?php echo $omi !="" ? $ofn. " " . $omi . ". " . $oln : $ofn . " " . $oln ?> <?php echo $od !="" ? ", " . $od : ""?>
              <hr />
              <?php echo $op ?>
            </th>
            <?php
              }
            ?>
            <th style="background: violet">
              <!--QR Code Generator-->
              <img
                src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
                alt="QR CODE" id="qrID" class="qr-code" onclick="zoomIn()" title="Click to zoom-in"
              />
            </th>
          </tr>
        </table>
      </footer>
    </div>
    <button title="Print IDP" onclick="printDiv();" id="btn-print">
      Print
    </button>
    <button title="Back to Schedule" onclick="window.close()" id="idp-back">
      Close
    </button>
    <iframe
      name="print_frame"
      width="0"
      height="0"
      frameborder="0"
      src="about:blank"
      hidden="true"
    ></iframe>
    
    <!--SCRIPT FOR PRINTING-->
    <script src="../../font/jQuery/jquery-3.5.1.min.js"></script>
    <script src="./app.js"></script>
  </body>
</html>
