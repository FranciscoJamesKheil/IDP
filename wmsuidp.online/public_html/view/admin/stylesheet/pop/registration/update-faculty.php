<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #container {
        position: absolute;
        height: 100%; 
        width: 100%; 
        display: flex; 
        justify-content: center; 
        align-items:center; 
        font-size: 16px; 
        flex-direction: column;
    }
    #btn-back {
        cursor: pointer;
        padding: 5px 10px;
        background: rgb(160,0,0);
        border: none;
        outline-color: orange;
        color: white;
    }
    #btn-back:hover {
        box-shadow: 0px 0px 10px -2px rgb(90,90,90);
        background: white;
        color: rgb(160,0,0);
    }
    #vector {
        width: 15rem;
    }
    #success-vector {
        width: 10rem;
    }
    h4 {
        color: green;
        text-transform: uppercase;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../../font/assets/logo/wmsulogo.png" />
    <title>Notification</title>
</head>
<body>
    
<?php
    session_start();
    
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    if(isset($_POST['update'])) {
        $uid = $_POST['uid'];
        $new_fn = $_POST['first-name'];
        $new_ln = $_POST['last-name'];
        $new_mi = $_POST['middle-initial'];
        $new_e = $_POST['email'];
        $un = $_POST['username'];
        $new_pw = $_POST['password'];

        $sql = "UPDATE `faculty` SET `faculty_firstname`='$new_fn',`faculty_lastname`='$new_ln',`faculty_mi`='$new_mi', faculty_email='$new_e' WHERE user_id_fk = $uid";
        $sqlUsers = "UPDATE `users` SET user_password = '$new_pw' WHERE user_id = $uid";

        if(mysqli_query($link, $sql) && mysqli_query($link, $sqlUsers)) {
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
                $mail->addAddress($new_e);  
        
                $mail->isHTML(true); // Set email format to HTML
        
                $mail->Subject = 'WMSU IDP Account';
                $mail->Body    = "<p>Greetings: <br><br> Herewith are your WMSU IDP account access codes have been updated: <br><br>Your username is <b>$un</b><br>Your password is <b>$new_pw</b> <br><br>To login, please go to <a href='wmsuidp.online'>wmsuidp.online</a>
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
        
            <div id="container">
                <img id="success-vector" src="../../../../font/assets/icon/success.gif" alt="">
                <h4>Saved!</h4>
            </div>
            <script>
                setInterval(() => {
                    location.href = "../../../registration.php";
                }, 3000);
            </script>
        <?php   
        }
        else {
            echo "<body style='background: rgb(254,241,238);'>";
            echo "<div id='container'>";
            echo "<img id='vector' src='../../../../font/assets/vector/sad.gif'>";
            echo "NOTIFICATION: " .mysqli_error($link). ".";
            echo "<br><br>";
            echo "<a href='../../../registration.php'><button type='button' id='btn-back'>Back to Registration</button></a>";
            echo "</div>";
        }
    }
?>
</body>
</html>