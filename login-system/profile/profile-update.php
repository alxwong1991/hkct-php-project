<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/profile-update.css">
  <title>Document</title>
</head>

<body>
  <section class="tabs">
    <h1>Update Your Profile</h1>
    <div class="profile-img">
      <!-- <img width="100" height="100" src="../assets/img/profile.jpg" alt="profile"> -->

      <?php
      require_once '../php/dbh.inc.php';
      $iid = $_SESSION["userid"];
      $sql = "SELECT * FROM users WHERE usersId ='$iid' ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['usersId'];
          $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
          $resultImg = mysqli_query($conn, $sqlImg);
          $rowImg = mysqli_fetch_assoc($resultImg);
          echo "<div>";
          // echo "<img width='100' height='100' src='../assets/img/profile.jpg' alt='profile'>";
          if ($rowImg['zt'] == 0) {
            // echo "<div >
            //       <img width='100' height='auto' class='pofile-img'  src='./upload/profile" . $id . ".jpg?'" . mt_rand() . mt_rand() . mt_rand() . ">";
            echo "<img width='100' height='auto' class='pofile-img' src='./upload/profile" . $id . ".jpg?'" . mt_rand() . mt_rand() . mt_rand() . ">";
          } else {
            echo "<img width='100' height='auto' class='pofile-img' src='./upload/pro.jpg'>";
          }
          echo "</div>";
        }
      } else {
        echo "There are no users yet";
      }
      ?>

    </div>
    <div class="wrapper">
      <div class="form">
        <div class="title">Please fill to use upload image</div>

        <form action="../php/img.inc.php" method="post">
          <div class="inputfield">
            <input type="text" name="uid" placeholder="Username" class="input">
          </div>
          <div class="inputfield">
            <input type="password" name="pwd" placeholder="Password" class="input">
          </div>
          <div class="inputfield terms">
            <label class="check">
              <input type="checkbox" />
              <span class="checkmark"></span>
            </label>
            <p>Agreed to terms and conditions</p>
          </div>
          <div class="inputfield">
            <input type="submit" name="submit" class="btn btn-submit" />
          </div>
        </form>

        <form action="" method="post">
          <div class="title" style="margin-top: 1em;">Change Uid</div>
          <div class="inputfield">
            <label>Your current uid:
              <?php
              if (isset($_SESSION["useruid"])) {
                echo $_SESSION["useruid"];
              }
              ?>
            </label>
          </div>
          <div class="inputfield">
            <input type="text" name="uid" placeholder="Old Uid" class="input">
          </div>
          <div class="inputfield">
            <input type="text" name="nid" placeholder="New Uid" class="input">
          </div>
          <div class="inputfield">
            <input type="password" name="pwd" placeholder="Password" class="input">
          </div>
          <div class="inputfield">
            <input type="submit" value="submit" class="btn btn-submit" />
          </div>
        </form>





        <!-- <form action="" method="post">
          <div class="title" style="margin-top: 1em;">Change Email</div>
          <div class="inputfield">
            <label>Your current email:
              <?php
              if (isset($_SESSION["useruid"])) {
                echo $_SESSION["useremail"];
              }
              ?>
            </label>
          </div>
          <div class="inputfield">
            <input type="text" name="uid" placeholder="Old Email" class="input">
          </div>
          <div class="inputfield">
            <input type="text" name="email" placeholder="New Email" class="input">
          </div>
          <div class="inputfield">
            <input type="password" name="pwd" placeholder="Password" class="input">
          </div>
          <div class="inputfield">
            <input type="submit" value="submit" class="btn btn-submit" />
          </div>
        </form> -->

        <?php
        if (isset($_SESSION['useruid'])) {
          echo "<form action='../php/upload.php' method='POST' enctype='multipart/form-data'>
                <div class='title' style='margin-top: 1em;'>Upload Image</div>
                  <div class='inputfield'>
                  <input type='file' name='file' id='actual-btn' hidden/>
                  <label class='btn-customize btn-submit' for='actual-btn'>Choose File</label>
                  <span id='file-chosen'>No file chosen</span>
                  </div>
                  <div class='inputfield'>
                      <input type='submit' name='submit' class='btn btn-submit' />
                  </div>
                </form>
                <script>
                const actualBtn = document.getElementById('actual-btn');
                const fileChosen = document.getElementById('file-chosen');

                actualBtn.addEventListener('change', function(){
                  fileChosen.textContent = this.files[0].name
                })
                </script>
                ";
        } else {
          echo "You are not logged in!";
        }
        ?>
      </div>
    </div>
  </section>
</body>

</html>