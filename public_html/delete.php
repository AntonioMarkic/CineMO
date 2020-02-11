<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dodaj film</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "id12090993_cinema", "cinema", "id12090993_cinema_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo=mysqli_num_rows(mysqli_query($link, $sql));
    $moviesNo=mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            CineMo
        </div>
        <div class="admin-login-info">
            <i class="far fa-bell admin-notification-button"></i>
            <i class="far fa-comment-alt"></i>
            <a href="admin.php">Admin</a>
            <img class="admin-user-avatar" src="../img/avatar.png" alt="">
        </div>
    </div>
 <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Filmovi</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
					
<?php

require "db.php";

require "common.php";


if (isset($_GET["movieTitle"])) {

  try {

    $connection = new PDO($dsn, $username, $password, $options);

  

    $movieTitle = $_GET["movieTitle"];



    $sql = "DELETE FROM movieTable WHERE movieTitle = :movieTitle";



    $statement = $connection->prepare($sql);

    $statement->bindValue(':movieTitle', $movieTitle);

    $statement->execute();



    $success = "Film je izbrisan";

  } catch(PDOException $error) {

    echo $sql . "<br>" . $error->getMessage();

  }

}



try {

  $connection = new PDO($dsn, $username, $password, $options);



  $sql = "SELECT * FROM movieTable";



  $statement = $connection->prepare($sql);

  $statement->execute();



  $result = $statement->fetchAll();

} catch(PDOException $error) {

  echo $sql . "<br>" . $error->getMessage();

}

?>

        

<h2>Izbrišite film</h2>


<table class="table table-hover table-dark">


  <thead>

    <tr>

      <th>Naziv</th>

	  <th>Žanr</th>

      <th>Trajanje</th>

	  <th>Datum Izlaska</th>

	  <th>Redatelj</th>

      <th>Glumci</th>

    </tr>

  </thead>

  <tbody>

  <?php foreach ($result as $row) : ?>

    <tr>

        <td><?php echo escape($row["movieTitle"]); ?></td>

		<td><?php echo escape($row["movieGenre"]); ?></td>

        <td><?php echo escape($row["movieDuration"]); ?></td>
		
		<td><?php echo escape($row["movieRelDate"]); ?></td>

		<td><?php echo escape($row["movieDirector"]); ?></td>

        <td><?php echo escape($row["movieActors"]); ?></td>

      <td><a href="delete.php?movieTitle=<?php echo escape($row["movieTitle"]); ?>">Briši</a></td>

    </tr>

  <?php endforeach; ?>

  </tbody>

</table>					
	
	
	<script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>				