<?php
	session_start();
    require_once("rs.php");
	$bd= new Rs();
	try
		{
			$userName = $_POST['userName'];
			$password = md5($_POST['password']);
			$req = $bd->Select("SELECT * FROM users WHERE username = '$userName' and password = '$password' and blocked=0");
			$bool=false;
			foreach($req as $donnees)
			{
				if($donnees['type'] != "adm")
					{
						$bool=true;
						$_SESSION['username'] = $_POST['userName'];
						$_SESSION['email'] = $donnees['email'];
						$_SESSION['blocked'] = $donnees['blocked'];
						header('Location: index.php');//conn=Mnjhkttg5566447hfhjkf43WWfy8');
					}
				else
					{
						$bool=true;
						$_SESSION['admin'] = $donnees['username'];
						$_SESSION['type']= $donnees['type'];
						header('Location: php/admin/admin.php');//index.php?conn=Mnjhkttg5566447hfhjkf43WWfy8');
					}	
			}
			if (!$bool)header('Location: login.php');
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
?>
