<?php
  $conn = mysqli_connect("localhost", "root", "" ,"login_db");//server address username password database normalizer_is_normalized
  if (!$conn)
  {
    die("Conection Failed:".mysqli_connect_error());//remove.mysqli_connect_error or else prone to hacking
  }
  else
  {
  ;
  }
?>
