<?php
    session_start();

    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }

    if(isset($_POST['submit'])) {
        $firstname = $_POST['first-name'];
        $mi = $_POST['middle-initial'];
        $lastname = $_POST['last-name'];
        $position = $_POST['position'];
        $degree = $_POST['degree'];

        $sql = "INSERT INTO officials(officials_firstname, officials_lastname, officials_mi, officials_position, officials_degree) VALUES('$firstname', '$lastname', '$mi', '$position', '$degree')";

        if(mysqli_query($link, $sql))
            header("location: ../../officials.php");
        else
            echo "ERROR: Could not be able to execute $sql." .mysqli_error($link);
    }
?>