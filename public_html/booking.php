<!DOCTYPE html>
<html lang="en">
<?php 
        $id = $_GET['id'];
        $link = mysqli_connect("localhost", "id12090993_cinema", "cinema", "id12090993_cinema_db");

        $movieQuery = "SELECT * FROM movieTable WHERE movieID = $id" ; 
        $movieImageById = mysqli_query($link,$movieQuery);
        $row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Rezervirajte<?php echo $row['movieTitle']; ?> odmah</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>REZERVIRAJTE KARTU</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                    echo '<img src="'.$row['movieImg'].'" alt="">';
                    ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>ŽANR</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>TRAJANJE</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>POČETAK PRIKAZIVANJA</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>REDATELJ</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>GLUMCI</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="booking-form-container">
                <form action="" method="POST">
                    <select name="theatre" required>
                        <option value="" disabled selected>DVORANA</option>						
                        <?php $resourse=$link->query("select naziv from dvorana"); 
															while ($dvorana=$resourse->fetch_object()) {
																echo " <option value='".$dvorana->naziv."'>". $dvorana->naziv."</option>
																";
															} ?>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>SJEDALO</option>
                        <?php $resourse=$link->query("select sjedalo from sjedala"); 
															while ($sjedala=$resourse->fetch_object()) {
																echo " <option value='".$sjedala->sjedalo."'>". $sjedala->sjedalo."</option>
																";
															} ?>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATUM</option>
                        <?php $resourse=$link->query("select datum from Termini"); 
															while ($Termini=$resourse->fetch_object()) {
																echo " <option value='".$Termini->datum."'>". $Termini->datum."</option>
																";
															} ?>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>VRIJEME</option>
                        <?php $resourse=$link->query("select vrijeme from Termini"); 
															while ($Termini=$resourse->fetch_object()) {
																echo " <option value='".$Termini->vrijeme."'>". $Termini->vrijeme."</option>
																";
															} ?>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName" required>

                    <input placeholder="Phone Number" type="text" name="pNumber" required>

                    <button type="submit" value="submit" name="submit" class="form-btn">Rezerviraj</button>
                    
					<?php
                    $fNameErr = $pNumberErr= "";
                    $fName = $pNumber = "";
            
                    if(isset($_POST['submit'])){
                     
            
                        $fName = $_POST['fName'];
                        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
                            $fNameErr = 'Name can only contain letters, numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$fNameErr');</script>";
                        }   
            
                        $pNumber = $_POST['pNumber'];
                        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
                            $pNumberErr = 'Phone Number can only contain numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
                        } 
                        
                        $insert_query = "INSERT INTO 
                        bookingTable (  movieName,
                                        bookingTheatre,
                                        bookingType,
                                        bookingDate,
                                        bookingTime,
                                        bookingFName,
                                        bookingLName,
                                        bookingPNumber)
                        VALUES (        '".$row['movieTitle']."',
                                        '".$_POST["theatre"]."',
                                        '".$_POST["type"]."',
                                        '".$_POST["date"]."',
                                        '".$_POST["hour"]."',
                                        '".$_POST["fName"]."',
                                        '".$_POST["lName"]."',
                                        '".$_POST["pNumber"]."')";
						mysqli_query($link,$insert_query);
						echo "<blockquote>Uspješno rezervirano</blockquote>";
                        }
                    ?>
						  
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>