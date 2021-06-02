<?php
    session_start();

    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../index.php");
      die();
    }
    
    $link = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());

    if(isset($_POST['submit'])) {
        $rank_type = $_POST['rank-type'];
        $instruction = $_POST['instruction-wo'];
        $research = $_POST['research-ext-pro-wo'];
        $extension = $_POST['ext-pro-wo'];
        $assurance = $_POST['assurance-wo'];
        $quasi = $_POST['quasi-wo'];
        $lesson = $_POST['lesson-prep-wo'];
        $others = $_POST['others-wo'];

        $sql = $extension != NULL ? "INSERT INTO wodesignation(rank_type, instruction, research_ext_pro, extension, quality_assurance, quasi, lesson_prep, others) VALUES('$rank_type', $instruction, $research, $extension, $assurance, $quasi, $lesson, $others)" : "INSERT INTO wodesignation(rank_type, instruction, research_ext_pro, quality_assurance, quasi, lesson_prep, others) VALUES('$rank_type', $instruction, $research, $assurance, $quasi, $lesson, $others)";

        if(mysqli_query($link, $sql))
            header("location: ../../matrix.php");
        else
            echo "ERROR: Could not be able to execute $sql." .mysqli_error($link);
    }
?>