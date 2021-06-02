<?php
    session_start();
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
    
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
	  $id = $_GET['GetID'];
    $sql = "SELECT * FROM users WHERE user_id = '". $id . "';";
    $sqlfaculty = "SELECT * FROM faculty WHERE user_id_fk = '". $id . "';";
    
    $myData = mysqli_query($mysqli,$sql);
    $myDataFaculty = mysqli_query($mysqli,$sqlfaculty);

    while($record = mysqli_fetch_assoc($myData)){
      $uun = $record['user_username'];
      $upw = $record['user_password'];
    }
    while($row = mysqli_fetch_assoc($myDataFaculty)){
      $ffn = $row['faculty_firstname'];
      $fln = $row['faculty_lastname'];
      $fmi = $row['faculty_mi'];
      $fe = $row['faculty_email'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | College</title>
    <link rel="icon" href="../../../../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="../../content/header.css" />
    <link rel="stylesheet" href="../../content/registration.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../../../../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../../../font/preloader/loader.css" />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../../../../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM</p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">UPDATE</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a href="../../../home.php" id="slide-dashboard">
            <p class="far fa-home"></p>
            Home
          </a>
        </li>
        <li id="dashboard-mobile">
          <a href="../../../dashboard.php" id="slide-dashboard">
            <p class="far fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a
                  class="active"
                  href="../../../registration.php"
                  id="slide-registration"
                  ><p class="fas fa-pen"></p>
                  Registration</a
                ></span
              >
              <span
                ><a href="../../../matrix.php" id="slide-matrix"
                  ><p class="far fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="../../../officials.php" id="slide-officials"
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
                ><a href="../../../profile.php" id="slide-profile"
                  ><p class="far fa-user-cog"></p>
                  Profile</a
                ></span
              >
              <br />
              <span
                ><a
                  href="../../../mysql/logout.php"
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
        <img src="../../../../font/assets/logo/wmsulogo.png" alt="" />
        <p id="nav-hd">WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="../../../home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="../../../dashboard.php"
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="../../../registration.php"
          ><li class="active-sn">
            <span class="fas fa-pen"></span>Registration
          </li></a
        >
        <a href="../../../matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="../../../officials.php"
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
      <script src="../../../../font/preloader/loader.js"></script>

      <div class="main">
        <section>
          <div class="con">
            <div class="info">
              <h3>Update Faculty Information</h3>
              <br />
              <p>
                Update Information of the Faculty.<br />
                <b>Note: You can't update username, it is your key.</b>
              </p>
            </div>
            <div class="field">
              <form action="./update-faculty.php" method="POST">
                <div class="field-admin">
                  <input type="text" value="<?php echo $id ?>" name="uid" hidden>
                  <div class="admin-con">
                    <label for="">First Name:</label>
                    <input
                      type="text"
                      autocomplete="off" value="<?php echo $ffn ?>" 
                      id="capitalize" name="first-name"
                      placeholder="First Name"
                      required
                    />
                  </div>
                  <div class="admin-con">
                    <label for="">Last Name:</label>
                    <input
                      type="text"
                      autocomplete="off" value="<?php echo $fln ?>" 
                      id="capitalize" name="last-name"
                      placeholder="Last Name"
                      required
                    />
                  </div>
                  <div class="admin-con" style="width: 10rem">
                    <label for="">Middle Initial (Optional):</label>
                    <input
                      type="text"
                      maxlength="1" name="middle-initial"
                      style="width: 3rem; text-transform: uppercase"
                      autocomplete="off" value="<?php echo $fmi ?>" 
                    />
                  </div>
                </div>
                <div class="field-college">
                  <div class="admin-con">
                    <label for="">Email Address:</label>
                    <input
                      type="email" name="email"
                      autocomplete="off" value="<?php echo $fe ?>" 
                      required
                    />
                  </div>
                </div>
                <div class="credential">
                  <div class="cre">
                    <label for="">Username:</label>
                    <input
                      type="text" name="username-default"
                      autocomplete="off" value="<?php echo $uun ?>" 
                      disabled
                    />
                    <input
                      type="text" name="username"
                      autocomplete="off" value="<?php echo $uun ?>" 
                      hidden
                    />
                  </div>
                  <div class="cre">
                    <label for="">Password:</label>
                    <input
                      type="text" name="password" id="password-gen" onchange="checkpass()"
                      autocomplete="off" value="<?php echo $upw ?>"
                      required
                    />
                  </div>
                  <div class="cre">
                    <br>
                    <button type="button" onclick="generateP()" title="Generate password" id="generate">Generate Password</button>
                  </div>
                  <script>
                      function generateP() {
                          const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                          
                          document.getElementById("password-gen").value = Math.floor(Math.random() * (1000 - 10)) + 10 + alphabet[Math.floor(Math.random() * alphabet.length)] + Math.floor(Math.random() * (100 - 10)) + 10 + alphabet[Math.floor(Math.random() * alphabet.length)];
                      }
                      function checkpass() {
                          var passCheck = document.getElementById("password-gen").value;
                          
                          if(passCheck.length < 8) {
                              alert("Your password is too short..");
                          }
                      }
                  </script>
                </div>
                <div class="field-btn">
                  <a href="../../../registration.php"
                    ><input
                      type="button"
                      id="btn-cancel"
                      title="Back to Record List"
                      value="Cancel"
                  /></a>
                  <input
                    type="submit"
                    id="btn-edit"
                    title="Update Information"
                    value="Save"
                    name="update"
                  />
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
      <footer>
        <p>
          <img
            id="img-footer"
            src="../../../../font/assets/logo/wmsulogo.png"
            alt="IDP"
          />All Rights Reserved &copy 2021 WMSU IDP
          <img
            id="img-footer"
            src="../../../../font/assets/logo/idplogo.png"
            alt="IDP"
          />
        </p>
      </footer>
    </main>
  </body>
</html>
