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


    $eid = $_SESSION['eid'];
    $sql = "SELECT * FROM registration_info WHERE eid='$eid'";
    $result = mysqli_query($conn,$sql);
    !$row = mysqli_fetch_assoc($result);
    $first = $row['first'];
    if(isset($_POST['submit']))
    {

            $first = $_POST['first'];//first name
            $last = $_POST['last'];//last norme
            $pwd = $_POST['pwd'];//password
            $email = $_POST['email'];//email
            $cell = $_POST['cell'];//cell no
            /*if($result)
            {
              UPDATE registration_info
              SET  first='$first', last='$last' ,email='$email' ,cell='$cell' pwd='$pwd'
              WHERE eid ='$eid';
              echo "<span>Update Succesful</span>";
            }
            else
            {
              echo "Error:".$sql."<br>".mysqli_erroe($conn);
            }
            mysqli_close($conn);*/
            $sql = " UPDATE registration_info
            SET  first='$first', last='$last' ,email='$email' ,cell='$cell', pwd='$pwd'
            WHERE eid ='$eid'";
            if(mysqli_query($conn, $sql))
            {
                header("LOCATION: update.php");
                echo "Records were updated successfully.";

            } else
            {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // Close connection
            mysqli_close($conn);
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
        <title>HOME</title>
        <style>
        #body{
          padding-top: 25px;
        }
        table,td,tr{
          padding-top:10px;
        }
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
          }
          body
          {
            background-color: rgb(197, 206, 207);
            color:black;

          }
          th{
            font-size: 24px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding-top:10px;
          }
          #button_body
          {
            background-color: rgb(28, 204, 156);
            border: none;
            border-bottom: solid;
            border-color: white;
            color: white;
            text-align: center;
            padding: 15px,25px,25px,15px;
            width: 100%;
            font-size: 18px;

          }
          #input{
            padding:5px 32px;
            border: none;
            padding-left: 25px;
            background-color: #fdf3e7;
            color:grey;
            width: 100%;
          }
        </style>
    </head>
    <body class="container-fluid" id="common">
          <div class="row" id="head">
              <div class="col-md-5">
                    <h5>Central Library Indian Institute of Information Technology Nagpur</h5>
              </div>
              <div class="col-md-3">
                <h5>Admin Id: <?= $_SESSION['eid'] ?></h5>
              </div>
              <div class="col-md-2">
                <form action="" method="POST">
                <button type = 'submit' name='change' id="button"> Change Login Details</button>
                </form>
              </div>
              <div class="col-md-1">
                <form action="admin.php">

                  <button type="submit" id="button"> Home </button>
                </form>
              </div>

              <div class="col-md-1">
                <form action="logout.php" method="post">
                  <input type="submit" value="Logout"name="LOGOUT" id="button">
                </form>
              </div>
          </div>

          <div class=row id= 'body'>
                <div class="col-md-6" id = "left_div">
                  <table>
                      <tr>
                        <th>Current Information</th>
                      </tr>
                      <tr>
                            <td>
                                <lable id = 'lable'>  Enrollment ID  </lable>
                            </td>
                            <td>
                              <?=$_SESSION['eid'] ?> <br>
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
                  </table>
                </div>


                <div class="col-md-6" id = "div_right">
                <form action=""method="POST">
                  <table>
                    <tr>
                      <th>New Information</th>
                      <tr>
                            <td>
                                <lable id = 'lable'>  Enrollment ID  </lable>
                            </td>
                            <td>
                              <?=$_SESSION['eid'] ?> <br>
                            </td>
                    </tr>
                  <tr>
                            <td>
                                <lable id = 'lable'> Corrected First Name*  </lable>
                            </td>
                          <td>
                                <input id="input"type='text' name='first' requied ><br>
                          </td>
                  </tr>
                  <tr>
                          <td>
                              <lable id = 'lable'> Corrected Last Name* </lable>
                          </td>
                          <td>
                              <input id="input"type ='text' name='last' required>
                          </td>
                  </tr>
                  <tr>
                      <td>
                          <lable id = 'lable'> New Email* </lable>
                      </td>
                      <td>
                          <input id="input"type="text" name='email' required>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <lable id = 'lable'> Updated Contact Number* &nbsp</lable>
                      </td>
                      <td>
                          <input type = 'text' id="input"name = 'cell' required>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <lable id = 'lable'> New Password* &nbsp</lable>
                      </td>
                      <td>
                          <input id="input"type="password" name="pwd" value="" required id="pass1">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <lable id = 'lable'> Retype Passowrd* &nbsp</lable>
                      </td>
                      <td>
                        <input id="input"type="password" name="" value="" required id="pass2" onkeyup= "checkPass(); return false";>

                      </td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><input type ='submit' name = 'submit' value='Update' id = 'button_body'></td>
                  </tr>
                </table><br>

                  <br><span id="confirmMessage"></span><br>
                </form>
                </div>




  <script>
        function checkPass()
         {

                 var pass1 = document.getElementById('pass1');
                 var pass2 = document.getElementById('pass2');

                 var message = document.getElementById('confirmMessage');

                 var goodColor = "#66cc66";
                 var badColor = "#ff6666";

                 if(pass1.value == pass2.value)
                 {

                        pass2.style.backgroundColor = goodColor;
                        message.style.color = goodColor;
                        message.innerHTML = "Passwords Match!"
                 }
                 else
                 {

                          pass2.style.backgroundColor = badColor;
                          message.style.color = badColor;
                          message.innerHTML = "Passwords Do Not Match!"
                 }
           }



  </script>

    </body>
</html>
