<?php
	session_start();
	// Connexion a  la base de donnees
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
		
			$comment = $_POST["comment"];
			$nameUser = $_SESSION['username'];
			$file = $_POST['file'];
				// Insertion de donnees
				$req = $bdd->prepare('INSERT INTO comments (path_file, name_user, comment, date_comment) VALUES(?, ?, ?, now())');
				$req->execute(array($file, $nameUser, $comment));
				header("Location:index.php");
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
			
?>