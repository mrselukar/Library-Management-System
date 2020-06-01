<?php
    session_start();
    require 'dbh.php';
    if(isset($_SESSION['eid']) )
    {
        //echo $_SESSION['eid'];
    }
    else
      {
        echo "ERROR: YOU ARE NOT LOGGED IN Please login";
        header("LOCATION: login.php");
      }

    $eid = $_SESSION['eid'];
    $sql = "SELECT * FROM registration_info WHERE eid='$eid'";
    $result = mysqli_query($conn,$sql);
    !$row = mysqli_fetch_assoc($result);
    $first = $row['first'];

    mysqli_close($conn);

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
        #head
        {  padding-left: 10px;
            padding-top:11px;
            padding-bottom: 10px;
           display: static;
          background-color: rgb(28, 204, 156);

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
          #button_add,#button_update,#button_delete,#button1
          {
            background-color: rgb(28, 204, 156);
            border: none;
            border-bottom: solid;
            border-color: white;
            color: white;
            text-align: center;
            padding: 15px,15px,15px,15px;
            width: 130px;
            font-size: 18px;
            margin: auto;
            display: block;
            margin-top: 4px;

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
            text-align: center;
          }
          table,td,th,tr{
            padding-top:10px;
          }
          #form_div
          {
            display: none;
            margin: auto;

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
                <form action="update_admin.php" method="POST">
                <button type = 'submit' id="button"> Change Login Details</button>
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

          <div class='row'>
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
                            </table>
                </div>
                <div class="col-md-2">     </div>
                <div class="col-md-4" style="background-image:search.png">
                                          <h5 style="text-align:center;margin-top:25px">Database Operations</h5>
                                          <br>

                                          <input type="submit" id="button_add" name="Add" value="Add" onclick="foo_add(this)">
                                          <input type="submit" id="button_delete" name="delete" value="Delete" onclick="foo_delete(this)">
                                          <input type="submit" id="button_update" name="update" value="Update"onclick="foo_update(this)">
                                          <h5 style="text-align:center;margin-top:25px;margin-bottom:25px">User Operations</h5>
                                          <input type="submit" id="button1" name="update" value="Issue"onclick="foo_issue(this)">
                                          <input type="submit" id="button1" name="update" value="Collect"onclick="foo_return(this)">
                                          <input type="submit" id="button1" name="check" value="Check"onclick="foo_check(this)">




                </div>
                <div class="col-md-2"> </div>




      </div>
              <script>
                  function foo_add(btn)
                  {
                        var win = window.open('add.php','_blank');
                        win.focus();
                  }
                  function foo_update(btn)
                  {
                        var win = window.open('change.php','_blank');
                        win.focus();
                  }
                  function foo_delete(btn)
                  {
                        var win = window.open('del.php','_blank');
                        win.focus();
                  }
                  function foo_issue(btn)
                  {
                        var win = window.open('issue.php','_blank');
                        win.focus();
                  }
                  function foo_return(btn)
                  {
                        var win = window.open('return.php','_blank');
                        win.focus();
                  }
                  function foo_check(btn)
                  {
                        var win = window.open('check.php','_blank');
                        win.focus();
                  }
              </script>







    </body>
</html>
