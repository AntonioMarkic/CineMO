<?php
                       
{
$movieImg = filter_input(INPUT_POST, 'movieImg');	
$movieTitle = filter_input(INPUT_POST, 'movieTitle');
$movieGenre = filter_input(INPUT_POST, 'movieGenre');
$movieDuration = filter_input(INPUT_POST, 'movieDuration');
$movieRelDate = filter_input(INPUT_POST, 'movieRelDate');
$movieDirector = filter_input(INPUT_POST, 'movieDirector');
$movieActors = filter_input(INPUT_POST, 'movieActors');
if (!empty($movieImg)){
if (!empty($movieTitle)){
if (!empty($movieGenre)){
if (!empty($movieDuration)){
if (!empty($movieRelDate)){
if (!empty($movieDirector)){
if (!empty($movieActors)){	
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
  $sql = "INSERT INTO movieTable (movieImg, movieTitle, movieGenre, movieDuration, movieRelDate, movieDirector, movieActors)
  values ('img/$movieImg','$movieTitle','$movieGenre','$movieDuration','$movieRelDate','$movieDirector','$movieActors')";
  if ($conn->query($sql)){
     header('Location: admin.php');
	exit();
  }
  else{
   header('Location: dodajfilm.php');
	exit();
  }
  $conn->close();
}
}
else{
  header('Location: dodajfilm.php');
	exit();
}
 }
 else{
  header('Location: dodajfilm.php');
	exit();
 }
}
}
}
}
}
}	

	/*
if(isset($_POST['submit']))	
{
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors)
                            VALUES (        'img/".$_POST['movieImg']."',
                                            '".$_POST["movieTitle"]."',
                                            '".$_POST["movieGenre"]."',
                                            '".$_POST["movieDuration"]."',
                                            '".$_POST["movieRelDate"]."',
                                            '".$_POST["movieDirector"]."',
                                            '".$_POST["movieActors"]."')";
                            mysqli_query($link,$insert_query);		*/
?>