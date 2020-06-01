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
    if(isset($_POST['submit']))
    {

      $search = $_POST['search'];
      #echo $search;
      $sql="SELECT * FROM books WHERE id ='$search' OR name ='$search' OR auth ='$search' OR keyword ='$search' OR subject ='$search' ";
      #echo $q;
      $q= mysqli_query($conn,$sql);
      $c = mysqli_num_rows($q);
    }

    if($c == 0)
    {
          echo "NO Record Exists for <b>'".$search."'</b>";
          $id='';
          $subject='';
          $name='';
          $auth='';
          $copies='';
          $image='';
          $issued='';
    }
    else
    {
        $output = "<table>"."
                    <tr>"."
                      <th> Results </th>"."
                      <th></th></tr>";
        while($row = mysqli_fetch_array($q))
        {
          $id=$row['id'];
          $subject=$row['subject'];
          $name=$row['name'];
          $auth=$row['auth'];
          $copies=$row['copies'];
          $image=$row['image'];
          $issued=$row['issued'];
          $output .= "<tr>"."
                        <td> ID &nbsp</td>"."
                        <td><b>'".$id."'</b></td> </tr>".
                        "<tr>"."
                          <td> Subject &nbsp</td>"."
                          <td><b>'".$subject."'</b></td></tr>".
                          "<tr>"."
                            <td> name &nbsp</td>"."
                            <td><b>'".$name."'</b></td></tr>".
                            "<tr>"."
                              <td> Author &nbsp</td>"."
                              <td><b>'".$auth."'</b></td></tr>".
                              "<tr>"."
                                <td> Copies &nbsp</td>"."
                                <td><b>'".$copies."'</b></td></tr>".
                                "<tr>"."
                                  <td> Issued &nbsp</td>"."
                                  <td><b>'".$issued."'</b></td></tr>".
                                  "<tr>"."
                                    <td> image  &nbsp</td>"."
                                    <td><b>'".$image."'</b></td></tr>".
                                    "<tr>"."
                                      <td> <hr></td>"."
                                      <td><hr></td></tr>".'<tr><td><form action="del2.php" method="POST">
                                        <input  type="hidden" value="'.$id.'" name="id">
                                        <button type="submit" id="button" name="delete"> Delete </button>
                                      </form></td></tr><tr><td><hr></td></tr>';



        }

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
              background-color: rgb(28, 204, 156);

          }
          body
          {
            background-color: rgb(197, 206, 207);
            color:black;

          }

          table
          {
            width: 100%;
            border: solid;
            border-color: white;
            border-collapse: collapse;
            padding-top: 8px;
            margin-top: 6px;
          }
          hr{
            height: 2px;
            color: white;
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
          <div class=row id= 'body'>
            <div class='col-md-3'></div>
            <div class='col-md-6' >
            <?php
                print $output;
              ?>
            </div>
            <div class='col-md-3'></div>
          </div>
    </body>
</html>
