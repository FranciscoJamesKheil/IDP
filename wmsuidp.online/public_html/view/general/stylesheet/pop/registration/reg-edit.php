<?php
    session_start();
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
    
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
	  $id = $_GET['GetID'];
    $sql = "SELECT * FROM college WHERE college_id= '". $id . "';";
    $sqladmin = "SELECT * FROM users WHERE user_type= 'admin' AND college_id_fk = '". $id . "';";
    
    $myData = mysqli_query($mysqli,$sql);
    $myDataAdmin = mysqli_query($mysqli,$sqladmin);

    while($record = mysqli_fetch_assoc($myData)){
      $cid = $record['college_id'];
      $cl = $record['college_logo'];
      $cn = $record['college_name'];
    }
    while($row = mysqli_fetch_assoc($myDataAdmin)){
      $name = $row['user_name'];
      $un = $row['user_username'];
      $pw = $row['user_password'];
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
          <a href="../../../home.php" id="slide-home">
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
        <p>WMSU IDP Generator</p>
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
              <h3>Update College and Admin College</h3>
              <br />
              <p>
                Update Information of College and College Administrator or the
                Secretary. <br />
                <b>Note: You can't update username, it is your key.</b>
              </p>
            </div>
            <div class="field">
              <form action="./update-college.php" method="POST">
                <div class="field-admin">
                  <input type="text" value="<?php echo $cid ?>" name="college-id" hidden>
                  <div class="admin-con">
                    <label for="">College Admin Name:</label>
                    <input
                      type="text"
                      autocomplete="off" style="text-transform: capitalize;" value="<?php echo $name ?>" name="new-admin-name"
                      placeholder="First Name  Last Name"
                      required
                    />
                  </div>
                  <div class="admin-con">
                    <label for="">College Admin Username:</label>
                    <input type="text" value="<?php echo $un ?>" name="new-admin-un" autocomplete="off" disabled />
                  </div>
                  <div class="admin-con">
                    <label for="">College Admin Password:</label>
                    <input type="text" value="<?php echo $pw ?>" name="new-admin-pw" autocomplete="off" required />
                  </div>
                </div>
                <div class="field-college">
                  <div class="admin-con">
                    <label for="" style="display:flex; align-items: center;">College Logo (PNG): <img src="../../../mysql/registration/images/<?php echo $cl ?> " title="Current Logo" style="margin-left: 10px; width: 2rem; height: 2rem" alt="Current Logo"></label>
                    <input type="file" id="capitalize" name="new-college-logo"/>
                  </div>
                  <br />
                  <div class="admin-con">
                    <label for="">College Name:</label>
                    <input
                      type="text"
                      autocomplete="off" style="text-transform: capitalize;" value="<?php echo $cn ?>" name="new-college-name"
                      required
                    />
                  </div>
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
                    value="Save" name="update"
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
      <?php 
       mysqli_close($mysqli);
       ?>
    </main>
  </body>
</html>
