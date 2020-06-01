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
    if(!isset($_POST['search']))
    {
      header("LOCATON: change.php");
    }
    else
    {
          $search = $_POST['search'];
    }
    if (isset($_POST['change']))
    {
          header("LOCATION: update.php");
    }




  if (isset($_POST['submit']))
      {
        $id= $_POST['id'];
        $sql1 = "SELECT * FROM books WHERE id='$id'";
        $result1 = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($result1);
      /*  if (isset($_POST['submit1']))
        {


            $subject=$_POST['subject'];
            $name=$_POST['name'];
            $author=$_POST['author'];
            if(isset($_POST['image']))
            {
              $image=$_POST['image'];
            }
            else
            {
              $image='-';
            }
            $copies=$_POST['copies'];
            $issued=$_POST['issued'];
                $sql = "UPDATE books
                SET  id='$id', subject='$subject' ,auth='$author' ,copies='$copies', issued='$issued',image='$image',name='$name'
                WHERE id ='$id'";
                if(mysqli_query($conn, $sql))
                {
                    header("LOCATION:admin.php");
                    echo "Records were updated successfully.";

                } else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }

                // Close connection
                mysqli_close($conn);
          }*/
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
            <div class="col-md-6">
              <table id="form_div" style="text-align:center">
                  <tr>
                    <h4>Current Information</h4>
                  </tr>
                <tr id="1">
                          <td>
                              <lable id = 'lable'> Subject </lable>
                          </td>
                        <td>
                            <?=$row['subject'] ?>
                        </td>
                </tr>
                <tr id ="2">
                        <td>
                            <lable id = 'lable'> Name </lable>
                        </td>
                        <td>
                            <?=$row['name'] ?>
                        </td>
                </tr>
                <tr id="3">
                    <td>
                        <lable id = 'lable'> Author </lable>
                    </td>
                    <td>
                        <?=$row['auth'] ?>
                    </td>
                </tr>
                <tr id ="4">
                    <td>
                        <lable id = 'lable'>Copies</lable>
                    </td>
                    <td>
                          <?=$row['copies'] ?>
                    </td>
                </tr>
                <tr id ="4">
                    <td>
                        <lable id = 'lable'>Issued</lable>
                    </td>
                    <td>
                          <?=$row['issued'] ?>
                    </td>
                </tr>
                <tr id = "5">
                    <td>
                        <lable id = 'lable'>Image Location &nbsp</lable>
                    </td>
                    <td>
                        <?=$row['image'] ?>
                    </td>
                </tr>
              </table>




            </div>
            <div class="col-md-6">
          <form action="change3.php"method="POST">
              <table id="form_div">
                  <tr>
                    <h4>Enter Details</h4>
                  </tr>
                <tr id="1">
                          <td>
                              <lable id = 'lable'> Subject </lable>
                          </td>
                        <td>
                              <input type="text" name="subject" value="" placeholder="Subject" required>
                        </td>
                </tr>
                <tr id ="2">
                        <td>
                            <lable id = 'lable'> Name </lable>
                        </td>
                        <td>
                            <input type="text" name="name" value="" placeholder="Name" required>
                        </td>
                </tr>
                <tr id="3">
                    <td>
                        <lable id = 'lable'> Author </lable>
                    </td>
                    <td>
                        <input type="text" name="author" value="" placeholder="Author" required>
                        <input type="hidden" name="id" value="<?=$id ?>">
                    </td>
                </tr>
                <tr id ="4">
                    <td>
                        <lable id = 'lable'>Copies</lable>
                    </td>
                    <td>
                        <input type="text" name="copies" value="" placeholder="Copies" required>
                    </td>
                </tr>
                <tr id = "5">
                    <td>
                        <lable id = 'lable'>Image Location &nbsp</lable>
                    </td>
                    <td>
                        <input type="text" name="image" value="" placeholder="Image location" >
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" id="button" name="submit1" value="Submit" style="background-color: rgb(28, 204, 156); width:125px" onclick="foo()" >
                    </td>

                </tr>

              </table>
        </form>
      </div>

    </div>






    </body>
</html>
