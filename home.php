
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
        header("LOCATION: login.php");
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

            $sql = " UPDATE registration_info
            SET  first='$first', last='$last' ,email='$email' ,cell='$cell', pwd='$pwd'
            WHERE eid ='$eid'";
            if(mysqli_query($conn, $sql))
            {
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
        h5{
          padding-top: 10px;
        }
        #head
        {  padding-left: 10px;
            padding-top: 11px;
           display: static;
          background-color: rgb(28, 204, 156);
          height:50px;
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
          }
          table{
            padding-top:10px;
            margin-left:30px;
          }

          #button_body
          {
            background-color: rgb(28, 204, 156);
            border: none;
            border-bottom: solid;
            border-color: white;
            color: white;
            text-align: center;
            padding: 15px,15px,15px,15px;
            width: 120px;
            font-size: 18px;

          }
          #input{
            padding:5px 32px;
            border: none;
            padding-left: 25px;
            background-color: #fdf3e7;
            color:white;
          }
          #body{
            padding-top: 25px;
          }
          td,th,tr{
            padding-top:10px;
          }
        </style>
    </head>
    <body class="container-fluid" id="common">
          <div class="row" id="head">
              <div class="col-md-5">
                    <h5>Central Library Indian Institute of Information Technology Nagpur</h5>
              </div>
              <div class="col-md-3">
                <h5>Enrollment Id: <?= $_SESSION['eid'] ?></h5>
              </div>
              <div class="col-md-2">
                <form action="" method="POST">
                <button type = 'submit' name='change' id="button"> Change Contact Details</button>
                </form>
              </div>
              <div class="col-md-1">
                <form action="home.php">
                  <span>&nbsp &nbsp&nbsp</span>
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
                <div class="col-md-4" id = "left_div">
                      <table>
                          <tr>
                            <th>Your Information</th>
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
                      <?php
                        $b1=$row['book_1'];
                        $b2=$row['book_2'];
                        if ($b1 != "")
                        {
                              $sql1 ="SELECT * FROM books WHERE id='$b1'";
                              $result1 = mysqli_query($conn,$sql1);
                              $row1 = mysqli_fetch_assoc($result1);
                              $n1 = $row1['name'];
                        }
                        else {
                          $n1="";
                        }
                        if ($b2 != "")
                        {
                              $sql2 ="SELECT * FROM books WHERE id='$b2'";
                              $result2 = mysqli_query($conn,$sql2);
                              $row2 = mysqli_fetch_assoc($result2);
                              $n2= $row2['name'];
                        }
                        else {
                          $n2="";
                        }


                       ?>
                      <tr>
                          <td>
                              <lable id = 'lable'>  Book 1 &nbsp</lable>
                          </td>
                          <td>
                              <?=$row['book_1'] ?><br>
                          </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td> <?=$n1 ?> </td>
                      </tr>
                      <tr>
                          <td>
                              <lable id = 'lable'>  Book 2 &nbsp</lable>
                          </td>
                          <td>
                              <?=$row['book_2'] ?><br>
                          </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td> <?=$n2 ?> </td>
                      </tr>
                      </table>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4" style="background-color:search.png">
                      <h5 style="text-align:center">Search</h5>
<!--
                      <form action="search.php" methord="POST">
                      <input type="text" id="search" name="search" placeholder="Search Query" required style="width:100%"><br><br>
                      <input type="submit" id="button_body" name="submit">
                    </form>
-->
<form action="search.php"method="POST">
    <table id="form_div">
      <form action="search.php" method="POST">
        <tr>

        </tr>
        <tr>
          <input type="text" name="search" value="" placeholder="Search Query" required style="width:100%;">
        </tr>


      <tr style = "text-align:center">
        <input type="submit" id="button" name="submit" value="Search" style="background-color: rgb(28, 204, 156); width:125px ; margin: auto" onclick="foo()" >
      </tr>
    </form>
</table>
</form>
                </div>
                <div class="col-md-2"></div>
    </body>
</html>
