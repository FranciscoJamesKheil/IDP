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

    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }
    
    if(isset($_POST['overload-update'])) {
        $id = $_POST['overload-schedid-update'];
        $a = $_POST['overload-day-update'];
        $b = $_POST['overload-subject-update'];
        $c = $_POST['overload-section-update'];
        $bb = $_POST['overload-subjectID-update'];
        $d = $_POST['no-studs-ol-edit'];
        $e = $_POST['overload-room-update'];
        $f = $_POST['ol-hours-edit-put'];
        $hoursFrom = $_POST['time-from-ol-edit'];
        $hoursTo = $_POST['time-to-ol-edit'];
        $timefrom = gmdate('H:i', floor($hoursFrom * 3600)) < 12 ? gmdate('h:i', floor($hoursFrom * 3600)) . " AM" : gmdate('h:i', floor($hoursFrom * 3600)) . " PM"; 
        $timeto = gmdate('H:i', floor($hoursTo * 3600)) < 12 ? gmdate('h:i', floor($hoursTo * 3600)) . " AM" : gmdate('h:i', floor($hoursTo * 3600)) . " PM"; 
        $g = "$timefrom - $timeto";

        $sql = "UPDATE `overload` SET `sched_day`='$a',`sched_subject`='$b',`sched_section`='$c',`sched_subject_id`='$bb',`sched_no_students`='$d',`sched_time`='$g',`sched_room`='$e',`sched_hours`='$f',`time_from`='$hoursFrom',`time_to`='$hoursTo' WHERE sched_id = $id";

        if(mysqli_query($link, $sql)) {
                ?>
                <script>
                    location.href = "../../thursday.php";
                </script>
                <?php
        }
        else {
            echo "<body style='background: rgb(254,241,238);'>";
            echo "<div id='container'>";
            echo "<img id='vector' src='../../../../font/assets/vector/sad.gif'>";
            echo "NOTIFICATION: " .mysqli_error($link). ".";
            echo "<br><br>";
            echo "<a href='../../thursday.php'><button type='button' id='btn-back'>Back to Thursday</button></a>";
            echo "</div>";
        }
    }
?>
</body>
</html>