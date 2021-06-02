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
        header("Location: ../../../../../index.php");
        die();
        }
        if(isset($_POST['overload-submit'])){
            $id = $_POST['overload-id-o'];
            $od = $_POST['overload-day'];
            $osub = $_POST['overload-subject'];
            $osec = $_POST['overload-section'];
            $osubid = $_POST['overload-subject-id'];
            $ostud = $_POST['overload-students'];
            $oroom = $_POST['overload-room'];
            $ohours = $_POST['overload-hours-put'];
            
            $hoursFrom = $_POST['overload-from-time'];
            $hoursTo = $_POST['overload-to-time'];
            $timefrom = gmdate('H:i', floor($hoursFrom * 3600)) < 12 ? gmdate('h:i', floor($hoursFrom * 3600)) . " AM" : gmdate('h:i', floor($hoursFrom * 3600)) . " PM"; 
            $timeto = gmdate('H:i', floor($hoursTo * 3600)) < 12 ? gmdate('h:i', floor($hoursTo * 3600)) . " AM" : gmdate('h:i', floor($hoursTo * 3600)) . " PM";   
            $otime = "$timefrom - $timeto";

            $sql = "INSERT INTO `overload`(`faculty_id_fk`, `sched_day`, `sched_subject`, `sched_section`, `sched_subject_id`, `sched_no_students`, `sched_time`, `sched_room`, `sched_hours`, `time_from`, `time_to`)
             VALUES ($id, '$od', '$osub', '$osec', '$osubid', '$ostud', '$otime', '$oroom', $ohours, $hoursFrom,$hoursTo)";

            if(mysqli_query($link, $sql)) {
            ?>
            <script>
                location.href = "../../tuesday.php";
            </script>
            <?php
            }
            else {
                echo "<body style='background: rgb(254,241,238);'>";
                echo "<div id='container'>";
                echo "<img id='vector' src='../../../../font/assets/vector/sad.gif'>";
                echo "NOTIFICATION: " .mysqli_error($link). ".";
                echo "<br><br>";
                echo "<a href='../../tuesday.php'><button type='button' id='btn-back'>Back to Tuesday</button></a>";
                echo "</div>";
            }
        }
    ?>
</body>
</html>