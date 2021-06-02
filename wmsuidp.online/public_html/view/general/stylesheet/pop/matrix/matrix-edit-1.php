<?php
    session_start();
    $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
    
    $access = $_SESSION['username'];
    
    if(!isset($access))  {
      header("Location: ../../../../../index.php");
      die();
    }
    
	  $id = $_GET['GetID'];
    $sql = "SELECT * FROM wodesignation WHERE id= '". $id . "' AND rank_type='IAAP';";
    
    $myData = mysqli_query($mysqli,$sql);

    while($record = mysqli_fetch_assoc($myData)){
      $i = $record['instruction'];
      $rep = $record['research_ext_pro'];
      $qa = $record['quality_assurance'];
      $q = $record['quasi'];
      $lp = $record['lesson_prep'];
      $o = $record['others'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Matrix</title>
    <link rel="icon" href="../../../../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="../../../stylesheet/content/header.css" />
    <link rel="stylesheet" href="../../../stylesheet/content/matrix.css" />
    <link rel="stylesheet" href="../matrix/modal/modal.css">
    <!--extra style-->
    <link rel="stylesheet" href="../../../../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../../../font/preloader/loader.css" />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../../../../font/assets/logo/wmsulogo.png" class="img-logo" />
        <div class="logo-text">
          WMSU
          <p>INDIVIDUAL DAILY PROGRAM</p>
        </div>
      </a>
      <div class="pG">
        <p id="page-title">Matrix</p>
      </div>
      <input type="checkbox" class="menu-btn" id="menu-btn" />
      <label for="menu-btn" class="menu-icon">
        <span class="nav-icon"></span>
      </label>
      <ul class="menu">
        <li id="dashboard-mobile">
          <a href="./home.php" id="slide-dashboard">
            <p class="far fa-home"></p>
            Home
          </a>
        </li>
        <li id="dashboard-mobile">
          <a href="./dashboard.php" id="slide-dashboard">
            <p class="far fa-tachometer-alt"></p>
            Dashboard
          </a>
        </li>
        <li id="settings-mobile">
          <div class="dropdown-nav">
            <p class="far fa-cog"></p>
            <div class="dropdown-content-nav">
              <span
                ><a href="./registration.php" id="slide-matrix"
                  ><p class="far fa-pen"></p>
                  Registration</a
                ></span
              >
              <span
                ><a class="active" href="./matrix.php" id="slide-member"
                  ><p class="fas fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="./officials.php" id="slide-member"
                  ><p class="far fa-users"></p>
                  University Officials</a
                ></span
              >
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown-nav">
            <p class="far fa-user-circle"></p>
            <div class="dropdown-content-nav">
              <span
                ><a href="./profile.php" id="slide-profile"
                  ><p class="far fa-user-cog"></p>
                  Profile</a
                ></span
              >
              <br />
              <span
                ><a
                  href="../../../mysql/logout.php"
                  id="slide-sign-out"
                  class="bdr-top-line"
                  ><p class="far fa-sign-out"></p>
                  Logout</a
                ></span
              >
            </div>
          </div>
        </li>
      </ul>
    </header>
    <nav class="side-nav">
      <div class="side-nav-logo">
        <img src="../../../../font/assets/logo/wmsulogo.png" class="img-logo" />
        <p>WMSU IDP Generator</p>
      </div>
      <ul>
        <a href="./home.php"
          ><li><span class="far fa-home"></span>Home</li></a
        >
        <a href="./dashboard.php"
          ><li><span class="far fa-tachometer-alt"></span>Dashboard</li></a
        >
        <a href="./registration.php"
          ><li><span class="far fa-pen"></span>Registration</li></a
        >
        <a href="./matrix.php"
          ><li class="active-sn"><span class="fas fa-cogs"></span>Matrix</li></a
        >
        <a href="./officials.php"
          ><li><span class="far fa-users"></span>University Officials</li></a
        >
      </ul>
    </nav>
    <main>
      <!--preloader-->
      <div class="loader">
        <div class="preloadermain">
          <div class="precircle"></div>
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
        <div class="preloadermain1">
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
        <div class="preloadermain">
          <div class="preloader01"></div>
          <div class="preloader02"></div>
          <div class="preloader03"></div>
          <div class="preloader02"></div>
        </div>
      </div>
      <script src="../../../../font/preloader/loader.js"></script>

      <div class="main">
        <img src="../../../../font/assets/vector/3569142.jpg" id="main-vector" alt="" />
        <div class="matrix-para">
          <h2>Criteria for Faculty Evaluation</h2>
          <br>
          <p>Quality Assurance refers to the individual involvement of faculty in</p>
          <ol type="a">
            <li>Curriculum Revision</li>
            <li>Syllabi Enhancement</li>
            <li>Involvement in Program Accreditation</li>
          </ol>
          <p>Quasi Teaching refers to student consultation or advising</p>
          <p>Lesson Preparation refers to the lesson preparation, preparation of teaching materials and student evaluation</p>
          <p>Others refers to DTR preparation, reports, meetings and attendance to academic and social functions</p>
        </div>
        <div class="ani">
          <span id="aniclock" class="far fa-cog"></span>
          <span id="aniclock1" class="fas fa-cog"></span>
          <span id="aniclock" class="far fa-cog"></span>
        </div>
      </div>
      <section>
        <div class="table">
          <table border="1" class="tbl">
            <tr>
              <th colspan="9" id="header">Faculty with Designation</th>
            </tr>
            <tr id="color-header">
              <th rowspan="2">Release Time</th>
              <th colspan="2">Core Functions</th>
              <th>Strategic Functions</th>
              <th colspan="3">Support and Other Functions</th>
              <th rowspan="2" colspan="2">Action</th>
            </tr>
            <tr id="color-header">
              <td>Research, Extension or Production</td>
              <td>Admin Function</td>
              <td>Instrution</td>
              <td>Quasi**</td>
              <td>Lesson Preparation***</td>
              <td>Others****</td>
            </tr>
            <tr id="color-even">
              <td>3 hours</td>
              <td>4 hours</td>
              <td>6 hours</td>
              <td>15 hours</td>
              <td>6 hours</td>
              <td>5 hours</td>
              <td>4 hours</td>
              <td><button id="with-edit">Update</button></td>
              <td><button id="with-del">Delete</button></td>
            </tr>
          </table>
        </div>
        <div class="btn-add"> 
          <button id="with-add" onclick="openModal()">Add Release Time</button>
        </div>
      </section>
      <section>
        <div class="table">
          <table border="1" class="tbl">
            <tr>
              <th colspan="10" id="header">Faculty without Designation</th>
            </tr>
            <tr id="color-header">
              <th rowspan="2">Rank</th>
              <th colspan="3">Core Functions</th>
              <th>Strategic Functions</th>
              <th colspan="3">Support and Other Functions</th>
              <th colspan="2" rowspan="2">Action</th>
            </tr>
            <tr id="color-header">
              <th>Instruction</th>
              <td colspan="2">Research, Extension or Production</td>
              <td>Quality Assurance Process</td>
              <td>Quasi**</td>
              <td>Lesson Preparation***</td>
              <td>Others****</td>
            </tr>
            <tr>
              <td rowspan="1">Instructors or Assistant/ Associate Professor</td> <!--rowcount in database-->
              <td>18 hours</td>
              <td colspan="2">8 hours</td>
              <td>2 hours </td>
              <td>4 hours</td>
              <td>6 hours</td>
              <td>2 hours</td>
              <td><button id="with-edit">Update</button></td>
              <td><button id="with-del">Delete</button></td>
            </tr>
            <tr>
              <td rowspan="1">Professor</td> <!--rowcount in database-->
              <td>18 hours</td>
              <td>6 hours</td>
              <td>6 hours</td>
              <td>2 hours</td>
              <td>2 hours</td>
              <td>5 hours</td>
              <td>1 hour</td>
              <td><button id="with-edit">Update</button></td>
              <td><button id="with-del">Delete</button></td>
            </tr>
          </table>
        <div>
        <div class="btn-add"> 
          <button id="with-add" onclick="openModal2()">Add Rank</button>
        </div>
      </section><div class="modal-container" id="modal01">
        <div class="modal-content">
          <form action="./update-matrix-1.php" method="POST">
            <h2><span class="fas fa-cogs"></span> Update Attributes</h2>
            <input type="text" value="<?php echo $id ?>" name="idwo" hidden>
            <div class="content">
              <div class="text-content">
                <label for="">Rank:</label>
                <input type="text" value="Instructors/Assistant/Associate Proffesor" disabled/>
              </div>
              <p id="lbl-with">Core Functions</p>
              <div class="text-content">
                <label for="">Instruction:</label>
                <input type="number" onchange="detect()" id="i" value="<?php echo $i ?>" name="instruction" placeholder="Hours">
              </div>
              <div class="text-content">
                <label for="">Research/Extens...:</label>
                <input type="number" onchange="detect()" id="rep" value="<?php echo $rep ?>" name="research-ext-pro" placeholder="Hours">
              </div>
              <p id="lbl-with">Strategic Functions</p>
              <div class="text-content">
                <label for="">Quality Assurance Process:</label>
                <input type="number" onchange="detect()" id="qa" value="<?php echo $qa ?>" name="assurance" placeholder="Hours">
              </div>
              <p id="lbl-with">Support & Other Functions</p>
              <div class="text-content">
                <label for="">Quasi:</label>
                <input type="number" onchange="detect()" id="q" value="<?php echo $q ?>" name="quasi" placeholder="Hours">
              </div>
              <div class="text-content">
                <label for="">Lesson Prep:</label>
                <input type="number" onchange="detect()" id="lp" value="<?php echo $lp ?>" name="lesson-prep" placeholder="Hours">
              </div>
              <div class="text-content">
                <label for="">Others:</label>
                <input type="number" onchange="detect()" id="o" value="<?php echo $o ?>" name="others" placeholder="Hours">
              </div>
            </div>
            <div class="matrix-button">
              <a href="../../../matrix.php"><button type="button" id="cancel">Cancel</button></a>
              <button type="submit" id="submit" name="update">Update</button>
            </div>
          </form>
        </div>
      </div>
      <script>
      function detect() {
        var i = document.getElementById("i").value;
        var rep = document.getElementById("rep").value;
        var qa = document.getElementById("qa").value;
        var q = document.getElementById("q").value;
        var lp = document.getElementById("lp").value;
        var o = document.getElementById("o").value;

        if(i<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("i").value = <?php echo $i ?>;
        }
        else if(rep<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("rep").value = <?php echo $rep ?>;
        }
        else if(qa<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("qa").value = <?php echo $qa ?>;
        }
        else if(q<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("q").value = <?php echo $q ?>;
        }
        else if(lp<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("lp").value = <?php echo $lp ?>;
        }
        else if(o<0) {
          alert("Invalid value: Negative Hour...");
          document.getElementById("o").value = <?php echo $o ?>;
        }

      }
      </script>
      <footer>
        <p><img id="img-footer" src="../../../../font/assets/logo/wmsulogo.png" alt="IDP">All Rights Reserved &copy 2021 WMSU IDP <img id="img-footer" src="../../../../font/assets/logo/idplogo.png" alt="IDP"></p>
      </footer>
    </main>
  </body>
</html>
