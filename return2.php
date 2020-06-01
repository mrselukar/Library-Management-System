<?php
    session_start();
    require 'dbh.php';
    $output="";
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

    if (isset($_POST['return']))
    {

        $id=$_POST['return'];

        $eid = $_POST['eid'];

        $sql = "SELECT * FROM registration_info WHERE eid='$eid'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($id=="")
        {
          echo "NO BOOK ID PRESENT";
        }
        else
        {

                $sql1 = "SELECT * FROM books WHERE id='$id'";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $eid =  $row['eid'];
                $issued=$row1['issued'];
                $issued--;
                $sql = "UPDATE books
                SET  issued='$issued'
                WHERE id ='$id'";
                $book_2 = $row['book_2'];
                if(mysqli_query($conn, $sql))
                {

                        $sql3="UPDATE registration_info
                        SET  book_1='$book_2'
                        WHERE eid ='$eid'";
                        $pass = mysqli_query($conn, $sql3);

                        $sql3="UPDATE registration_info
                        SET  book_2=''
                        WHERE eid ='$eid'";
                        $pass = mysqli_query($conn, $sql3);

                        if($pass)
                        {
                              $output .= $row1['auth']."&nbsp Collected and Records were updated successfully.
                              <br> Click Home to go to home page ";
                        }
            }
            else
            {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
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
        <title>Update</title>
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
                <?php
                      echo $output;
                 ?>

          </div>
          <div class="col-md-2"></div>
        </div>




    </body>
</html>
