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
    
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    //real
    $id = $_POST['id'];

    if(isset($_POST['update'])) {
        $rt = $_POST['release-time'];
        $rep = $_POST['research-ext-pro'];
        $af = $_POST['admin-function'];
        $i = $_POST['instruction'];
        $q = $_POST['quasi'];
        $lp = $_POST['lesson-prep'];
        $o = $_POST['others'];

        $sql = "UPDATE `wdesignation` SET `release_time`=$rt,`research_ext_pro`=$rep,`admin_function`=$af,`instruction`=$af,`quasi`=$q,`lesson_prep`=$lp,`others`=$o WHERE release_time=$id";

        if(mysqli_query($link, $sql) && mysqli_query($link, $sql))
            header("location: ../../../matrix.php");
        else {
            echo "<div id='container'>";
            echo "<img id='vector' src='../../../../font/assets/vector/3567828.jpg'>";
            echo "NOTIFICATION: " .mysqli_error($link). ".";
            echo "<br><br>";
            echo "<a href='../../../matrix.php'><button type='button' id='btn-back'>Back to Registration</button></a>";
            echo "</div>";
        }
    }
?>