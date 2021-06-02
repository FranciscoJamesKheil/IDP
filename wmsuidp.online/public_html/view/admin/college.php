<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
  $find = "SELECT * FROM users WHERE user_username = '$access';";

  $dataFound = mysqli_query($mysqli,$find);
  while($row = mysqli_fetch_array($dataFound)) { 
    $foundid =  $row['college_id_fk'];
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
  <style>
    #dean-img {
      width: 3rem;
      height: 3rem;
      transition: 0.3s ease;
      border-radius: 50%;
    }
    .dean-div {
      float: right;
      margin-top: 20px;
      padding: 0 0 20px 20px;
    }
    .dean-div:hover #dean-img{
      transform: scale(4) translateX(-2.1rem);
      box-shadow: 0px 1px 10px -2px rgb(90,90,90); 
    }
  </style>
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

      <section>
        <ul>
          <a href="./profile.php">
            <li>Account Settings</li>
          </a>
          <a href="./college.php" id="link-active">
            <li>College Settings</li>
          </a>
        </ul>
      </section>
      <?php
      //view
      $sql = "SELECT * FROM college LEFT JOIN dean ON dean.college_id_fk = college.college_id WHERE college.college_id = $foundid ORDER BY college.college_id ASC";

      $myData = mysqli_query($mysqli,$sql);
      while($record = mysqli_fetch_array($myData)) { 
        $cl = $record['college_logo'];
        $cn = $record['college_name'];
        $dc = $record['date_created'];
        $dfn = $record['dean_firstname'];
        $dln = $record['dean_lastname'];
        $dmi = $record['dean_mi'];
        $dpi = $record['dean_profile_img'];
        $dp = $record['dean_position'];
        $dd = $record['dean_degree'];
      }
      ?>
      <div class="main">
        <div class="content">
          <div class="pro-detail">
            <img
              src="<?php echo $cl!=NULL? '../general/mysql/registration/images/'. $cl : '../font/assets/logo/wmsulogo.png'?>"
              id="uicon"
              alt="user-icon"
            />
            <button type="button" onclick="openPic()">
              <span
                class="fas fa-camera"
                title="Upload new college seal."
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
            <p>College Name: <b id="capitalize"><?php echo $cn ?></b></p>
            <p>Date Created: <b><?php echo $dc ?></b></p>
          </div>
          <div class="details">
            <p id="label-header">
              College Dean
              <button type="button" id="btn-edit" onclick="openUP()">
                <span class="fas fa-pen"></span> Edit
              </button>
            </p>
            <div class="dean-div">
              <img src=<?php echo $dpi != NULL ? "./mysql/college/images/". $dpi : "../font/assets/icon/userbw.png" ?> id="dean-img" alt="Dean">
            </div>
            <p>Name: <b id="capitalize"><?php echo $dmi !="" ? $dfn. " " . $dmi . ". " .$dln : $dfn. " " . $dln ?></b></p>
            <p>Position: <b id="capitalize"><?php echo $dp ?></b></p>
            <p>Degree: <b id="capitalize"><?php echo $dd ?></b></p>
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
        <form action="./mysql/college/add-logo.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <h2><span class="far fa-camera"></span> College Seal</h2>
          <br />
          <p>
            Upload your new College Seal. <br />
            Image should be in (PNG Transparent) format SIZE width = height.
          </p>
          <br />
          <input type="text" value="<?php echo $foundid ?>" name="idcollege" hidden>
          <input type="file" id="pro-image" name="image" required />
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
        <form action="./mysql/college/add-info.php" method="POST">
          <h2><span class="far fa-info"></span> Basic Information</h2>
          <br />
          <input type="text" value="<?php echo $foundid ?>" name="idcollege" hidden>
          <label for="">College Name: </label><br />
          <input type="text" value="<?php echo $cn ?>" id="capitalize" autocomplete="off" name="college-name" required/><br />
          <label for="">Date Created: </label><br />
          <input type="text" value="<?php echo $dc ?> (default)" title="Default" disabled />
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
    <!--dean info-->
    <div class="modal-container" id="up01">
      <div class="modal-content">
        <form action="./mysql/college/add-dean.php" method="POST"enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <h2><span class="far fa-info"></span> Dean Information</h2>
          <br />
          <input type="text" value="<?php echo $foundid ?>" name="idcollege" hidden>
          <label for="">Upload Profile Picture: </label>
          <input type="file" id="pro-image" name="dprofile" /> <br /> <br />
          <label for="">First Name: </label><br />
          <input type="text"  id="capitalize" value="<?php echo $dfn ?>" autocomplete="off" name="first-name" required/><br />
          <label for="">Last Name: </label><br />
          <input type="text"  id="capitalize"value="<?php echo $dln ?>" autocomplete="off" name="last-name" required/>
          <label for="">M.I (Optional): </label><br />
          <input type="text" id="capitalize" value="<?php echo $dmi ?>" autocomplete="off"  name="middle-initial" maxlength="1" id="mi" style="width: 3rem;"/><br />
          <label for="">Position: </label><br />
          <input type="text" id="capitalize" placeholder="Dean (Default)" value="<?php echo $dp ?>" autocomplete="off" name="position" required/>
          <label for="">Degree: </label><br />
          <input type="text" id="capitalize" value="<?php echo $dd ?>" autocomplete="off" name="degree" placeholder="Ph.D, DNS, etc.." required/>
          <br />
          <div class="pro-button">
            <button type="reset" id="cancel" onclick="closeModal()">
              <span class="fas fa-times"></span> Cancel
            </button>
            <button type="submit" id="submit" name="update">
              <span class="fas fa-check"></span> Update
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
  </body>
</html>
