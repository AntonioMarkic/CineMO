<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ažuriraj film</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

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

if (isset($_POST['submit'])) {

  try {

    $connection = new PDO($dsn, $username, $password, $options);

    $user =[

      "movieTitle" => $_POST['movieTitle'],

      "movieGenre" => $_POST['movieGenre'],

	  "movieDuration" => $_POST['movieDuration'],
	  
	  "movieRelDate" => $_POST['movieRelDate'],

      "movieDirector" => $_POST['movieDirector'],

	  "movieActors" => $_POST['movieActors']

    ];



    $sql = "UPDATE movieTable SET
 

              movieTitle = :movieTitle,  

			  movieGenre = :movieGenre,
			  
			  movieDuration = :movieDuration, 

              movieRelDate = :movieRelDate,  

			  movieDirector = :movieDirector,
			  
			  movieActors = :movieActors

            WHERE movieTitle = :movieTitle";

  

  $statement = $connection->prepare($sql);

  $statement->execute($user);
  //$result = $statement->fetchAll();

  } catch(PDOException $error) {

      echo $sql . "<br>" . $error->getMessage();

  }

}

  

if (isset($_GET['movieTitle'])) {

  try {

    $connection = new PDO($dsn, $username, $password, $options);

    $movieTitle = $_GET['movieTitle'];

    $sql = "SELECT movieTitle, movieGenre, movieDuration, movieRelDate, movieDirector, movieActors FROM movieTable WHERE movieTitle = :movieTitle";

    $statement = $connection->prepare($sql);

    $statement->bindValue(':movieTitle', $movieTitle);

    $statement->execute();

    

    $user = $statement->fetch(PDO::FETCH_ASSOC);

  } catch(PDOException $error) {

      echo $sql . "<br>" . $error->getMessage();

  }

  

} 

else {

    echo "Greška!";

    exit;

}

?>

<?php if (isset($_POST['submit']) && $statement) : ?>

	<blockquote><?php echo escape($_POST['movieTitle']); ?> uspješno ažurirano</blockquote>

<?php endif; ?>

<h2>Ažurirajte film</h2>



<form method="post">

    <?php foreach ($user as $key => $value) : ?>

      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>

	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'movieTitle' ? 'readonly' : null); ?>>

    <?php endforeach; ?> 

	<button id="submit" type="submit" name="submit" >Spremi</button>
</form>

	
    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>		