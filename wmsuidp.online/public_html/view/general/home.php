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
    <title>IDP Generator | Homepage</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/home.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
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
        <p id="page-title">Home</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a class="active"  href="./home.php" id="slide-home">
            <p class="fas fa-home"></p>
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
          ><li class="active-sn"><span class="fas fa-home"></span>Home</li></a
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
      
      <!--Introduction of IDP-->
      <div class="idp-info">
        <div class="info-statement">
          <h1>Individual Daily Program</h1>
          <br />
          <p>
            The IDP is a schedule generator that is being re-equip, some
            exciting features and user friendly web-app. The new IDP Generator
            can now be operate online.
          </p>
        </div>
        <img id="computer-img" src="../font/assets/bg/res.png" alt="" />
      </div>

        <div class="knowledge">
          <table>
            <tr>
              <td id="left">
                <img src="../font/assets/icon/user-interface.png" alt="">
                <div class="state">
                  <b>What is User Interface (UI)? </b>
                  <br>
                  <p>A user interface, also called a "UI" or simply an "interface," is the means in which a person controls a software application or hardware device</p>
                </div>
              </td>
            </tr>
            <tr>
              <td id="right">
                <img src="../font/assets/icon/warning.png" alt="">
                <div class="state">
                  <b>Why is it some animation doesn't run in other browser? </b>
                  <p>The Individual Daily Program Sytem runs better in Google Chrome.</p>
                </div>
              </td>
            </tr>
            <tr>
              <td id="left">
                <img src="../font/assets/icon/chrome.png" alt="">
                <div class="state">
                  <b>Most recommended browser</b>
                  <p>We recommend you to use the Google Chrome for the better user-interface and user-experience, but you can also use other browsers like Microsoft Edge, Mozilla Firefox, and other browsers.</p>
                </div>
              </td>
            </tr>
          </table>
        </div>

      <!--The Dev Team-->
      <div class="dev-info">
        <div class="dev-statement">
          <h1>The Dev Team</h1>
          <br />
          <p>
            <b>2gether</b> is one of the few system integration, professional
            service and software development companies in Zamboanga. As a
            privately owned company, 2gether provides software design and
            development as well as consultation. We are a start-up company
            composed of six people working hand-in-hand to build up the future
            that were aiming for with hopes to cater quality and excellent
            services to our client, together we dream.
          </p>
        </div>
        <script src="./stylesheet/jQuery/app.js" type="text/javascript">
        </script>
        <div class="dev-logo">
          <div class="line-l"></div>
          <img src="../font/assets/logo/logo.png" alt="" />
          <div class="line-r"></div>
        </div>
        <div class="dev-member">
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/justin-1.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>Justin Bancayrin</h4>
            </div>
            <div class="member-position">
              <p>Manager</p>
            </div>
          </div>
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/kat-1.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>Katreena Gonzales</h4>
            </div>
            <div class="member-position">
              <p>Business Analyst</p>
            </div>
          </div>
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/ed-1.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>Edmond Duran</h4>
            </div>
            <div class="member-position">
              <p>UX Designer</p>
            </div>
          </div>
        </div>
        <div class="dev-member">
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/jake.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>Vhenezel Tuble</h4>
            </div>
            <div class="member-position">
              <p>UI Designer</p>
            </div>
          </div>
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/profile2018.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>James Francisco</h4>
            </div>
            <div class="member-position">
              <p>Lead Developer</p>
            </div>
          </div>
          <div class="member">
            <div class="member-profile">
              <img src="../font/assets/devteam/derv-1.jpg" alt="" />
            </div>
            <div class="member-name">
              <h4>Dervyn Macadaya</h4>
            </div>
            <div class="member-position">
              <p>Quality Assurance Engineer</p>
            </div>
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

    <!--FONT-->
    <!--
    <div class="font-container" id="font01">
      <div class="font-content">
        <form action="">
          <h2><span class="far fa-cog"></span> Settings</h2>
          <br />
          <div class="font-con">
            <p>Font Size:</p>
            <input type="radio" name="font" />
            <label for="font" id="df">default</label>
            <input type="radio" name="font" />
            <label for="font" id="ei">18</label>
            <input type="radio" name="font" />
            <label for="font" id="tw">20</label>
          </div>

          <div class="college-button">
            <button id="cancel" onclick="closeModal()">
              <span class="fas fa-times"></span> Cancel
            </button>
            <button type="submit" id="submit">
              <span class="fas fa-check"></span> Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <script>
      function openModal() {
        document.getElementById("font01").style.display = "block";
      }
      function closeModal() {
        document.getElementById("font01").style.display = "none";
      }
    </script>-->

    <!-- End // .directional_nav -->
    <script src="../font/jQuery/jquery-3.5.1.min.js"></script>
    <script src="./stylesheet/jQuery/slider.js"></script>
  </body>
</html>
