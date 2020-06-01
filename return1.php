<?php
    session_start();
    require 'dbh.php';
    if(isset($_SESSION['eid']))
    {
        //echo $_SESSION['eid'];
    }
    else
      {
        echo "ERROR: YOU ARE NOT LOGGED IN Please login";
      }
    if (isset($_POST['change']))
    {
          header("LOCATION: update.php");
    }
    if(isset($_POST['eid']))
    {
          $eid=$_POST['eid'];
          $sql="SELECT * FROM registration_info WHERE eid='$eid'";
          $result = mysqli_query($conn,$sql);

    }



?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <meta charset="utf-8">
        <title>RETURN</title>
        <style>
        #head
        {  padding-left: 10px;
            padding-top: 11px;
           display: static;
          background-color: rgb(28, 204, 156);
          padding-bottom: 10px;
          font-family: Oswald,cursive;
          color: White;
        }
        #button {
            background-color: inherit;
            border: none;
            border-bottom: solid;
            border-color: white;
            color: white;
            text-align: center;
              background-color: rgb(28, 204, 156);
          }
          body
          {
            background-color: rgb(197, 206, 207);
            color:black;
            text-align: center;

          }
          #form_div
          {
            margin: auto;
            padding-top: 20px;
            font-size: 16px;
          }
          label,#lable,tr
          {
            text-align: left;
            font-size: 20px;
            margin-top: 12px;
            margin: auto;
          }
          input
          {
            padding-left: 15px;
            margin-top: 8px;
              padding-right: 15px;
          }
          h4
          {
            margin-top: 30px;
            margin-bottom: 20px;
          }
          #body1
          {
            display: none;
          }
        </style>
    </head>
    <body class="container-fluid" id="common">
          <div class="row" id="head">
              <div class="col-md-5">
                    <h5>Central Library Indian Institute of Information Technology Nagpur</h5>
              </div>
              <div class="col-md-3" style="padding-top=29px">
                <h5>Admin Id: <?= $_SESSION['eid'] ?></h5>
              </div>
              <div class="col-md-2">
                <form action="" method="POST">
                <button type = 'submit' name='change' id="button"> Change Contact Details</button>
                </form>
              </div>
              <div class="col-md-1">
                <form action="admin.php">

                  <button type="submit" id="button"> Home </button>
                </form>
              </div>

              <div class="col-md-1">
                <form action="logout.php" method="post">
                  <button type="submit" id="button">Logout </button>
                </form>
              </div>
          </div>

          <div class="row" style="text-align:center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
          <form action="check1.php"method="POST">
              <table id="form_div">
                <form action="check1.php" method="POST">
                  <tr>
                    <h4>Search Results</h4>
                  </tr>
                  <tr>
                    <input type="text" name="eid" value="" placeholder=" New Enrollment ID" required style="width:50%;">
                  </tr>


                <tr>
                  <input type="submit" id="button" name="submit" value="Submit" style="background-color: rgb(28, 204, 156); width:125px" onclick="foo()" >
                </tr>
              </form>
          </table>
        </form>
        <?php
                if(!$row = mysqli_fetch_assoc($result))
                {
                      echo "NO Such Enrollment ID Exists";
                      $first = '';//first name
                      $last = '';//last norme
                      $pwd = '';//password
                      $email = '';//email
                      $cell ='';
                      $b1 ='';
                      $b2 = '';

                }
                else
                {
                              $first = $row['first'];//first name
                              $last = $row['last'];//last norme
                              $pwd = $row['pwd'];//password
                              $email = $row['email'];//email
                              $cell = $row['cell'];//cell no
                              $b1 = $row['book_1'];
                              $b2 = $row['book_2'];

                }
          ?>
          <table style="margin:auto;">
              <tr>
                <h4>Information</h4>
              </tr>
              <tr>
                    <td>
                        <lable id = 'lable'>  Enrollment ID  </lable>
                    </td>
                    <td>
                      <?=$row['eid'] ?> <br>
                    </td>
            </tr>
          <tr>
                    <td>
                        <lable id = 'lable'>  First Name  </lable>
                    </td>
                  <td>
                        <?= $row['first'] ?><br>
                  </td>
          </tr>
          <tr>
                  <td>
                      <lable id = 'lable'>  Last Name </lable>
                  </td>
                  <td>
                      <?=$row['last'] ?><br>
                  </td>
          </tr>
          <tr>
              <td>
                  <lable id = 'lable'>  Email </lable>
              </td>
              <td>
                  <?=$row['email'] ?><br>
              </td>
          </tr>
          <tr>
              <td>
                  <lable id = 'lable'>  Contact Number &nbsp</lable>
              </td>
              <td>
                  <?=$row['cell'] ?><br>
              </td>
          </tr>
          <tr>
              <td>
                  <lable id = 'lable'> Book 1 &nbsp</lable>
              </td>
              <td>
                  <?=$row['book_1'] ?><br>
                <td>
                  <form action="return2.php" method="POST">
                  <button type = 'submit' name='return' id="button" value="<?=$row['book_1'] ?>"> Collect Book 1</button>
                  <input type="hidden" name="eid" value="<?=$row['eid']?>">

                  </form>
                </td>
              </td>
          </tr>
          <tr>
              <td>
                  <lable id = 'lable'>  Book 2 &nbsp</lable>
              </td>
              <td>
                  <?=$row['book_2'] ?><br>
              <td>
                  <form action="return2.php" method="POST">
                  <button type = 'submit' name='return' id="button" value="<?=$row['book_2'] ?>"> Collect Book 2</button>
                  <input type="hidden" name="eid" value="<?=$row['eid']?>">

                  </form>
              </td>
              </td>
          </tr>

          </table>
      </div>
      <div class="col-md-2"></div>
    </div>




    </body>
</html>
