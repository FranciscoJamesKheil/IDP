<?php 
  session_start();

  $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }

  $myAccount = "SELECT * FROM users WHERE user_username = '$access';";
  $myData = mysqli_query($link,$myAccount);
  
  while($record = mysqli_fetch_array($myData)) { 
    $name = $record['user_name'];
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
                ><a href="./registration.php" id="slide-registration"
                  ><p class="far fa-pen"></p>
                  Registration</a
                ></span
              >
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
        <p>WMSU IDP Generator</p>
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
          ><li><span class="far fa-pen"></span>Registration</li></a
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
      
      <div class="main">
        <div class="welcome">
          <div class="legend">
            <div class="lgnd">
              <b>PROFILE</b>
              <p style="text-transform: capitalize;"><span class="fas fa-user-circle"></span> <?php echo $name ?></p>
              <p><span class="fas fa-folder"></span> Individual Daily Program</p>
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
            <p class="fas fa-down">R</p>
            <div class="icon" id="ico1"></div>
          </div>
          <div class="out-icon">
            <p class="fas fa-down">M</p>
            <div class="icon" id="ico2"></div>
          </div>
          <div class="out-icon">
            <p class="fas fa-down">O</p>
            <div class="icon" id="ico3"></div>
          </div>
        </div>
      </div>
      <div class="section-content">
        <!--dashboard-->
        <section>
          <div class="content" id="content">
            <div class="img" id="icoco1">
              <span class="far fa-pen"></span>
            </div>
            <div class="description">
              <h4>Registration</h4>
              <p>
                Under registration, hereby the General admin is granted the
                permission to add and update colleges of it's choice. Seal, dean
                and more requisite information College is added.
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
              <span class="far fa-cogs"></span>
            </div>
            <div class="description">
              <h4>Matrix</h4>
              <p>
                In matrix, hereby the General admin is granted the permission to
                create, read, update and delete Faculty Evaluation of with
                designation and without designation.
              </p>
            </div>
            <div class="btn">
              <a href="./matrix.php">
                <button><span class="fas fa-cogs"></span> See More</button>
              </a>
            </div>
          </div>
          <div class="content" id="content2">
            <div class="img" id="icoco3">
              <span class="far fa-users"></span>
            </div>
            <div class="description">
              <h4>Officials</h4>
              <p>
                The final verdict of IDP comes with officials. The General admin
                hereby is granted the permission to add or update officials
                which roles are important to officially grant the workloads.
              </p>
            </div>
            <div class="btn">
              <a href="./officials.php">
                <button><span class="fas fa-users"></span> See More</button>
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
    <?php
      mysqli_close($link);
    ?>
  </body>
</html>
