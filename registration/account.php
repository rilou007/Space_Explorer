<?php
	require_once("../rs.php");
	$bd = new Rs();
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Create an Account</title>
			
			
			<style type="text/css">
                body {
                    background: url(../img/ice.png);
                }
                #content {
                    width: 1000px;
                    height: 300px;
                    margin-left: auto;
                    margin-right: auto;
                    padding: 15px;
                    margin-top: 150px;
                    background: #fff;
                    clear: both;
                    -moz-box-shadow: 0 0 5px #000;
                    -webkit-box-shadow: 0 0 5px #000;
                    box-shadow: 0 0 5px #000;
                    display: table;
                }
                #img_content_block {
                    display: inline-block;
                    width: 450px;
                    height: 300px;
                    background: #e5e5e5;
                    margin-top: 5px;
                    background: url("../img/register.jpg") no-repeat center top;
                }
                #register {
                    position: relative;
                    top: -30px;
                    right: -10px;
                    display: inline-block;
                    margin-left: 15px;
                    
                }
            </style>
            <link rel="stylesheet" type="text/css" href="../style2.css" />
        </head>
        
        <body>
		
            <form  action="account.php" method="POST" id="content">
                <div id="img_content_block">
                    
                </div>
                <div id="register" title="REGISTER">
					
                   <div class="input_block">   
                      <label class="for_label">USERNAME</label>
                      <input type="text" alt="" class="for_input" name="userName" id="userName" onblur="verifNom(this)" required/>
                   </div>
                   <div class="input_block">
                       <label class="for_label">EMAIL</label>
                       <input type="text" alt="" class="for_input" name="email" id="email" onblur="verifMail(this)" required/>
                   </div>
                   <div class="input_block">
                       <label class="for_label">PASSWORD</label>
                       <input type="password" alt="" class="for_input" name="password" id="password" onblur="verifPass(this)" required/>
                   </div>
                   <div class="input_block">
                       <label class="for_label">CONFIRM PASSWORD</label>
                       <input type="password" alt="" class="for_input" name="cpassword" id="cpassword" onblur="verifPass1(password,this)" required/>
                   </div>
                   
                   <input type="submit" class="for_submit" name="addd" id="addd" alt="" value="REGISTER"/>
                   <a href="../" title="If you already got an Account, Please click to back to Homepage">Already got an Account</a>
                

				</div>
				</form>
				
	<?php
	
	// Déclaration de l'adresse de destination.
					/*  $mail = $_POST['email'];
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
					mail($mail,$sujet,$message,$header);*/
				
			if(isset($_POST['addd']))
				{
										
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
									/* $req->execute(array($userName, $email, $password, $type)); header('Location: ../index.php');*/
									
									?>
									
									
									<script> alert ("Your account has been created successfully");
											window.location.href='../felicitation.php';
									</script>
									<?php
									/* mail($mail,$sujet,$message,$header); */
									
									/* $req->closeCursor(); */
									
								}
							catch(Exception $e)
								{
								echo  '<div align="center">'.'<h3>'.'<font color=red>'.("Username already exist, please give another one!!!".'</font>'.'</h3>'.'</div>');
									 
								}
								
						}
							else
								{
									echo  '<div align="center">'.'<h3>'.'<font color=red>'.("Password not Matched!!!".'</font>'.'</h3>'.'</div>');
									 	
								}
								
				}
?>
        
	
        </body>
    </html>
