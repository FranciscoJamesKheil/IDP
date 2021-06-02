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
        //path to store the profile img
        $target = "../../../general/mysql/registration/images/".basename($_FILES['image']['name']);
        
        $image=$_FILES['image']['name'];
        
        $sql = "UPDATE `college` SET `college_logo`='$image' WHERE college_id = $id;";
        mysqli_query($link, $sql);

        //move uploaded profile to the folder
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "College Logo uploaded successfully..";
            header("location: ../../college.php");
        }
        else 
            echo "There was a problem uploading the college logo.";
    }
    
?>