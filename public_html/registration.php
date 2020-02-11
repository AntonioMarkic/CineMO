<?php

$kor_ime = filter_input(INPUT_POST, 'kor_ime');
 $lozinka = filter_input(INPUT_POST, 'lozinka');
 if (!empty($kor_ime)){
if (!empty($lozinka)){
$host = "localhost";
$dbusername = "id12090993_cinema";
$dbpassword = "cinema";
$dbname = "id12090993_cinema_db";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO Zaposlenici (kor_ime, lozinka, uloga)
  values ('$kor_ime','$lozinka','1')";
  if ($conn->query($sql)){
     header('Location: headadmin.php');
	exit();
  }
  else{
   header('Location: dodajadmina.php');
	exit();
  }
  $conn->close();
}
}
else{
  header('Location: dodajadmina.php');
	exit();
}
 }
 else{
  header('Location: dodajadmina.php');
	exit();
 }
 ?>