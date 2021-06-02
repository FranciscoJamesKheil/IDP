<?php
    session_start();
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }
    if(isset($_POST['submit'])){
        $id = $_POST['idcollege'];
        $cn = $_POST['college-name'];
        
        $sql = "UPDATE `college` SET `college_name`='$cn' WHERE college_id = $id;";

        if(mysqli_query($link, $sql)) {
            header("location: ../../college.php");
        }
        else {
            echo "<div id='container'>";
            echo "<img id='vector' src='../../../font/assets/vector/4565.jpg'>";
            echo "NOTIFICATION: " .mysqli_error($link). ".";
            echo "<br><br>";
            echo "<a href='../../profile.php'><button type='button' id='btn-back'>Back to Registration</button></a>";
            echo "</div>";
        }
    }
    
?>