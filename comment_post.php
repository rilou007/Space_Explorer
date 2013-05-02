<?php
require_once("rs.php");
$bd= new Rs();
	session_start();
	// Connexion a  la base de donnees
	
	if(isset($_SESSION['username']) != null)
	{										
															
			try
				{
					/* $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
					$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options); */
					$insert = array();
					
					$insert[0] = $_POST['comment'];
					/* $insert[1] = ''; */
					$insert[1] = 1; 
					$insert[2] =  $_POST['file'];
					$insert[3] =  $_SESSION['username'];		
					
					/* 
					$comment = $_POST["comment"];
					$nameUser = $_SESSION['username'];
					$file = $_POST['file']; */
						// Insertion de donnees
						$req = $bd->Insert('INSERT INTO comments (comment, date_comment, publish, path_file, username) VALUES(?, now(), ?, ?, ?)', $insert);
						/* $req->execute(array($file, $nameUser, $comment)); */
						header("Location:index.php");
				}
			catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
	}	

		else{
				?>
				<script> alert ("Please login to comment");
						window.location.href='index.php';
				</script>				
				<?php
				
				
		}
?>