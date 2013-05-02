<?php
// Déclaration de l'adresse de destination.
					$mail = $_POST['email'];
					if (!preg_match("#^[a-z0-9._-]+@(yahoo|gmail|hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
						{
							$passage_ligne = "\r\n";
						}
					else
						{
							$passage_ligne = "\n";
						}
					//=====Déclaration des messages au format texte et au format HTML.
					$message_txt = "";
					$message_html = "
					<html>
					<head>
					<title></title>
					</head>
					<body>
					
					<h3>Salut et bienvenue sur NASA SPACE EXPLORER,</h3>
					
					</br> 
					
					<p>Nous venons tout juste de recevoir votre demande d'inscription et votre demande a été agréée avec plaisir. Vous pouvez retouner sur NASA SPACE EXPLORER en cliquant sur: <a href='http://nasa.logipam.org'>Retour sur la NSE </a>.</p>
					
					<p></br></br></p> 
					
					<h3>Alors on se revoit là bas alors…</h3>
					
					<p></br></br></p>
					
					<h3>Allez! On vous attend...</h3>
					</body>
					</html>
					";
					//==========
 
					//=====Création de la boundary
					$boundary = "-----=".md5(rand());
					//==========
 
					//=====Définition du sujet.
					$sujet = "Confirmation d'inscription sur NASA SPACE EXPLORER";
					//=========
 
					//=====Création du header de l'e-mail.
					$header = "From: \"NES (NASA SPACE EXPLORER)\"<".$mail.">".$passage_ligne;
					$header.= "Reply-to: \"NES (NASA SPACE EXPLORER)\" <richardson.ciguene@esih.edu>".$passage_ligne;
					$header.= "MIME-Version: 1.0".$passage_ligne;
					$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
					//==========
 
					//=====Création du message.
					$message = $passage_ligne."--".$boundary.$passage_ligne;
					//=====Ajout du message au format texte.
					$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
					$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
					$message.= $passage_ligne.$message_txt.$passage_ligne;
					//==========
					$message.= $passage_ligne."--".$boundary.$passage_ligne;
					//=====Ajout du message au format HTML
					$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
					$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
					$message.= $passage_ligne.$message_html.$passage_ligne;
					//==========
					$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
					$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
					//==========
 
					//=====Envoi de l'e-mail.
					mail($mail,$sujet,$message,$header);
					
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
			
			$userName = $_POST['userName'];
			
			$email = $_POST['email'];
			
			$password = $_POST['password'];
			
			$type = "non-adm";
			
			$req = $bdd->prepare('INSERT INTO users (username, email, password, type) VALUES(?, ?, ?, ?)');
			$req->execute(array($userName, $email, $password, $type));
			
			
			header('Location: index.php');
			
			mail($mail,$sujet,$message,$header);
			
			$req->closeCursor();
			
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
?>
