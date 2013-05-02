<?php require_once("rs.php");

$bd= new Rs();
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
					
					<h3>Welcome on NASA SPACE EXPLORER,</h3>
					
					</br> 
					
					<p>You have been successfuly register on NASA Space Explorer... To go back, <a href='http://nasa.logipam.org'>Click here!</a>.</p>
					
					<p></br></br></p> 
					
					<h3>We are waiting for your there!</h3>
					
					<p></br></br></p>
					
					<h3>Let's go...</h3>
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
					//mail($mail,$sujet,$message,$header);  
					
	if($_POST['password']==$_POST['cpassword'])
	{
	
	try
		{
				
			$insert = array();
			$insert[0] =  $_POST['userName'];
			$insert[1] =  $_POST['email'];
			$insert[2] =  md5($_POST['password']);
			$insert[3] =  "non-adm";
			
			
			$req = $bd->Insert('INSERT INTO users (username, email, password, type, blocked) VALUES(?, ?, ?, ?,"0")',$insert);
			/* $req->execute(array($userName, $email, $password, $type)); */
			
			
			header('Location: felicitation.php');
			
			mail($mail,$sujet,$message,$header);
			
			$req->closeCursor();
			
		}
	catch(Exception $e)
		{
		
			 ?>
			
			<script> alert ("Username already exist"); window.location.href='registration/account.php';</script>
			
			<?php
			
			 /*echo  '<div align="center">'.'<h3>'.'<font color=red>'.("Username already exist, please give another one!!!".'</font>'.'</h3>'.'</div>');
			 die('Erreur : '.$e->getMessage());
			<script> </script> */
		}
		
	}
	else
					{
						?>
							<script> alert("Password not matched"); </script> 
						<?php
						
					}
?>
