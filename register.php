<?php
    require 'dbh.php';
    if (isset($_POST['submit']))
    {
          $eid = $_POST['eid'];//enrollment
          $first = $_POST['first'];//first name
          $last = $_POST['last'];//last norme
          $pwd = $_POST['pwd'];//password
          $email = $_POST['email'];//email
          $cell = $_POST['cell'];//cell no
        
          $sql = "SELECT * FROM registration_info WHERE eid='$eid'";
          $result = mysqli_query($conn,$sql);


          if(!$row = mysqli_fetch_assoc($result))
          {

             $sql = "INSERT INTO registration_info (eid,first,last,pwd,email,cell)
              VALUES('$eid','$first','$last','$pwd','$email','$cell')";
              $result = mysqli_query($conn,$sql);
              if($result)
              {
                header("Location: reg_success.php");
              }
              else
              {
                echo "Error:".$sql."<br>".mysqli_error($conn);
              }
              mysqli_close($conn);
          }
          else {
            echo "<h6>Error: </h6>".$eid."<span> Is already Regestered</span>";
          }
    }

 ?>
 <!doctype html>
 <html>
     <head>
         <link rel="stylesheet" href="regestraton.css">
         <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
         <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
         <meta charset="utf-8">
         <title>Registration</title>
         <style>

                     .heading
                     {
                       font-family: 'Oswald', sans-serif;
                     }
                     input
                     {
                         background-color:#fdf3e7;
                         border-top: solid;
                         border-left: dotted;
                         border-right: dotted;
                         border-bottom: solid;
                         border-color:rgb(48, 167, 135);
                         color: white;
                         padding: 5px 32px;
                         font-size: 16px;
                         margin: 4px 2px;
                         cursor: pointer;
                         color: rgb(23, 26, 28);

                     }
                     #button{
                       background-color:rgb(48, 167, 135);
                     }
                     h4{
                       color: red;
                     }
                     #common
                     { margin-top: 60px;
                       text-align: center;
                       background-image: url(Resources/signup_background.jpeg);
                       background-size: cover;
                       background-repeat: no-repeat;
                     }
           </style>
     </head>

 <body class="container-fluid" id="common">
   <div class="container" id = "div_main">
     <div class=row>
           <div class='col-md-6' id="div_register">

             <h2 class="heading">Register</h2>
               <form action="" method="POST"><br>
                 <input type="text" name="eid" value="" placeholder="Enrollment ID*" required><br><br>
                 <input type="text" name="first" value="" placeholder="First Name*" required><br><br>
                 <input type="text" name="last" value="" placeholder="Last Name*"required><br><br>
                 <input type="email" name="email" value="" placeholder="email id*" required><br><br>
                 <input type="name" name="cell" value= "" placeholder="Contact Number*"required><br><br>
                 <input type="password" name="pwd" vlaue="" placeholder="Password*"required id="pass1"><br><br>
                 <input type="password" name="" vlaue="" placeholder="Confirm Password*"required id="pass2"onkeyup="checkPass(); return false";><br><br>
                 <input type="hidden" name="submitted" value="1">
                 <input type="submit" id="button" name="submit" value="Register">
                 <br><br><span id="confirmMessage"></span>

                 <br><br><br>
               </form>
           </div>
           <div class='col-md-6'></div>
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
