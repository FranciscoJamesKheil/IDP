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
          <a href="./profile.php" id="link-active">
            <li>Account Settings</li>
          </a>
        </ul>
      </section>
      <?php
      //view
      $sql = "SELECT * FROM users WHERE user_type='general'";

      $myData = mysqli_query($mysqli,$sql);
      while($record = mysqli_fetch_array($myData)) { 
        $uname = $record['user_name'];
        $uprofile = $record['user_profile_pic'];
        $username = $record['user_username'];
        $password = $record['user_password'];
      }
      ?>
      <div class="main">
        <div class="content">
          <div class="pro-detail">
            <img
              src="<?php echo $uprofile!=NULL? './mysql/profile/images/'.$uprofile : '../font/assets/icon/user.png'?>"
              id="uicon"
              alt="user-icon"
            />
            <button type="button" onclick="openPic()">
              <span
                class="fas fa-camera"
                title="Upload new Profile picture"
              ></span>
            </button>
          </div>
          <div class="details">
            <p id="label-header">
              Basic Information
              <button type="button" id="btn-edit" onclick="openBasic()">
                <span class="fas fa-pen"></span> Edit
              </button>
            </p>
            <p>Name: <b style="text-transform: capitalize;"><?php echo $uname ?></b></p>
            <p>Position: <b>General Admin</b></p>
          </div>
          <div class="details">
            <p id="label-header">
              Username and Password
              <button type="button" id="btn-edit" onclick="openUP()">
                <span class="fas fa-pen"></span> Edit
              </button>
            </p>
            <p>Username: <b><?php echo $username ?></b></p>
            <p>Password: <b><?php for($p=0; $p<strlen($password); $p++) echo "*"; ?></b></p>
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
    <!--modal-->
    <div class="modal-container" id="pic01">
      <div class="modal-content">
        <form action="./mysql/profile/add-profile.php" method="POST" enctype="multipart/form-data">
          <h2><span class="far fa-camera"></span> Profile Picture</h2>
          <br />
          <p>Upload your new profile picture. <br><b>Please rename your image filename, to this format: (lastname_firstname_college-acronym) <br> if possible..</b></p>
          <br />
          <input type="file" id="pro-image" name="image" required/>
          <div class="pro-button">
            <button type="button" id="cancel" onclick="closeModal()">
              <span class="fas fa-times"></span> Cancel
            </button>
            <button type="submit" id="submit" name="submit">
              <span class="fas fa-check"></span> Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <!--basic info-->
    <div class="modal-container" id="basic01">
      <div class="modal-content">
        <form action="./mysql/profile/add-info.php" method="POST">
          <h2><span class="far fa-info"></span> Basic Information</h2>
          <br />
          <label for="">Name: </label><br />
          <input
            type="text"
            placeholder="First Name Last Name" style="text-transform: capitalize;" maxlength="50" autocomplete="off" value="<?php echo $uname ?>" name="general-name"required
          /><br />
          <label for="">Position: </label><br />
          <input
            type="text"
            value="General Admin (default)"
            id="def"
            title="Default"
            disabled
          />
          <br />
          <div class="pro-button">
            <button type="reset" id="cancel" onclick="closeModal()">
              <span class="fas fa-times"></span> Cancel
            </button>
            <button type="submit" id="submit" name="submit">
              <span class="fas fa-check"></span> Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <!--userpassword info-->
    <div class="modal-container" id="up01">
      <div class="modal-content">
        <form action="./mysql/profile/add-credentials.php" method="POST">
          <h2><span class="far fa-info"></span> Credential Information</h2>
          <br>
          <p>Default username to avoid duplication.</p>
          <br />
          <label for="">Username: </label><br />
          <input type="text" value="<?php echo $username ?>" title="Default" disabled/><br/>
          <label for="">Password: </label><br />
          <input type="text" name="general-password" value="<?php echo $password ?>" maxlength="20"  required/>
          <br />
          <div class="pro-button">
            <button type="reset" id="cancel" onclick="closeModal()">
              <span class="fas fa-times"></span> Cancel
            </button>
            <button type="submit" id="submit" name="submit">
              <span class="fas fa-check"></span> Save
            </button>
          </div>
        </form>
      </div>
    </div>
    <script>
      function openPic() {
        document.getElementById("pic01").style.transform = "scale(1)";
        document.getElementById("basic01").style.transform = "scale(0)";
        document.getElementById("up01").style.transform = "scale(0)";
      }
      function openBasic() {
        document.getElementById("pic01").style.transform = "scale(0)";
        document.getElementById("basic01").style.transform = "scale(1)";
        document.getElementById("up01").style.transform = "scale(0)";
      }
      function openUP() {
        document.getElementById("pic01").style.transform = "scale(0)";
        document.getElementById("basic01").style.transform = "scale(0)";
        document.getElementById("up01").style.transform = "scale(1)";
      }
      function closeModal() {
        document.getElementById("pic01").style.transform = "scale(0)";
        document.getElementById("basic01").style.transform = "scale(0)";
        document.getElementById("up01").style.transform = "scale(0)";
      }
    </script>
    <?php 
      mysqli_close($mysqli);
    ?>
  </body>
</html>
