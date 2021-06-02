<?php
  $mysqli = new mysqli("localhost","u848535889_root","2Rz=;0W|rqU","u848535889_dbwmsuidp") or die($mysqli->error());
  
  session_start();
  $access = $_SESSION['username'];
  
  if(!isset($access))  {
    header("Location: ../../index.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IDP Generator | Matrix</title>
    <link rel="icon" href="../font/assets/logo/wmsulogo.png" />
    <link rel="stylesheet" href="./stylesheet/content/header.css" />
    <link rel="stylesheet" href="./stylesheet/content/matrix.css" />
    <!--extra style-->
    <link rel="stylesheet" href="../font/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../font/preloader/loader.css" />
  </head>
  <body ondragstart="return false" onselectstart="return false">
    <header class="header">
      <a class="logo">
        <img src="../font/assets/logo/wmsulogo.png" class="img-logo" />
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
          <a href="./home.php" id="slide-home">
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
                ><a href="./registration.php" id="slide-registration"
                  ><p class="far fa-pen"></p>
                  Registration</a
                ></span
              >
              <span
                ><a class="active" href="./matrix.php" id="slide-matrix"
                  ><p class="fas fa-cogs"></p>
                  Matrix</a
                ></span
              >
              <span
                ><a href="./officials.php" id="slide-officials"
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
                  href="./mysql/logout.php"
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
        <img src="../font/assets/logo/wmsulogo.png" alt="" />
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
      <script src="../font/preloader/loader.js"></script>
      
      <div class="main">
        <img src="../font/assets/vector/3569142.jpg" id="main-vector" alt="" />
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
              <td>Instruction</td>
              <td>Quasi**</td>
              <td>Lesson Preparation***</td>
              <td>Others****</td>
            </tr>
              <?php
                //view
                $sql = "SELECT * FROM wdesignation";

                $myData = mysqli_query($mysqli,$sql);
                while($record = mysqli_fetch_array($myData)) { 
                  $rt = $record['release_time'];
                  $rep = $record['research_ext_pro'];
                  $af = $record['admin_function'];
                  $i = $record['instruction'];
                  $q = $record['quasi'];
                  $lp = $record['lesson_prep'];
                  $o = $record['others'];
              ?>
            <tr id="color-even">
              <td><?php echo $rt>1 ? "$rt hours" : "$rt hour"?></td>
              <td><?php echo $rep>1 ? "$rep hours" : "$rep hour"?></td>
              <td><?php echo $af>1 ? "$af hours" : "$af hour"?></td>
              <td><?php echo $i>1 ? "$i hours" : "$i hour"?></td>
              <td><?php echo $q>1 ? "$q hours" : "$q hour"?></td>
              <td><?php echo $lp>1 ? "$lp hours" : "$lp hour"?></td>
              <td><?php echo $o>1 ? "$o hours" : "$o hour"?></td>
              <td><a href="./stylesheet/pop/matrix/matrix-edit-0.php?GetID=<?php echo $rt; ?>"><button type="button" title="Update Release Time" id="with-edit"><span class="far fa-pen"></span></button></a></td>
              <td><button type="button" title="Remove Time" id="with-del" onclick="openModal3('<?php echo $rt ?>')"><span class="far fa-trash"></span></button></td>
            </tr>
              <?php 
                } 
                echo "</table>";
              ?>
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
              <?php 
                $result=mysqli_query($mysqli, "SELECT count(*) as total from wodesignation WHERE rank_type='IAAP'");
                $data=mysqli_fetch_assoc($result); 
              ?>
              <td rowspan="<?php echo $data['total']+1 ?>">Instructors or Assistant/ Associate Professor</td> <!--rowcount in database-->
              <?php
                //view
                $sqlIAAP = "SELECT * FROM wodesignation WHERE rank_type = 'IAAP'";
                
                $myDataIAAP = mysqli_query($mysqli,$sqlIAAP);
                while($record = mysqli_fetch_array($myDataIAAP)) {
                  $idwo = $record['id']; 
                  $iwo = $record['instruction'];
                  $repwo = $record['research_ext_pro'];
                  $qawo = $record['quality_assurance'];
                  $qwo = $record['quasi'];
                  $lpwo = $record['lesson_prep'];
                  $owo = $record['others'];
                  echo"<tr>";
              ?>
              <td><?php echo $iwo>1 ? "$iwo hours" : "$iwo hour"?></td>
              <td colspan="2"><?php echo $repwo>1 ? "$repwo hours" : "$repwo hour"?></td>
              <td><?php echo $qawo>1 ? "$qawo hours" : "$qawo hour"?></td>
              <td><?php echo $qwo>1 ? "$qwo hours" : "$qwo hour"?></td>
              <td><?php echo $lpwo>1 ? "$lpwo hours" : "$lpwo hour"?></td>
              <td><?php echo $owo>1 ? "$owo hours" : "$owo hour"?></td>
              <td><a href="./stylesheet/pop/matrix/matrix-edit-1.php?GetID=<?php echo $idwo; ?>"><button type="button" title="Update" id="with-edit"><span class="far fa-pen"></span></button></a></td>
              <td><button type="button" title="Remove" id="with-del" onclick="openModal31('<?php echo $idwo ?>')"><span class="far fa-trash"></span></button></td>
              <?php 
                } 
                echo "</tr>";
              ?>
            </tr>
            <tr>
              <?php 
                $result=mysqli_query($mysqli, "SELECT count(*) as total from wodesignation WHERE rank_type='Professors'");
                $data=mysqli_fetch_assoc($result); 
              ?>
              <td rowspan="<?php echo $data['total']+1 ?>">Professors</td> <!--rowcount in database-->
              
              <?php
                //view
                $sqlProf = "SELECT * FROM wodesignation WHERE rank_type = 'Professors'";
                
                $myDataProf = mysqli_query($mysqli,$sqlProf);
                while($record = mysqli_fetch_array($myDataProf)) { 
                  $idwo = $record['id'];
                  $iwo = $record['instruction'];
                  $repwo = $record['research_ext_pro'];
                  $ewo = $record['extension'];
                  $qawo = $record['quality_assurance'];
                  $qwo = $record['quasi'];
                  $lpwo = $record['lesson_prep'];
                  $owo = $record['others'];
                  echo"<tr>";
              ?>
              <td><?php echo $iwo>1 ? "$iwo hours" : "$iwo hour"?></td>
              <td colspan="2">Research: <?php echo $repwo>1 ? "$repwo hours" : "$repwo hour"?> Extension: <?php echo $ewo>1 ? "$ewo hours" : "$ewo hour"?></td>
              <td><?php echo $qawo>1 ? "$qawo hours" : "$qawo hour"?></td>
              <td><?php echo $qwo>1 ? "$qwo hours" : "$qwo hour"?></td>
              <td><?php echo $lpwo>1 ? "$lpwo hours" : "$lpwo hour"?></td>
              <td><?php echo $owo>1 ? "$owo hours" : "$owo hour"?></td>
              <td><a href="./stylesheet/pop/matrix/matrix-edit-1-1.php?GetID=<?php echo $idwo; ?>"><button type="button" title="Update" id="with-edit"><span class="far fa-pen"></span></button></a></td>
              <td><button type="button" title="Remove" id="with-del" onclick="openModal32('<?php echo $idwo ?>')"><span class="far fa-trash"></span></button></td>
              <?php 
                } 
                echo "</tr>";
              ?>
            </tr>
          </table>
        </div>

        <div class="btn-add"> 
          <button type="button" id="with-add" onclick="openModal2()">Add Time</button>
        </div>
      </section>

      <!--WITH DESIGNATION-->
      <div class="modal-container" id="modal01">
        <div class="modal-content">
          <form action="./mysql/matrix/add-with.php" method="POST">
            <h2><span class="fas fa-cogs"></span> Add New Release Time</h2>
            <div class="content">
              <div class="text-content">
                <label for="">Release Time:</label>
                <input type="number" id="rt" onchange="detect()" name="release-time" placeholder="Hours" required>
              </div>
              <p id="lbl-with">Core Functions</p>
              <div class="text-content">
                <label for="">Research/Extens...:</label>
                <input type="number" id="rep" onchange="detect()" name="research-ext-pro" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="">Admin Functions:</label>
                <input type="number" id="af" onchange="detect()" name="admin-function" placeholder="Hours" required>
              </div>
              <p id="lbl-with">Strategic Functions</p>
              <div class="text-content">
                <label for="">Instructions:</label>
                <input type="number" id="i" onchange="detect()" name="instruction" placeholder="Hours" required>
              </div>
              <p id="lbl-with">Support & Other Functions</p>
              <div class="text-content">
                <label for="">Quasi:</label>
                <input type="number" id="q" onchange="detect()" name="quasi" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="">Lesson Prep:</label>
                <input type="number" id="lp" onchange="detect()" name="lesson-prep" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="">Others:</label>
                <input type="number" id="o" onchange="detect()" name="others" placeholder="Hours" required>
              </div>
            </div>
            <div class="matrix-button">
              <button type="reset" id="cancel" onclick="closeModal()">Cancel</button>
              <button type="submit" id="submit" name="submit">Add Time</button>
            </div>
          </form>
        </div>
      </div>
        <!--WITHOUT DESIGNATION-->
      <div class="modal-container" id="modal02">
        <div class="modal-content">
          <form action="./mysql/matrix/add-without.php" method="POST">
            <h2><span class="fas fa-cogs"></span> Add Rank Attributes</h2>
            <div class="content">
              <div class="text-content">
                <label for="">Rank:</label>
                <select name="rank-type" id="selectBox" onchange="changeFunc();">
                  <option value="IAAP">Instructors/Assistant/Associate Professor</option>
                  <option value="Professors">Professors</option>
                </select>
              </div>
              <p id="lbl-with">Core Functions</p>
              <div class="text-content">
                <label for="">Instruction:</label>
                <input type="number" id="i-wo" onchange="detect()" name="instruction-wo" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="" id="lbl-r">Research/Extens...:</label>
                <input type="number" id="rep-wo" onchange="detect()" name="research-ext-pro-wo" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="" id="lbl-ewo" style="display: none">Extension:</label>
                <input type="number" id="e-wo" hidden="true" onchange="detect()" name="ext-pro-wo" placeholder="Hours">
              </div>
              <p id="lbl-with">Strategic Functions</p>
              <div class="text-content">
                <label for="">Quality Assurance Process:</label>
                <input type="number" id="qa-wo" onchange="detect()" name="assurance-wo" placeholder="Hours" required>
              </div>
              <p id="lbl-with">Support & Other Functions</p>
              <div class="text-content">
                <label for="">Quasi:</label>
                <input type="number" id="q-wo" onchange="detect()" name="quasi-wo" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="">Lesson Prep:</label>
                <input type="number" id="lp-wo" onchange="detect()" name="lesson-prep-wo" placeholder="Hours" required>
              </div>
              <div class="text-content">
                <label for="">Others:</label>
                <input type="number" id="o-wo" onchange="detect()" name="others-wo" placeholder="Hours" required>
              </div>
            </div>
            <div class="matrix-button">
              <button type="reset" id="cancel" onclick="closeModal()">Cancel</button>
              <button type="submit" id="submit" name="submit">Add Time</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        function detect() {
          var rt = document.getElementById("rt").value;
          var rep = document.getElementById("rep").value;
          var af = document.getElementById("af").value;
          var i = document.getElementById("i").value;
          var q = document.getElementById("q").value;
          var lp = document.getElementById("lp").value;
          var o = document.getElementById("o").value;
          //without
          var iwo = document.getElementById("i-wo").value;
          var repwo = document.getElementById("rep-wo").value;
          var ewo = document.getElementById("e-wo").value;
          var ewo = document.getElementById("e-wo").value;
          var qawo = document.getElementById("qa-wo").value;
          var qwo = document.getElementById("q-wo").value;
          var lpwo = document.getElementById("lp-wo").value;
          var owo = document.getElementById("o-wo").value;

          if(rt<0 || rep<0 || af<0 || i<0 || q<0 || lp<0 || o<0 || iwo<0 || repwo<0 || ewo<0 || qawo<0 || qwo<0 || lpwo<0 || owo<0) {
            alert("Invalid value: Negative Hour...");
            document.getElementById("rt").value = "";
            document.getElementById("rep").value = "";
            document.getElementById("af").value = "";
            document.getElementById("i").value = "";
            document.getElementById("q").value = "";
            document.getElementById("lp").value = "";
            document.getElementById("o").value = "";
            //without
            document.getElementById("i-wo").value = "";
            document.getElementById("rep-wo").value = "";
            document.getElementById("e-wo").value = "";
            document.getElementById("qa-wo").value = "";
            document.getElementById("q-wo").value = "";
            document.getElementById("lp-wo").value = "";
            document.getElementById("o-wo").value = "";
          } 
        }
        function changeFunc() {
          var selectBox = document.getElementById("selectBox");
          var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                  
          if(selectedValue === "Professors") {
            document.getElementById("e-wo").style.display = "block";
            document.getElementById("e-wo").hidden = "false";
            document.getElementById("e-wo").required = "true";
            document.getElementById("lbl-r").innerHTML = "Research:";
            document.getElementById("lbl-ewo").style.display = "block";
          }
          else {
            document.getElementById("e-wo").style.display = "none";
            document.getElementById("e-wo").hidden = "true";
            document.getElementById("e-wo").disabled = "true";
            document.getElementById("lbl-r").innerHTML = "Research/Extens...:";
            document.getElementById("lbl-ewo").style.display = "none";
          }
        }
      </script>
        <!--DELETE TIME FOR WITH DESIGNATION-->
      <div class="modal-container" id="modal03">
            <br><br>
            <br><br>
            <br><br>
        <div class="modal-content">
          <form action="./mysql/matrix/delete-with.php" method="POST">
            <h2><span class="fas fa-exclamation"></span> Please Confirm:</h2>
            <br>
            <p>Release Time and Attibutes</p>
            <input type="text" value="" id="with-delete-id" name="with-delete" hidden>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()"><span class="fas fa-times"></span> Cancel</button>
              <button type="submit" id="submit" name="delete"><span class="fas fa-check"></span> Remove</button>
            </div>
          </form>
        </div>
      </div>
        <!--DELETE TIME FOR WITHOUT DESIGNATION (Instructors)-->
      <div class="modal-container" id="modal031">
            <br><br>
            <br><br>
            <br><br>
        <div class="modal-content">
          <form action="./mysql/matrix/delete-without-one.php" method="POST">
            <h2><span class="fas fa-exclamation"></span> Please Confirm:</h2>
            <br>
            <input type="text" value="" id="without-delete-id" name="without-delete" hidden>
            <p>Instructors or Assistant / Associate Professor Attibute</p>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()"><span class="fas fa-times"></span> Cancel</button>
              <button type="submit" id="submit" name="delete"><span class="fas fa-check"></span> Remove</button>
            </div>
          </form>
        </div>
      </div>
        <!--DELETE TIME FOR WITHOUT DESIGNATION (Professor)-->
      <div class="modal-container" id="modal032">
            <br><br>
            <br><br>
            <br><br>
        <div class="modal-content">
          <form action="./mysql/matrix/delete-without-two.php" method="POST">
            <h2><span class="fas fa-exclamation"></span> Please Confirm:</h2>
            <br>
            <input type="text" value="" id="without-delete-id-two" name="without-delete-two" hidden>
            <p>Professor Attibute</p>
            <div class="matrix-button">
              <button type="button" id="cancel" onclick="closeModal()"><span class="fas fa-times"></span> Cancel</button>
              <button type="submit" id="submit" name="delete-two"><span class="fas fa-check"></span> Remove</button>
            </div>
          </form>
        </div>
      </div>
    <script>
      function openModal() {
        document.getElementById('modal01').style.display='block';
        document.getElementById('modal02').style.display='none';
        document.getElementById('modal03').style.display='none';
        document.getElementById('modal031').style.display='none';
        document.getElementById('modal032').style.display='none';
      }
      function openModal2() {
        document.getElementById('modal01').style.display='none';
        document.getElementById('modal02').style.display='block';
        document.getElementById('modal03').style.display='none';
        document.getElementById('modal031').style.display='none';
        document.getElementById('modal032').style.display='none';
      }
      function openModal3(a) {
        document.getElementById('modal01').style.display='none';
        document.getElementById('modal02').style.display='none';
        document.getElementById('modal03').style.display='block';
        document.getElementById('modal031').style.display='none';
        document.getElementById('modal032').style.display='none';
        document.getElementById('with-delete-id').value = a;
      }
      function openModal31(b) {
        document.getElementById('modal01').style.display='none';
        document.getElementById('modal02').style.display='none';
        document.getElementById('modal03').style.display='none';
        document.getElementById('modal031').style.display='block';
        document.getElementById('modal032').style.display='none';
        document.getElementById('without-delete-id').value = b;
      }
      function openModal32(c) {
        document.getElementById('modal01').style.display='none';
        document.getElementById('modal02').style.display='none';
        document.getElementById('modal03').style.display='none';
        document.getElementById('modal031').style.display='none';
        document.getElementById('modal032').style.display='block';
        document.getElementById('without-delete-id-two').value = c;
      }

      /*CLOSE MODAL*/
      function closeModal() {
        document.getElementById('modal01').style.display='none';
        document.getElementById('modal02').style.display='none';
        document.getElementById('modal03').style.display='none';
        document.getElementById('modal031').style.display='none';
        document.getElementById('modal032').style.display='none';
      }
    </script>
      <footer>
        <p><img id="img-footer" src="../font/assets/logo/wmsulogo.png" alt="IDP">All Rights Reserved &copy 2021 WMSU IDP <img id="img-footer" src="../font/assets/logo/idplogo.png" alt="IDP"></p>
      </footer>
    </main>
    <?php
      mysqli_close($mysqli);
    ?>
  </body>
</html>
