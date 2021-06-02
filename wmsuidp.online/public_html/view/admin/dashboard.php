<?php
  $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }

  $myAccount = "SELECT * FROM users WHERE user_username = '$access';";
  $myData = mysqli_query($link,$myAccount);
  
  while($record = mysqli_fetch_array($myData)) { 
    $collegeID = $record['college_id_fk'];
    $name = $record['user_name'];
    $dpi = $record['user_profile_pic'];
  }
  $myCollege = "SELECT * FROM college WHERE college_id = $collegeID;";
  $myDataCollege = mysqli_query($link,$myCollege);
  
  while($row = mysqli_fetch_array($myDataCollege)) { 
    $collegeName = $row['college_name'];
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
    <link rel="stylesheet" href="./stylesheet/content/view-image.css" />
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
        <a href="./registration.php"
          ><li><span class="far fa-user"></span>Faculty Member</li></a
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
      <!--View Profile Image-->
      <div id="notif">
        <div id="container-error">
          <div class="con-view" id="con-view">
            <img src=<?php echo $dpi != NULL ? "./mysql/profile/images/". $dpi : "../font/assets/icon/userbw.png" ?> alt="" id="uicon1">
            <h1 id="notifmes"><?php echo $name ?> </h1>
            <button type="button" id="btn-close-profile-view" onclick="viewProfClose()">Close</button>
          </div>
        </div>
      </div>
      <script>
        function viewProf() {
          document.getElementById("notif").style.display = "block";
          document.getElementById("admin-pic").style.width = "0";
          document.getElementById("admin-pic").style.height = "0";
        }
        function viewProfClose() {
          document.getElementById("notif").style.display = "none";
          document.getElementById("admin-pic").style.width = "4rem";
          document.getElementById("admin-pic").style.height = "4rem";
        }
      </script>
      <div class="main">
        <div class="welcome">
          <img onclick="viewProf()" title="Click to view profile picture." src=<?php echo $dpi != NULL ? "./mysql/profile/images/". $dpi : "../font/assets/icon/userbw.png" ?> alt="" id="admin-pic">
          <div class="legend">
            <div class="lgnd">
              <b>PROFILE</b>
              <p id="capitalize"><span class="fas fa-user-circle"></span> <?php echo $name ?> (Administrator)</p>
              <p id="capitalize"><span class="fas fa-graduation-cap"></span> <?php echo $collegeName ?></p>
              <p><span class="fas fa-university"></span> Western Mindanao State University</p>
            </div>
            <div class="time">
              <div
                id="clock"
                x-data="app()"
                x-init="startClock();updateClock();"
              >
                <p id="date" x-text="date">Loading...</p>
                <p id="time" x-text="time">00:00:00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="dash-icon">
          <div class="out-icon">
            <p class="fas fa-matrix">F</p>
            <div class="icon" id="ico1"></div>
          </div>
          <div class="out-icon">
            <p class="fas fa-matrix">C</p>
            <div class="icon" id="ico2"></div>
          </div>
        </div>
      </div>
      <div class="section-content">
        <!--dashboard-->
        <section>
          <div class="content" id="content">
            <div class="img" id="icoco1">
              <span class="far fa-users"></span>
            </div>
            <div class="description">
              <h4>Faculty Member</h4>
              <p>
                Under Faculty Member, hereby the admin is granted the permission
                to create, read, update and delete account of the faculty
                member.
              </p>
            </div>
            <div class="btn">
              <a href="./registration.php">
                <button><span class="fas fa-pen"></span> See More</button>
              </a>
            </div>
          </div>
          <div class="content" id="content1">
            <div class="img" id="icoco2">
              <span class="far fa-graduation-cap"></span>
            </div>
            <div class="description">
              <h4>College Profile</h4>
              <p>
                Under College Profile, hereby the admin is granted to update the
                College Administrator Details, College Information, Add and
                Update the Dean.
              </p>
            </div>
            <div class="btn">
              <a href="./college.php">
                <button><span class="fas fa-cogs"></span> See More</button>
              </a>
            </div>
          </div>
        </section>
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
    <script src="../font/jQuery/time.js"></script>
    <script src="./stylesheet/jQuery/time.js"></script>
  </body>
</html>
