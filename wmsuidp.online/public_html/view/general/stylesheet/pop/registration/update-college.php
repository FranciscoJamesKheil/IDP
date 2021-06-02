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
        $nan = $_POST['new-admin-name'];
        $nap = $_POST['new-admin-pw'];
        $cid = $_POST['college-id'];
        $ncl = $_POST['new-college-logo'];
        $ncn = $_POST['new-college-name'];

        $sql = "UPDATE `users` SET `user_name`='$nan',`user_password`='$nap' WHERE user_type='admin' AND college_id_fk = $cid";
        $sqlCollege = $ncl!=NULL? "UPDATE `college` SET `college_logo`='$ncl',`college_name`='$ncn' WHERE college_id = $cid" : "UPDATE `college` SET `college_name`='$ncn' WHERE college_id = $cid";

        if(mysqli_query($link, $sql) && mysqli_query($link, $sqlCollege)) {
        ?>
            <div id="container">
                <img id="success-vector" src="../../../../font/assets/icon/success.gif" alt="">
                <h4>SAVED!</h4>
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
            echo "NOTIFICATION: College name was already exist.";
            echo "<br><br>";
            echo "<a href='../../../registration.php'><button type='button' id='btn-back'>Back to Registration</button></a>";
            echo "</div>";
        }
    }
?>

</body>
</html>