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
    <title>IDP Generator | Registration</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/registration.css" />
    <link rel="stylesheet" href="./stylesheet/content/notification.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <!--NOTIFICATION-->
    <?php
      $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
      
      if(isset($_POST['submit-add'])){
          //path to store the college logo
          $target = "./mysql/registration/images/".basename($_FILES['image']['name']);

          /*college-table*/
          $image=$_FILES['image']['name'];
          $name=mysqli_real_escape_string($link, $_POST['college-name']);
          $date=mysqli_real_escape_string($link, $_POST['date-created']);
          $admin_name=mysqli_real_escape_string($link, $_POST['admin-name']);
          $admin_username=mysqli_real_escape_string($link, $_POST['admin-username']);
          $admin_password=mysqli_real_escape_string($link, $_POST['admin-password']);

          $sqlcollege = "INSERT INTO college(college_logo, college_name, date_created) VALUES ('$image','$name','$date')";

          if(mysqli_query($link, $sqlcollege)) {
              //creating admin account
              $sql = "SELECT * FROM college";

              $myData = mysqli_query($link,$sql);
              while($record = mysqli_fetch_array($myData)) { 
                  $cid = $record['college_id'];
              }

              $sqladmin = "INSERT INTO users(college_id_fk, user_type, user_profile_pic, user_name, user_username, user_password) VALUES ($cid, 'admin','', '$admin_name', '$admin_username','$admin_password')";
              $sqldean = "INSERT INTO dean(college_id_fk, dean_firstname, dean_lastname, dean_mi, dean_profile_img, dean_position, dean_degree) VALUES ($cid, '-', '-', '','','-','-')";
              
              if(mysqli_query($link, $sqladmin)) {
                  mysqli_query($link, $sqldean);
                  //move uploaded logo to the folder
                  move_uploaded_file($_FILES['image']['tmp_name'], $target);

              ?>
                <div id="notif">
                  <div id="container">
                      <img id="success-vector" src="../font/assets/icon/success.png" alt="">
                      <br>
                      <h1 id="notifmes">DONE!</h1>
                  </div>
                </div>
                <script>
                  document.getElementById("notif").style.display = "block";
                  setInterval(() => {
                    document.getElementById("notif").style.display = "none";
                  }, 3000);
                </script>
              <?php
              }
              else {
                ?>
                  <div id="notif">
                    <div id="container-error">
                        <img id="vector" src="../font/assets/icon/error.png" alt="">
                        <br>
                        <h1 id="notifmes">USERNAME EXIST!</h1>
                    </div>
                  </div>
                  <script>
                    document.getElementById("notif").style.display = "block";
                    setInterval(() => {
                      document.getElementById("notif").style.display = "none";
                    }, 4000);
                  </script>
                <?php
                  $delColl = "DELETE FROM `college` WHERE college_id = $cid;";
                  mysqli_query($link, $delColl);
              }
          }
          else {
                ?>
                  <div id="notif">
                    <div id="container-error">
                        <img id="vector" src="../font/assets/icon/mortarboard.png" alt="">
                        <br>
                        <h1 id="notifmes">COLLEGE EXIST!</h1>
                    </div>
                  </div>
                  <script>
                    document.getElementById("notif").style.display = "block";
                    setInterval(() => {
                      document.getElementById("notif").style.display = "none";
                    }, 4000);
                  </script>
                <?php
          }
      } else if(isset($_POST['submit-delete'])) {
        $idc = $_POST['delete-college-s'];

        $sqldels = "DELETE FROM `college` WHERE college_id = '$idc'";
        $sqluser = "DELETE FROM `users` WHERE college_id_fk = '$idc'";

        if(mysqli_query($link, $sqldels)) {
            mysqli_query($link, $sqluser);
        ?>
                <div id="notif">
                  <div id="container">
                      <img id="success-vector" src="../font/assets/icon/delete.png" alt="">
                      <br>
                      <h1 id="notifmes">REMOVED!</h1>
                  </div>
                </div>
                <script>
                  document.getElementById("notif").style.display = "block";
                  setInterval(() => {
                    document.getElementById("notif").style.display = "none";
                  }, 3000);
                </script>
        <?php
        }
        else {
        ?>
                <div id="notif">
                  <div id="container">
                      <img id="success-vector" src="../font/assets/icon/error.png" alt="">
                      <br>
                      <h1 id="notifmes">ERROR!</h1>
                  </div>
                </div>
                <script>
                  document.getElementById("notif").style.display = "block";
                  setInterval(() => {
                    document.getElementById("notif").style.display = "none";
                  }, 3000);
                </script>
        <?php
        }
      }
      mysqli_close($link);
    ?>
    <header class="header">
      <a class="logo">
        <img src="../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM</p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">REGISTRATION</p>
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
                ><a
                  class="active"
                  href="./registration.php"
                  id="slide-registration"
                  ><p class="fas fa-pen"></p>
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
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="./registration.php"
          ><li class="active-sn">
            <span class="fas fa-pen"></span>Registration
          </li></a
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
        <section>
          <div class="con">
            <img
              id="con-vector"
              src="../font/assets/vector/3992745.jpg"
              alt=""
            />
            <div class="info">
              <h3>Register College and Admin College</h3>
              <br />
              <p>
                Register College and Create account for College Administrator or
                the Secretary.
              </p>
            </div>
            <div class="field">
              <p id="register-tag">REGISTER COLLEGE & COLLEGE ADMINISTRATOR</p>
              <form action="./registration.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div class="field-admin">
                  <div class="admin-con">
                    <label for="">Admin Name:</label>
                    <input
                      type="text"
                      autocomplete="off"  id="capitalize" name="admin-name"  maxlength="50"
                      placeholder="First Name  Last Name"
                      required
                    />
                  </div>
                  <div class="admin-con">
                    <label for="">Admin Username:</label>
                    <input type="text" name="admin-username" maxlength="30" autocomplete="off" required />
                  </div>
                  <div class="admin-con">
                    <label for="">Admin Password:</label>
                    <input type="text" name="admin-password"  maxlength="20" autocomplete="off" required />
                  </div>
                </div>
                <div class="field-college">
                  <div class="admin-con">
                    <label for="imagelogo">College Logo (PNG Transparent) SIZE: width = height :</label>
                    <input type="file" id="imagelogo" name="image" required/>
                  </div>
                  <br />
                  <div class="admin-con">
                    <label for="">College Name:</label>
                    <input type="text" name="college-name" id="capitalize" autocomplete="off" required />
                  </div>
                </div>
                <input type="text" value="" name="date-created" id="date-created" hidden>
                <script>
                    var x = new Date();
                    var year = x.getFullYear();
                    var month = x.getMonth();
                    var date = x.getDate();
                    month = month + 1;
                    document.getElementById("date-created").value= year + "-" + month + "-" + date;
                </script>
                <div class="field-btn">
                  <button type="reset" id="btn-reset" title="Clear value">
                    <span class="fas fa-eraser"></span> Reset
                  </button>
                  <button
                    type="submit"
                    id="btn-submit" name="submit-add"
                    title="Add to Record List"><span class="fas fa-save"></span> Save</button>
                </div>
              </form>
            </div>
          </div>
        </section>
        <div id="main-tbl-sec">
          <div id="sec-tbl">
            <h3 id="recordtext">RECORD LIST</h3>
            <div class="search-college">
              <input
                type="text"
                id="myInput"
                onkeyup="mySearch()"
                autocomplete="off"
                placeholder="Search College name..."
              />
            </div>
          </div>
          <br />
          <div class="tblsec">
            <table id="tblrecord">
              <tr>
                <th>#</th>
                <th>Seal</th>
                <th>College Name</th>
                <th>Admin Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Date Created</th>
                <th colspan="2" id="cllg-center">Action</th>
              </tr>
              <tr id="norecord" style="display: none;"><td>No Record...</td></tr>
              <?php
                //view
                $sql = "SELECT * FROM college LEFT JOIN users ON users.college_id_fk = college.college_id WHERE user_type = 'admin' ORDER BY college.college_id ASC";

                $myData = mysqli_query($mysqli,$sql);
                $count_faculty = 0;

                while($record = mysqli_fetch_array($myData)) { 
                  $count_faculty++;
                  $cid = $record['college_id'];
                  $cl = $record['college_logo'];
                  $cn = $record['college_name'];
                  $an = $record['user_name'];
                  $au = $record['user_username'];
                  $ap = $record['user_password'];
                  $dc = $record['date_created'];
              ?>
              <tr>
                <td><?php echo $count_faculty ?></td>
                <td>
                  <img
                    src="./mysql/registration/images/<?php echo $cl ?>"
                    id="cllglogo"
                    alt="College Logo" style="width: 3rem; height: 3rem; border-radius: 50%"
                  />
                </td>
                <td id="capitalize"><?php echo $cn ?></td>
                <td id="capitalize"><?php echo $an ?></td>
                <td><?php echo $au ?></td>
                <td><?php for($p=0; $p<strlen($ap); $p++) echo "*"; ?></td>
                <td><?php echo $dc ?></td>
                <td id="cllg-center">
                  <a href="./stylesheet/pop/registration/reg-edit.php?GetID=<?php echo $cid; ?>"
                    ><button type="button" title="Update College Information" id="btn-edit"><span class="far fa-pen"></span></button></a
                  >
                </td>
                <td>
                  <button type="button" title="Remove College Account Permanently" id="btn-del" onclick="openModal('<?php echo $cid ?>')"><span class="far fa-trash"></span></button>
                </td>
              </tr>
              <?php 
                } 
              ?>
            </table>
          </div>
          <script>
            var input, filter, table, tr, td, i, txtValue;
            
            function mySearch() {
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("tblrecord");
              tr = table.getElementsByTagName("tr");


              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    document.getElementById("norecord").style.display="none";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
                else 
                  document.getElementById("norecord").style.display="block";
              }
            }
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("tblrecord");
              tr = table.getElementsByTagName("tr");


              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    document.getElementById("norecord").style.display="none";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
                else 
                  document.getElementById("norecord").style.display="block";
              }
          </script>
        </div>
      </div>
      <div class="modal-container" id="modal01">
        <div class="modal-content">
          <form action="./registration.php" method="POST">
            <h2><span class="far fa-times"></span> Warning Database</h2>
            <p>
              You're going to delete permanently the database of the specific
              college including:
            </p>
            <br />
            <p>
              College Administrator Data, Faculty Data and the IDP schedule data.
            </p>
            <input type="text" value="" id="delete-college" name="delete-college-s" hidden>
            <div class="college-button">
              <button type="button" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="submit-delete">
                <span class="fas fa-check"></span> Proceed
              </button>
            </div>
          </form>
        </div>
      </div>
      <script>
        function openModal(x) {
          document.getElementById("modal01").style.display = "block";
          document.getElementById("delete-college").value = x;
        }
        function closeModal() {
          document.getElementById("modal01").style.display = "none";
        }
      </script>
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
      <?php
        mysqli_close($mysqli);
      ?>
    </main>
  </body>
</html>
