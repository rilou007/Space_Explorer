<?php
	session_start();
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
			
			$userName = $_POST['userName'];
			
			$password = $_POST['password'];
			
			$req = $bdd->query("SELECT * FROM users WHERE username = '$userName' and password = '$password'");
			if($donnees = $req->fetch() and $donnees['type'] != "adm")
				{
					$_SESSION['username'] = $_POST['userName'];
					$_SESSION['email'] = $donnees['email'];
					$_SESSION['blocked'] = $donnees['blocked'];
					header('Location: index.php?conn=Mnjhkttg5566447hfhjkf43WWfy8');
				}
			else
				{
					header('Location: index.php');
				}	
			$req->closeCursor();
			
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
?>
