<?php
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
    
    $sql = "SELECT * FROM users WHERE user_username = '$access';";

    $myData = mysqli_query($mysqli,$sql);

    while($record = mysqli_fetch_array($myData)) { 
      $cid = $record['college_id_fk'];
      $ut = $record['user_type'];
      $un = $record['user_name'];
      $uun = $record['user_username'];
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
  <body ondragstart="return false">
    <!--NOTIFICATION-->
    <?php
      $link = mysqli_connect("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp");

        if($link === false) {
            die("ERROR: COULD NOT CONNECT." .mysqli_connect_error());
        }
        $user_account_of = $_SESSION['username'];
        $sqlcollege = "SELECT * FROM users WHERE user_username = '$user_account_of';";

        $myDataC = mysqli_query($link,$sqlcollege);
        while($row = mysqli_fetch_array($myDataC)) { 
            $cid = $row['college_id_fk'];
        }

        if(isset($_POST['submit-add'])) {
            //get from session
            $ffn = $_POST['first-name'];
            $fln = $_POST['last-name'];
            $fmi = $_POST['middle-initial'];
            $fe = $_POST['email'];
            $fun = $_POST['username'];
            $fp = $_POST['password'];
            
            $sqlusers = "INSERT INTO users(college_id_fk,user_type, user_name, user_username, user_password) VALUES ($cid, 'faculty', '$fln, $ffn', '$fun', '$fp')";
            
            if(mysqli_query($link, $sqlusers)) {
                $sql = "SELECT * FROM users;";

                $myData = mysqli_query($link,$sql);

                while($record = mysqli_fetch_array($myData)) { 
                    $uidofu = $record['user_id'];
                }
                $sqlfaculty = "INSERT INTO `faculty`(`user_id_fk`, `faculty_firstname`, `faculty_lastname`, `faculty_mi`, `faculty_rank`, `faculty_designation`, `faculty_release_time`, `faculty_qualification`, `faculty_assignment`, `faculty_email`) VALUES ($uidofu,'$ffn','$fln','$fmi','','','','','','$fe');";
                mysqli_query($link, $sqlfaculty);
                
                //send credentials to email
                require 'phpmailer/PHPMailerAutoload.php';
        
                $mail = new PHPMailer;
                
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;         // Enable SMTP authentication
                $mail->Username = 'mjlee32100@gmail.com';  // SMTP username
                $mail->Password = 'mayJane32100m';  // SMTP password
                $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;  // TCP port to connect to
        
                $mail->setFrom('mjlee32100@gmail.com', 'WMSU IDP Online');
                $mail->addAddress($fe);  
        
                $mail->isHTML(true); // Set email format to HTML
        
                $mail->Subject = 'WMSU IDP Account';
                $mail->Body    = "<p>Greetings: <br><br> Herewith are your WMSU IDP account access codes: <br><br>Your username is <b>$fun</b><br>Your password is <b>$fp</b> <br><br>To login, please go to <a href='wmsuidp.online'>wmsuidp.online</a>
                    <br><br><p>Note:<br>
                    1. The password will be change to your profile settings after loging in.<br>
                    2. The username cannot be change (Unique).<br>
                    3. Create and Keep the records of the Credentials of accounts for future use.<br>
                    4. Please use <b><font color='#4285F4'>G</font><font color='#DB4437'>o</font><font color='#F4B400'>o</font><font color='#4285F4'>g</font><font color='#0F9D58'>l</font><font color='#DB4437'>e</font></b> Chrome browser, if possible.<br>
                    5. Please ignore this message if you already received this message previously.</p>";
        
                    if(!$mail->send()) {
                        echo "<script> alert('Message could not be sent.') </script>";
                    } else {
                        echo "<script> alert('Credential successfully sent.') </script>";
                    }
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
            }
        } else if(isset($_POST['delete-facu'])) {
            $idfafac = $_POST['delete-faculty'];
    
            $sqldelfacu = "DELETE FROM `users` WHERE user_id = '$idfafac'";
            //find user id foreign key to inform the user that his/her account have been removed.
            $sqlInform = "SELECT faculty.faculty_id, users.user_id, faculty.faculty_firstname, faculty.faculty_lastname, faculty.faculty_mi, faculty.faculty_email, users.user_username, users.user_password FROM faculty INNER JOIN users ON users.user_id = faculty.user_id_fk WHERE users.user_id = '$idfafac'";
            $myInfo = mysqli_query($link, $sqlInform);
    
            while($record = mysqli_fetch_array($myInfo)) { 
              $fems = $record['faculty_email'];
              $ffns = $record['faculty_firstname'];
              $funs = $record['user_username'];
              $fps = $record['user_password'];
            }
    
            if(mysqli_query($link, $sqldelfacu)) {
                //send credentials to email
                require 'phpmailer/PHPMailerAutoload.php';
        
                $mail = new PHPMailer;
                
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;         // Enable SMTP authentication
                $mail->Username = 'mjlee32100@gmail.com';  // SMTP username
                $mail->Password = 'mayJane32100m';  // SMTP password
                $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;  // TCP port to connect to
        
                $mail->setFrom('mjlee32100@gmail.com', 'WMSU IDP Online');
                $mail->addAddress($fems);  
        
                $mail->isHTML(true); // Set email format to HTML
        
                $mail->Subject = 'WMSU IDP Account';
                $mail->Body = "<p>Greetings: <br><br> <b>Your WMSU IDP account has been deleted.</b> <br><br>
                    Hello <span style='text-transform: capitalize;'>$ffns</span>, your username <b>$funs</b> and password <b>$fps</b> is no longer available due to a deletion of your account.<br><br>
                    What's wrong?<br><br>Please contact the college administrator/secretary.<br>";
        
                    if(!$mail->send()) {
                        echo "<script> alert('Message could not be sent.') </script>";
                    } else {
                        echo "<script> alert('Message was successfully informed the user.') </script>";
                    }
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
                      <h1 id="notifmes">ERROR! <?php mysqli_error($link)?></h1>
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
                ><a class="active" href="./registration.php" id="slide-faculty"
                  ><p class="fas fa-user"></p>
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
          ><li class="active-sn">
            <span class="fas fa-user"></span>Faculty Member
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
          <?php
            $sql = "SELECT * FROM college WHERE college_id = '$cid';";

            $myData = mysqli_query($mysqli,$sql);

            while($record = mysqli_fetch_array($myData)) { 
              $imglogo = $record['college_logo'];
              $clname = $record['college_name'];
              $dc = $record['date_created'];
            }
          ?>
            <img
              id="con-vector"
              src="../general/mysql/registration/images/<?php echo $imglogo ?>"
              alt=""
            />
            <div class="info">
              <h3>Register Faculty Member</h3>
              <br />
              <p><b id="capitalize"><?php echo $clname ?></b>
                <br>
                <i><?php echo $dc ?></i>
              </p>
            </div>
            <div class="field">
              <form action="./registration.php" method="POST">
                <div class="field-admin">
                  <div class="admin-con">
                    <label for="">First Name:</label>
                    <input
                      type="text" name="first-name" id="first-name-gen"
                      autocomplete="off" maxlength="50" style="text-transform: capitalize;"
                      required
                    />
                  </div>
                  <div class="admin-con">
                    <label for="">Last Name:</label>
                    <input
                      type="text" name="last-name" id="last-name-gen" maxlength="50" style="text-transform: capitalize;"
                      autocomplete="off"
                      required
                    />
                  </div>
                  <div class="admin-con" style="width: 10rem">
                    <label for="">M.I (Optional):</label>
                    <input
                      type="text" name="middle-initial"
                      maxlength="1"
                      style="width: 3rem;text-transform: capitalize;"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="field-college">
                  <div class="admin-con">
                    <label for="">Email Address:</label>
                    <input type="email" name="email" autocomplete="off" required />
                  </div>
                </div>
                <div class="credential">
                  <div class="cre">
                    <label for="">Username:</label>
                    <input type="text" title="It should be Unique Username.." name="username" id="username-gen" maxlength="30" autocomplete="off" required />
                  </div>
                  <div class="cre">
                    <label for="">Password:</label>
                    <input type="text" name="password" onchange="checkpass()" id="password-gen" minlength="8" maxlength="20" autocomplete="off" required />
                  </div>
                  <div class="cre">
                    <br>
                    <button type="button" onclick="generateUP()" title="Generate username and password" id="generate">Generate Credentials</button>
                  </div>
                  <script>
                      function generateUP() {
                          var fname = document.getElementById("first-name-gen").value;
                          var lname = document.getElementById("last-name-gen").value;
                          const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                          
                          if(fname === "" || lname === "") {
                              alert("Provide first name & last name first.");
                          } else {
                              document.getElementById("username-gen").value = lname.replace(/\s+/g, '').trim() + "." + fname.replace(/\s+/g, '').trim() + Math.floor(Math.random() * (10000 - 10)) + 10;
                              document.getElementById("password-gen").value = Math.floor(Math.random() * (1000 - 10)) + 10 + alphabet[Math.floor(Math.random() * alphabet.length)] + Math.floor(Math.random() * (100 - 10)) + 10 + alphabet[Math.floor(Math.random() * alphabet.length)];
                          }
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
                  <button type="reset" id="btn-reset" title="Clear value">
                    <span class="fas fa-eraser"></span> Reset
                  </button>
                  <button
                    type="submit"
                    id="btn-submit" name="submit-add"
                    title="Add to Record List"
                  >
                    <span class="fas fa-save"></span> Save
                  </button>
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
                placeholder="Search Faculty Name..."
              />
            </div>
          </div>
          <br />
          <div class="tblsec">
            <table id="tblrecord">
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Username</th>
                <th>Password</th>
                <th colspan="2" id="cllg-center">Action</th>
              </tr>
              <tr id="norecord" style="display: none;"><td>No Record...</td></tr>
              <?php
                //view
                $sqlfac = "SELECT faculty.faculty_id, users.user_id, users.user_profile_pic, faculty.faculty_firstname, faculty.faculty_lastname, faculty.faculty_mi, faculty.faculty_email, users.user_username, users.user_password FROM faculty INNER JOIN users ON users.user_id = faculty.user_id_fk WHERE users.college_id_fk = $cid;";
                $count_faculty = 0;

                $myFac = mysqli_query($mysqli,$sqlfac);
                while($fac = mysqli_fetch_array($myFac)) { 
                  $count_faculty++;
                  $ccid = $fac['user_id'];
                  $facpic = $fac['user_profile_pic'];
                  $facfn = $fac['faculty_firstname'];
                  $facln = $fac['faculty_lastname'];
                  $facmi = $fac['faculty_mi'];
                  $face = $fac['faculty_email'];
                  $facun = $fac['user_username'];
                  $facpw = $fac['user_password'];
              ?>
              <tr>
                <td><?php echo $count_faculty ?></td>
                <td>
                  <img
                    src="<?php echo $facpic!=NULL? '../faculty/mysql/profile/images/'.$facpic : '../font/assets/icon/user.png'?>"
                    id="cllglogo"
                    alt="Profile"
                  />
                </td>
                <td style="text-transform: capitalize;"><?php echo $facmi!=NULL ? "$facln, $facfn $facmi." : "$facln, $facfn" ?></td>
                <td><?php echo $face ?></td>
                <td><?php echo $facun ?></td>
                <td><?php for($p=0; $p<strlen($facpw); $p++) echo "*"; ?></td>
                <td id="cllg-center">
                  <a href="./stylesheet/pop/registration/reg-edit.php?GetID=<?php echo $ccid; ?>"
                    ><button type="button" title="Update Information" id="btn-edit"><span class="far fa-pen"></span></button></a
                  >
                </td>
                <td id="cllg-center">
                  <button type="button" title="Remove Account Permanently" id="btn-del" onclick="openModal('<?php echo $ccid ?>')"><span class="far fa-trash"></span></button>
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
              faculty member including:
            </p>
            <input type="text" value="" id="delete-faculty" name="delete-faculty" hidden>
            <br />
            <p>Faculty Data and their IDP schedule data.</p>
            <div class="college-button">
              <button type="button" id="cancel" onclick="closeModal()">
                <span class="fas fa-times"></span> Cancel
              </button>
              <button type="submit" id="submit" name="delete-facu">
                <span class="fas fa-trash"></span> Proceed
              </button>
            </div>
          </form>
        </div>
      </div>
      <script>
        function openModal(x) {
          document.getElementById("modal01").style.display = "block";
          document.getElementById("delete-faculty").value = x;
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
    </main>
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
