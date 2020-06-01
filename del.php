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
          header("LOCATION: update_admin.php");
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
        <title>Delete Record</title>
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
          }
          body
          {
            background-color: rgb(197, 206, 207);
            color:black;

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
          <form action="del1.php"method="POST">
              <table id="form_div">
                <form action="del1.php" method="POST">
                  <tr>
                    <h4>Search For the record to be deleted</h4>
                  </tr>
                  <tr>
                    <input type="text" name="search" value="" placeholder="Search Query" required style="width:50%;">
                  </tr>
                <tr id="1">

                          <td>
                                <input type="radio" name="radio" value="" >
                          </td>
                          <td>
                              <lable id = 'lable'> Subject &nbsp</lable>
                          </td>

                          <td>
                              <input type="radio" name="radio" value="" checked >
                          </td>
                          <td>
                              <lable id = 'lable'> Name &nbsp </lable>
                          </td>

                          <td>
                              <input type="radio" name="radio" value=""  >
                          </td>
                          <td>
                              <lable id = 'lable'> Author  &nbsp</lable>
                          </td>
                </tr>

                <tr>
                  <input type="submit" id="button" name="submit" value="Search" style="background-color: rgb(28, 204, 156); width:125px" onclick="foo()" >
                </tr>
              </form>
          </table>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>




    </body>
</html>
