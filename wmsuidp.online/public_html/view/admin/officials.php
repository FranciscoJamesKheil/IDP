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
        <p id="nav-hd">WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="./home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="./dashboard.php"
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="./registration.php"
          ><li><span class="far fa-user"></span>Faculty Member</li></a
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
        <div id="wmsu-vec">
          <img src="../font/assets/logo/wmsulogo.png" alt="" />
          <p>Western Mindanao State University Officials</p>
        </div>
      </div>

      <div class="off-container">
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
          <div class="official-member-view">
            <img id="icon-user" src="../font/assets/icon/userbw.png" alt="">
            <div class="official-details">
              <h3><?php echo $omi !="" ? $oln. ", " . $ofn . " " . $omi . "." : $oln . ", " . $ofn?> <?php echo $od !="" ? ", " . $od : ""?></h3>
              <p><?php echo $op ?></p>
            </div>
          </div>
        <?php 
          }
        ?>
      </div>
        <div class="official-member">
          <img id="icon-user" src="../font/assets/icon/A.png" alt="">
          <div class="official-details">
            <h3>Administrative Officials</h3>
            <br>
            <p onclick="window.open('https://wmsu.edu.ph/administrative-officials/')" style="cursor: pointer; text-decoration: underline;">Visit WMSU Administrative Officials</p>
          </div>
        </div>
        <div class="official-member">
          <img id="icon-user" src="../font/assets/icon/M.png" alt="">
          <div class="official-details">
            <h3>Mission</h3>
            <br>
            <p>The Western Mindanao State University, set in a culturally diverse environment, shall pursue a vibrant socio-economic agenda that include:
              <br/><br/>• A relevant instruction paradigm in the education and training of competent and responsive human resource for societal and industry needs;
              <br/>• A home for intellectual formation that generates knowledge for people empowerment, social transformation and sustainable development; and,
              <br/>• A hub where science, technology and innovation flourish, enriched by the wisdom of the Arts and Letters, and Philosophy.
            </p>
          </div>
        </div>
        <div class="official-member">
          <img id="icon-user" src="../font/assets/icon/V.png" alt="">
          <div class="official-details">
            <h3>Vision</h3>
            <br>
            <p>The University of Choice for higher learning with strong research orientation that produces professionals who are socially responsive to and responsible for human development; ecological sustainability; and, peace and security within and beyond the region</p>
          </div>
        </div>
        <div class="official-member">
          <img id="icon-user" src="../font/assets/icon/Ma.png" alt="">
          <div class="official-details">
            <h3>Mandate</h3>
            <br>
            <p>The creation of the Western Mindanao State University on June 10, 1987 outlined its basic mission: </p>
            <b>“…serve as an instrument for the promotion of socio-economic advancement of the various cultural communities inhabiting therein,”</b>
            <p>While P.D. 1427, which legitimitized its creation, embodied the above mission and defined its role in Western Mindanao, it simply echoed the same mission that saw establishment of the Zamboanga Normal School sixty years earlier. The institution which started as a teacher training school in 1918 by the Department of Mindanao and Sulu was to serve the educational needs of the diverse cultural communities of the southern Philippine provinces.</p>
            <p>The Western Mindanao State University today stands with the mandate of serving as a flagship educational institution and increasing the access to quality education to a wider number of people in a more pluralistic social, economic and cultural setting. It is further advance the philosophy that education remains to be the most potent tool for change in the process of socio-economic development and shall serve as a lead institution in the promotion of the same.</p>
            <p>In strengthening its basic mandate of democratizing equal access to the basic right of education, R.A. 8292 further mandates the university:</p>
            <b>“…to absorb non-chartered tertiary institutions within their respective provinces in coordination with the CHED and in consultation with the Department of Budget and Management, and offer them needed programs or courses, to promote and carry out equal access to educational opportunities mandated by the constitution.”</b>
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
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
