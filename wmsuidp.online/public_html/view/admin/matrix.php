<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Matrix</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/matrix.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
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
        <p id="page-title">Matrix</p>
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
                ><a href="./registration.php" id="slide-faculty"
                  ><p class="far fa-user"></p>
                  Faculty Member</a
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
                ><a class="active" href="./matrix.php" id="slide-matrix"
                  ><p class="fas fa-cogs"></p>
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
          ><li>
            <span class="far fa-tachometer-alt"></span>Dashboard
          </li></a
        >
        <a href="./registration.php"
          ><li><span class="far fa-user"></span>Faculty Member</li></a
        >
        <a href="./matrix.php"
          ><li class="active-sn"><span class="fas fa-cogs"></span>Matrix</li></a
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

      <div class="main">
        <img src="../font/assets/vector/3569142.jpg" id="main-vector" alt="" />
        <div class="matrix-para">
          <h2>Criteria for Faculty Evaluation</h2>
          <br>
          <p>Quality Assurance refers to the individual involvement of faculty in</p>
          <ol type="a">
            <li>Curriculum Revision</li>
            <li>Syllabi Enhancement</li>
            <li>Involvement in Program Accreditation</li>
          </ol>
          <p>Quasi Teaching refers to student consultation or advising</p>
          <p>Lesson Preparation refers to the lesson preparation, preparation of teaching materials and student evaluation</p>
          <p>Others refers to DTR preparation, reports, meetings and attendance to academic and social functions</p>
        </div>
        <div class="ani">
          <span id="aniclock" class="far fa-cog"></span>
          <span id="aniclock1" class="fas fa-cog"></span>
          <span id="aniclock" class="far fa-cog"></span>
        </div>
      </div>
      <section>
        <div class="table">
          <table border="1" class="tbl">
            <tr>
              <th colspan="7" id="header">Faculty with Designation</th>
            </tr>
            <tr id="color-header">
              <th rowspan="2">Release Time</th>
              <th colspan="2">Core Functions</th>
              <th>Strategic Functions</th>
              <th colspan="3">Support and Other Functions</th>
            </tr>
            <tr id="color-header">
              <td>Research, Extension or Production</td>
              <td>Admin Function</td>
              <td>Instruction</td>
              <td>Quasi**</td>
              <td>Lesson Preparation***</td>
              <td>Others****</td>
            </tr>
            <?php
                //view
                $sql = "SELECT * FROM wdesignation";

                $myData = mysqli_query($mysqli,$sql);
                while($record = mysqli_fetch_array($myData)) { 
                  $rt = $record['release_time'];
                  $rep = $record['research_ext_pro'];
                  $af = $record['admin_function'];
                  $i = $record['instruction'];
                  $q = $record['quasi'];
                  $lp = $record['lesson_prep'];
                  $o = $record['others'];
            ?>
            <tr id="color-even">
              <td><?php echo $rt>1 ? "$rt hours" : "$rt hour"?></td>
              <td><?php echo $rep>1 ? "$rep hours" : "$rep hour"?></td>
              <td><?php echo $af>1 ? "$af hours" : "$af hour"?></td>
              <td><?php echo $i>1 ? "$i hours" : "$i hour"?></td>
              <td><?php echo $q>1 ? "$q hours" : "$q hour"?></td>
              <td><?php echo $lp>1 ? "$lp hours" : "$lp hour"?></td>
              <td><?php echo $o>1 ? "$o hours" : "$o hour"?></td>
            </tr>
            <?php
                }
            ?>
          </table>
        </div>
      </section>
      <section>
        <div class="table">
          <table border="1" class="tbl">
            <tr>
              <th colspan="8" id="header">Faculty without Designation</th>
            </tr>
            <tr id="color-header">
              <th rowspan="2">Rank</th>
              <th colspan="3">Core Functions</th>
              <th>Strategic Functions</th>
              <th colspan="3">Support and Other Functions</th>
            </tr>
            <tr id="color-header">
              <th>Instruction</th>
              <td colspan="2">Research, Extension or Production</td>
              <td>Quality Assurance Process</td>
              <td>Quasi**</td>
              <td>Lesson Preparation***</td>
              <td>Others****</td>
            </tr>
            <tr>
              <?php 
                $result=mysqli_query($mysqli, "SELECT count(*) as total from wodesignation WHERE rank_type='IAAP'");
                $data=mysqli_fetch_assoc($result); 
              ?>
              <td rowspan="<?php echo $data['total']+1 ?>">Instructors or Assistant/ Associate Professor</td> <!--rowcount in database-->
              <?php
                //view
                $sqlIAAP = "SELECT * FROM wodesignation WHERE rank_type = 'IAAP'";
                
                $myDataIAAP = mysqli_query($mysqli,$sqlIAAP);
                while($record = mysqli_fetch_array($myDataIAAP)) { 
                  $iwo = $record['instruction'];
                  $repwo = $record['research_ext_pro'];
                  $qawo = $record['quality_assurance'];
                  $qwo = $record['quasi'];
                  $lpwo = $record['lesson_prep'];
                  $owo = $record['others'];
                  echo"<tr>";
              ?>
              <td><?php echo $iwo>1 ? "$iwo hours" : "$iwo hour"?></td>
              <td colspan="2"><?php echo $repwo>1 ? "$repwo hours" : "$repwo hour"?></td>
              <td><?php echo $qawo>1 ? "$qawo hours" : "$qawo hour"?></td>
              <td><?php echo $qwo>1 ? "$qwo hours" : "$qwo hour"?></td>
              <td><?php echo $lpwo>1 ? "$lpwo hours" : "$lpwo hour"?></td>
              <td><?php echo $owo>1 ? "$owo hours" : "$owo hour"?></td>
              <?php
                }
              ?>
            </tr>
            <tr>
              <?php 
                $result=mysqli_query($mysqli, "SELECT count(*) as total from wodesignation WHERE rank_type='Professors'");
                $data=mysqli_fetch_assoc($result); 
              ?>
              <td rowspan="<?php echo $data['total']+1 ?>">Professors</td> <!--rowcount in database-->
              
              <?php
                //view
                $sqlProf = "SELECT * FROM wodesignation WHERE rank_type = 'Professors'";
                
                $myDataProf = mysqli_query($mysqli,$sqlProf);
                while($record = mysqli_fetch_array($myDataProf)) { 
                  $iwo = $record['instruction'];
                  $repwo = $record['research_ext_pro'];
                  $epwo = $record['extension'];
                  $qawo = $record['quality_assurance'];
                  $qwo = $record['quasi'];
                  $lpwo = $record['lesson_prep'];
                  $owo = $record['others'];
                  echo"<tr>";
              ?>
              <td><?php echo $iwo>1 ? "$iwo hours" : "$iwo hour"?></td>
              <td colspan="2">Research: <?php echo $repwo>1 ? "$repwo hours" : "$repwo hour"?><br> Extension: <?php echo $epwo>1 ? "$epwo hours" : "$epwo hour"?></td>
              <td><?php echo $qawo>1 ? "$qawo hours" : "$qawo hour"?></td>
              <td><?php echo $qwo>1 ? "$qwo hours" : "$qwo hour"?></td>
              <td><?php echo $lpwo>1 ? "$lpwo hours" : "$lpwo hour"?></td>
              <td><?php echo $owo>1 ? "$owo hours" : "$owo hour"?></td>
              <?php
                }
              ?>
            </tr>
          </table>
        </div>
      </section>
      <footer>
        <p><img id="img-footer" src="../font/assets/logo/wmsulogo.png" alt="IDP">All Rights Reserved &copy 2021 WMSU IDP <img id="img-footer" src="../font/assets/logo/idplogo.png" alt="IDP"></p>
      </footer>
    </main>
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
