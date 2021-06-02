
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
</style>
<?php
    session_start();
    
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
    if(isset($_POST['update'])) {
      $oid = $_POST['officials-id'];
      $ofn = $_POST['first-name'];
      $oln = $_POST['last-name'];
      $omi = $_POST['middle-initial'];
      $op = $_POST['position'];
      $od = $_POST['degree'];

        $sql = "UPDATE `officials` SET `officials_firstname`='$ofn',`officials_lastname`='$oln',`officials_mi`='$omi',`officials_position`='$op',`officials_degree`='$od' WHERE officials_id = $oid";

        if(mysqli_query($link, $sql)) {
            header("location: ../../../officials.php");
        }
        else {
            echo "<div id='container'>";
            echo "<img id='vector' src='../../../../font/assets/vector/3567828.jpg'>";
            echo "NOTIFICATION: " .mysqli_error($link). ".";
            echo "<br><br>";
            echo "<a href='../../../officials.php'><button type='button' id='btn-back'>Back to Registration</button></a>";
            echo "</div>";
        }
    }
?>