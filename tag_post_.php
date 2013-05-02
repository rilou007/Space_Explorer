<?php
	require_once("rs.php");
	$bd = new Rs();
	session_start();
	// Connexion a  la base de donnees
	try
		{
			/* $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options); 
			$nameUser = $_SESSION['username'];
			$tag = $_POST["tag"];			
			$file = $_POST['file'];*/
			
			
			$insert = array();
			
			$insert[0] = $_POST['tag'];
			/* $insert[1] = ''; */
			$insert[2] = 1; 
			$insert[3] =  $_SESSION['username'];
			$insert[4] =  $_POST['file'];
			
				// Insertion de donnees
				$req = $bd->Insert('INSERT INTO tags (tags_name, date_tags, publish_tags, username, path_file) VALUES(?, now(), ?, ?,?)',$insert);
				/* $req->execute(array($file, $tag, $nameUser)); */
				
				header("Location:index.php");
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
			
?>