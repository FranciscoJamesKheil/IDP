<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
  $detect = "SELECT * FROM users WHERE user_username = '$access'";
  $detectID = mysqli_query($mysqli, $detect);
  while($row = mysqli_fetch_array($detectID)) {
    $detectedID = $row['college_id_fk'];
  }
  //view
  $sql = "SELECT * FROM college INNER JOIN dean ON college_id = college_id_fk WHERE college_id_fk = $detectedID";

  $myData = mysqli_query($mysqli,$sql);
  while($record = mysqli_fetch_array($myData)) { 
    $clogo = $record['college_logo'];
    $cname = $record['college_name'];
    $dcreated = $record['date_created'];
    $fn = $record['dean_firstname'];
    $ln = $record['dean_lastname'];
    $mi = $record['dean_mi'];
    $deanimg = $record['dean_profile_img'];
    $position = $record['dean_position'];
    $degree = $record['dean_degree'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Profile</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/profile.css" />
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
        <p id="page-title">Profile</p>
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
            <p class="fas fa-user-circle"></p>
            <div class="dropdown-content-nav">
              <span
                ><a class="active" href="./profile.php" id="slide-profile"
                  ><p class="fas fa-user-cog"></p>
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

      <section>
        <ul>
          <a href="./profile.php">
            <li>Account Settings</li>
          </a>
          <a href="./college.php" id="link-active">
            <li>College Details</li>
          </a>
        </ul>
      </section>
      <div class="main">
        <div class="content">
          <div class="pro-detail">
            <img
              src="<?php echo $clogo!=NULL? '../general/mysql/registration/images/'.$clogo : '../font/assets/logo/wmsulogo.png'?>"
              id="uicon"
              alt="college-logo"
            />
          </div>
          <div class="details">
            <p id="label-header">
              Basic Information
            </p>
            <p>College Name: <b id="capitalize"><?php echo $cname ?></b></p>
            <p>Date Created: <b><?php echo $dcreated ?></b></p>
          </div>
          <div class="details">
            <p id="label-header">
              College Dean
            </p>
            <div class="dean-div-img">
              <img src="<?php echo $deanimg!=NULL? '../admin/mysql/college/images/'.$deanimg : '../font/assets/icon/user.png'?>" id="dean-profile" alt="">
            </div>
            <p>Name: <b id="capitalize"><?php echo $mi != NULL ? $fn . ' ' . $mi . '. ' . $ln . ', ' . $degree : $fn . ' ' . $ln . ', ' . $degree ?></b></p>
            <p>Position: <b id="capitalize"><?php echo $position ?></b></p>
          </div>
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
  </body>
</html>
