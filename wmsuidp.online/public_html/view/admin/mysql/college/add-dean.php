<?php
    session_start();
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }
    if(isset($_POST['update'])){
        $target = "images/".basename($_FILES['dprofile']['name']);

        $dp=$_FILES['dprofile']['name'];

        $id = $_POST['idcollege'];
        $fn = $_POST['first-name'];
        $ln = $_POST['last-name'];
        $mi = $_POST['middle-initial'];
        $p = $_POST['position'];
        $d = $_POST['degree'];
        
        $sql = $dp != NULL? "UPDATE `dean` SET `dean_firstname`='$fn',`dean_lastname`='$ln',`dean_mi`='$mi',`dean_profile_img`='$dp',`dean_position`='$p',`dean_degree`='$d' WHERE college_id_fk = $id;" : "UPDATE `dean` SET `dean_firstname`='$fn',`dean_lastname`='$ln',`dean_mi`='$mi',`dean_position`='$p',`dean_degree`='$d' WHERE college_id_fk = $id;";

        if(mysqli_query($link, $sql)) {
            //move uploaded logo to the folder
            if(move_uploaded_file($_FILES['dprofile']['tmp_name'], $target))
                echo "Logo uploaded successfully..";
            else 
                echo "There was a problem uploading the logo.";

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