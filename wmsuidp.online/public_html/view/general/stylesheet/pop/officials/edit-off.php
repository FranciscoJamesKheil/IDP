<?php
    session_start();
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }

	  $id = $_GET['GetID'];
    $sql = "SELECT * FROM officials WHERE officials_id= '". $id . "';";
    
    $myData = mysqli_query($mysqli,$sql);

    while($record = mysqli_fetch_assoc($myData)){
      $oid = $record['officials_id'];
      $ofn = $record['officials_firstname'];
      $oln = $record['officials_lastname'];
      $omi = $record['officials_mi'];
      $op = $record['officials_position'];
      $od = $record['officials_degree'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Officials</title>
    <link rel="icon" href="../../../../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="../../../stylesheet/content/header.css" />
    <link rel="stylesheet" href="../../../stylesheet/content/officials.css" />
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
        <p id="page-title">WMSU Officials</p>
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
                ><a href="../../../registration.php" id="slide-registration"
                  ><p class="far fa-pen"></p>
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
                ><a
                  class="active"
                  href="../../../officials.php"
                  id="slide-officials"
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
          ><li><span class="far fa-pen"></span>Registration</li></a
        >
        <a href="../../../matrix.php"
          ><li><span class="far fa-cogs"></span>Matrix</li></a
        >
        <a href="../../../officials.php"
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
      <script src="../../../../font/preloader/loader.js"></script>

      <div class="main">
        <div class="main">
          <div id="wmsu-vec">
            <img src="../../../../font/assets/logo/wmsulogo.png" alt="" />
            <p>Western Mindanao State University Officials</p>
          </div>
        </div>
      </div>
      <section>
        <div class="register">
          <form action="./update-officials.php" method="POST">
            <p id="h1">UPDATE DETAILS</p>
            <br />
            <input type="text" value="<?php echo $oid ?>" autocomplete="off" name="officials-id" hidden>
            <p>First Name:</p>
            <input type="text" value="<?php echo $ofn ?>" autocomplete="off" name="first-name" required/>
            <br />
            <p>Middle Initial (Optional):</p>
            <input type="text" value="<?php echo $omi ?>" maxlength="1" autocomplete="off" name="middle-initial"/>
            <br />
            <p>Last Name:</p>
            <input type="text" value="<?php echo $oln ?>" autocomplete="off" name="last-name" required/>
            <br />
            <p>Position:</p>
            <input type="text" value="<?php echo $op ?>" autocomplete="off" name="position" placeholder="President, etc" id="uppercase" required/>
            <br />
            <p>Degree</p>
            <input type="text" value="<?php echo $od ?>" autocomplete="off" name="degree" placeholder="PhD, RN, DNS, etc." required/>

            <div class="btn-add-officials">
              <button type="submit" name="update" id="update-off">Update</button>
            </div>
            <div class="btn-add-officials">
              <a href="../../../officials.php"
                ><button type="button" id="reg-off">Back</button></a
              >
            </div>
          </form>
        </div>
        <div class="record">
          <table border="1">
            <tr>
              <th colspan="5" id="tag">RECORD</th>
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
                $sqledit = "SELECT * FROM officials";
                $countofficial = 0;

                $myDataedit = mysqli_query($mysqli,$sqledit);
                while($row = mysqli_fetch_array($myDataedit)) { 
                  $countofficial++;
                  $eid = $row['officials_id'];
                  $efn = $row['officials_firstname'];
                  $eln = $row['officials_lastname'];
                  $emi = $row['officials_mi'];
                  $ep = $row['officials_position'];
                  $ed = $row['officials_degree'];
              ?>
            <tr>
              <td><?php echo $countofficial ?></td>
              <td id="capitalize"><?php echo $eln ?>, <?php echo $efn ?> <?php echo $emi!=""? $emi.".": $emi?></td>
              <td id="capitalize"><?php echo $ep ?></td>
              <td id="capitalize"><?php echo $ed ?></td>
              <td id="tbl-btn">
                <a href="./edit-off.php?GetID=<?php echo $eid; ?>"
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
        <p><img id="img-footer" src="../../../../font/assets/logo/wmsulogo.png" alt="IDP">All Rights Reserved &copy 2021 WMSU IDP <img id="img-footer" src="../../../../font/assets/logo/idplogo.png" alt="IDP"></p>
      </footer>
    </main>
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
