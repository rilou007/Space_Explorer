<?php
	session_start();
	// Connexion a  la base de donnees
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
		
			$tag = $_POST["tag"];
			$nameUser = $_SESSION['username'];
			$file = $_POST['file'];
				// Insertion de donnees
				$req = $bdd->prepare('INSERT INTO tags (path_file, tags_name, name_user, date_tags) VALUES(?, ?, ?, now())');
				$req->execute(array($file, $tag, $nameUser));
				
				header("Location:index.php");
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
			
?>