<?php
    session_start();
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }
    if(isset($_POST['submit'])){
        //path to store the profile img
        $target = "images/".basename($_FILES['image']['name']);
        
        $image=$_FILES['image']['name'];
        
        $sql = "UPDATE `users` SET `user_profile_pic`='$image' WHERE user_type = 'faculty' AND user_username = '$access';";

        //move uploaded profile to the folder
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Profile Picture uploaded successfully..";
            mysqli_query($link, $sql);
            header("location: ../../profile.php");
        }
        else 
            echo "There was a problem uploading the profile picture.";
    }
    
?>