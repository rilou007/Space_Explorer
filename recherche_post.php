<?php
	session_start();
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
			
			$recherche = $_POST['recherche'];
			
			
			$req->closeCursor();
			
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
?>
