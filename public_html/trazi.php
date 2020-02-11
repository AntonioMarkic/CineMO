<?php 

$link = mysqli_connect("localhost", "id12090993_cinema", "cinema", "id12090993_cinema_db") or die($link);



$safe_value = mysqli_real_escape_string($link, $_REQUEST['search']);
$sql = "SELECT * FROM movieTable WHERE `movieTitle` LIKE '%$safe_value%'";
$result = mysqli_query($link, $sql);
 if ($row = mysqli_fetch_assoc($result)) {
header('Location: booking.php?id='.$row['movieID'].'');
 }
else {
	header('Location: index.php');
}

  ?>