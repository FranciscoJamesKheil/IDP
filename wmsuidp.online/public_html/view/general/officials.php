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
    <title>IDP Generator | Officials</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/officials.css" />
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
        <p id="page-title">WMSU Officials</p>
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
                ><a class="active" href="./officials.php" id="slide-officials"
                  ><p class="fas fa-users"></p>
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
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="./registration.php"
          ><li><span class="far fa-pen"></span>Registration</li></a
        >
        <a href="./matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="./officials.php"
          ><li class="active-sn">
            <span class="fas fa-users"></span>University Officials
          </li></a
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
        <div class="main">
          <div id="wmsu-vec">
            <img src="../font/assets/logo/wmsulogo.png" alt="" />
            <p>Western Mindanao State University Officials</p>
          </div>
        </div>
      </div>
      <section>
        <div class="register">
          <h3>WMSU OFFICIALS</h3>
          <br>
          <p>Update President and Vice-President of the Western Mindanao State University Officials.</p>
        </div>
        <div class="record">
          <table border="1">
            <tr>
              <th colspan="6" id="tag">RECORD</th>
            </tr>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Position</th>
              <th>Degree</th>
              <th>Action</th>
            </tr>
              <?php
                //view
                $sql = "SELECT * FROM officials";
                $countofficial = 0;

                $myData = mysqli_query($mysqli,$sql);
                while($record = mysqli_fetch_array($myData)) { 
                  $countofficial++;
                  $oid = $record['officials_id'];
                  $ofn = $record['officials_firstname'];
                  $oln = $record['officials_lastname'];
                  $omi = $record['officials_mi'];
                  $op = $record['officials_position'];
                  $od = $record['officials_degree'];
              ?>
            <tr>
              <td><?php echo $countofficial ?></td>
              <td id="capitalize"><?php echo $oln != "" ? $oln : "-" ?>, <?php echo $ofn != "" ? $ofn: "-" ?> <?php echo $omi!=""? $omi.".": $omi?></td>
              <td id="uppercase"><?php echo $op !="" ? $op : "-" ?></td>
              <td id="capitalize"><?php echo $od !="" ? $od : "-" ?></td>
              <td id="tbl-btn">
                <a href="./stylesheet/pop/officials/edit-off.php?GetID=<?php echo $oid; ?>"
                  ><button type="button" title="Update Data" id="btn-edit"><span class="far fa-pen"></span></button></a
                >
              </td>
            </tr>
            <?php 
              } 
              ?>
          </table>
        </div>
      </section>
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
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
