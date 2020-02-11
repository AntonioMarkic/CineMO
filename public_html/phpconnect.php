<?php
session_start();
require 'db.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	try
	{
		//Stvori novi PDO objekt
		$dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD, 
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);

		//Pripremi novi PDO objekt	
		$stmt = $dbh->prepare('SELECT * FROM Zaposlenici WHERE kor_ime = :kor_ime AND lozinka =:lozinka');

		//Izvrši SQL upit	
		$stmt->execute([
			':kor_ime' => $_POST['kor_ime'],
			':lozinka' => $_POST['lozinka'],
		]);

		//Vrati rezultat upita
		$Zaposlenici = $stmt->fetch();

		//Provjeri rezultat upita
		if(empty($Zaposlenici))
		{

			//Korisnik s ovim pristupnim podacima ne postoji u bazi, prijava je neuspješna

			//Prikaži poruku o grešci
			//$_SESSION['poruka_prijava'] = 'Neispravno korisničko ime i/ili lozinka.';

			//Preusmjeri na početnu stranicu
			header('Location: prijava.php');
			exit();
		}
		else
		{
			//Korisnik s ovim pristupnim podacima postoji u bazi, prijava je uspješna


			//Postavi sesijske varijable
			//$_SESSION['id_zaposlenika'] = $korisnik['id_zaposlenika'];
			$_SESSION['kor_ime'] = $Zaposlenici['kor_ime'];
			$_SESSION['lozinka'] = $Zaposlenici['lozinka'];
			$_SESSION['uloga'] = $Zaposlenici['uloga'];

			if($_SESSION['uloga']=='1')
				{
					//$_SESSION['poruka_prijava'] = 'Uspješno ste prijavljeni!';
					header('Location: admin.php');
					exit();
				}
 			
 			else if($_SESSION['uloga']=='2')
 				{
 					//$_SESSION['poruka_prijava'] = 'Uspješno ste prijavljeni!';
 					header('Location: headadmin.php');
 					exit();
 				}
 			

		
		}
	}
	catch(PDOException $e)
	{
		http_response_code(500);
		die($e->getMessage());
	}
}




?>
