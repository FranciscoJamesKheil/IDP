<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="./view/font/fontawesome/css/style.css">
    <link rel="icon" href="./view/font/assets/logo/wmsulogo.png">
    <link rel="stylesheet" href="./view/font/fontawesome/css/all.css">
    <title>IDP Generator | Log-in</title>
</head>
<style>
   .box {
      display: none;
      animation: out 0.5s 3s linear forwards;
   }
  .alert {
    margin-top: 20px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    animation: showalert 0.3s linear forwards;
  }
  .notify {
    width: 20rem;
    background: white;
    padding: 5px 10px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: 0px 2px 10px -2px rgb(10,10,10);
  }
  @keyframes showalert {
    0% {
      transform: translateY(-200px) scale(0);
    }
    100% {
      transform: translateY(0) scale(1);
    }
  }
  @keyframes out {
    100% {
      transform: translateY(-200px) scale(0);
    }
  }
  .notify img {
    width: 2rem;
  }
  .notify #message {
    color: rgb(160, 0, 0);
  }
  .notify .fa-key, 
  .notify .fa-envelope,
  .notify .fa-sad-tear {
    color: rgb(160, 0, 0);
  }
</style>
<body ondragstart="return false">
<?php 
    session_start();
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $ptag = ""; //for forgot password that email address doesn't exist.
    
    //submit data
    if(isset($_POST['submit'])) {
      $uname = $_POST['username'];
      $pass = $_POST['password'];
      //invalid
      $vun = "";
      $vpw = "";
      
      $result = $mysqli->query("SELECT * FROM users WHERE user_username='$uname';") or die($mysqli->error);

      while($record = mysqli_fetch_array($result)) { 
        $cut = $record['user_type'];
        $cun = $record['user_username'];
        $cpw = $record['user_password'];
                
        if(($cun === $_POST['username'] && $cpw === $_POST['password']) && $cut === 'admin'){
          $_SESSION['username'] = $_POST['username'];
          header("Location: ./view/admin/dashboard.php");
        }
        else if(($cun === $_POST['username'] && $cpw === $_POST['password']) && $cut === 'faculty'){
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['daynow'] = $_POST['day-now'];
          header("Location: ./view/faculty/dashboard.php");
        }
        else if(($cun === $_POST['username'] && $cpw === $_POST['password']) && $cut === 'general'){
          $_SESSION['username'] = $_POST['username'];
          header("Location: ./view/general/dashboard.php");
        }
        else {
          $vun = $record['user_username'];
          $vpw = $record['user_password'];
        }
      }
      if($uname != $vun && $pass != $vpw) {
        ?>
        <div class="box" id="box">
          <div class="alert">
            <div class="notify">
              <img src="./view/font/assets/vector/notfound.png" alt="">
              <p id="message">Username and Password doesn't exist.</p>
            </div>
          </div>
        </div>
        <script>
          document.getElementById("box").style.display = "block";
          setInterval(() => {
            location.href = "./index.php";
          }, 3500);
        </script>
      <?php
      }
      else if($uname === $vun && $pass != $vpw) {
        $_SESSION['uname'] = $_POST['username'];
        ?>
        <div class="box" id="box">
          <div class="alert">
            <div class="notify">
              <p class="fas fa-key"></p>
              <p id="message">Invalid Password, please try again..</p>
            </div>
          </div>
        </div>
        <script>
          document.getElementById("box").style.display = "block";
          setInterval(() => {
            location.href = "./index.php";
          }, 3500);
        </script>
      <?php
      }
    }
    else if(isset($_POST['forgot-submit'])) {
      $forgotem = $_POST['enter-email'];
 
      $resultem = $mysqli->query("SELECT * FROM faculty WHERE faculty_email='$forgotem';") or die($mysqli->error);
      
      while($recordEM = mysqli_fetch_array($resultem)) {
        $show = $recordEM['faculty_email'];
        $usID = $recordEM['user_id_fk'];
          
        if($show === $_POST['enter-email']){
          $ptag = "Email found!"; //found
          $resultus = $mysqli->query("SELECT * FROM users WHERE user_id =$usID;") or die($mysqli->error);
          
          while($recordEM = mysqli_fetch_array($resultus)) {
            $showUS = $recordEM['user_username'];
            $showPW = $recordEM['user_password'];
          }

          //sending credentials to gmail... if he/she forgot.
                require './view/admin/phpmailer/PHPMailerAutoload.php';
        
                $mail = new PHPMailer;
                
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;         // Enable SMTP authentication
                $mail->Username = 'mjlee32100@gmail.com';  // SMTP username
                $mail->Password = 'mayJane32100m';  // SMTP password
                $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;  // TCP port to connect to
        
                $mail->setFrom('mjlee32100@gmail.com', 'WMSU IDP Online');
                $mail->addAddress($show);  
        
                $mail->isHTML(true); // Set email format to HTML
        
                $mail->Subject = 'WMSU IDP Account';
                $mail->Body    = "<p>Greetings: <br><br> Herewith are your recovered WMSU IDP account access codes: <br><br>Your username is <b>$showUS</b><br>Your password is <b>$showPW</b> <br><br>To login, please go to <a href='wmsuidp.online'>wmsuidp.online</a>
                    <br><br><p>Note:<br>
                    1. The password will be change to your profile settings after loging in.<br>
                    2. The username cannot be change (Unique).<br>
                    3. Create and Keep the records of the Credentials of accounts for future use.<br>
                    4. Please use <b><font color='#4285F4'>G</font><font color='#DB4437'>o</font><font color='#F4B400'>o</font><font color='#4285F4'>g</font><font color='#0F9D58'>l</font><font color='#DB4437'>e</font></b> Chrome browser, if possible.<br>
                    5. Please ignore this message if you already received this message previously.</p>";
        
                $mail->send();
        ?>
          <div class="box" id="box">
            <div class="alert">
              <div class="notify">
                <p class="fas fa-envelope"></p>
                <p id="message">Credentials was successfully sent!</p>
              </div>
            </div>
          </div>
          <script>
            document.getElementById("box").style.display = "block";
            setInterval(() => {
              location.href = "./index.php";
            }, 3500);
          </script>
        <?php
        }
      }
      if($ptag === "") {
        ?>
          <div class="box" id="box">
            <div class="alert">
              <div class="notify">
                <p class="fas fa-sad-tear"></p>
                <p id="message">Email address was not found!</p>
              </div>
            </div>
          </div>
          <script>
            document.getElementById("box").style.display = "block";
            setInterval(() => {
              location.href = "./index.php";
            }, 3500);
          </script>
        <?php
      }
    }
  mysqli_close($mysqli);
?>
  <div class="wrapper">
    <div class="login">
      <form action="./index.php" method="POST">
        <center>
          <img src="./view/font/assets/logo/wmsulogo.png" id="logo" alt="">
        </center>
        <p class="title">Log in</p>
        <p class="tag">INDIVIDUAL DAILY PROGRAM</p>
        <input type="text" id="day-now" name="day-now" style="display: none;">
        <input type="text" placeholder="Username" name="username" id="username" required/>
        <i class="fa fa-user"></i>
        <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required/>
        <i class="fa fa-key"></i>
        <p id="forgot" onclick="iForgot();">Forgot password?</p>
        <button type="submit" name="submit" onclick="myLoading()">
          <span class="state">Log in</span>
        </button>
      </form>
    </div>
  </div>
      <!--Modal for Forgot Password-->
      <div class="modal-container" id="forgot01">
        <div class="modal-forgot">
          <div class="modal-content">
              <form action="./index.php" method="POST">
                <h2>
                  <span class="far fa-surprise"></span> Forgot Password?
                </h2>
                <br />
                <p id="postNote">Enter your email address (based on the IDP faculty email):</p>
                <input type="email" id="enter-email" name="enter-email" onkeyup="showNote()" required>
                <div class="forgot-button">
                  <button type="reset" id="cancel" onclick="closeModal()">
                    <span class="fas fa-times"></span> Cancel
                  </button>
                  <button type="submit" id="submit" name="forgot-submit">
                    <span class="fas fa-check"></span> Submit
                  </button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <!--Modal for Loading-->
      <div class="modal-container" id="loading01">
        <div class="modal-forgot" style="flex-direction: column;">
            <img src="./view/font/assets/icon/loading01.gif" style="width: 3rem; height: 3rem"/>
            <p style="color: white;">Please wait...</p>
        </div>
      </div>
  <script>
    var date = new Date();
    var today = date.getDay();

    //day
    switch (today) {
      case 0:
        today = "SUN";
        break;
      case 1:
        today = "MON";
        break;
      case 2:
        today = "TUE";
        break;
      case 3:
        today = "WED";
        break;
      case 4:
        today = "THU";
        break;
      case 5:
        today = "FRI";
        break;
      case 6:
        today = "SAT";
        break;
    }
    document.getElementById("day-now").value = today;

    //Forgot Password
    function iForgot() {
      document.getElementById("forgot01").style.display = "block";
    }
    function closeModal() {
      document.getElementById("forgot01").style.display = "none";
      document.getElementById("postNote").innerHTML = "Enter your email address (based on the IDP faculty email):";
    }
    function showNote() {
      var a = document.getElementById("enter-email").value;

      if(a!="")
        document.getElementById("postNote").innerHTML = "We will send to you your credentials to this email address:";
      else
        document.getElementById("postNote").innerHTML = "Enter your email address (based on the IDP faculty email):";
    }
    //loading
    function myLoading() {
      var uname = document.getElementById("username").value;
      var upass = document.getElementById("password").value;

      if(uname!="" && upass !="") {
        document.getElementById("loading01").style.display = "block";
      } else {
        document.getElementById("loading01").style.display = "none";
      }
    }
  </script>
</body>
</html>