<?php 
	require_once("rs.php");
	$conn= new Rs();
	session_start();
	if(isset($_SESSION['admin']))
		header("location:admin.php");
	if(isset($_SESSION['user']))
		header("location:simple_user.php");
?>

<!DOCTYPE html> <!--Designed by L. Giscard AUGUSTIN-->
<html>
<head>
	<!-- En-tête de la page -->
	<title>Login Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../../css/styles.css">
	<link rel='shortcut icon' href='../../images/star1.png' type='image/x-icon'/ >
</head>
<body>
			
	<div id="loging">

		
	<?php
			$bool=false;
			if(isset($_POST['login']) and $_POST['username']!='' and $_POST['pass']!='')
			{
				$users= array();
				$users = $conn->Select('SELECT username, password, type, blocked FROM users where lower(username) =\''.strtolower($_POST['username']).'\'');
 
				foreach ($users as $user)
				{
					if ( md5($_POST['pass']) == $user['password'] and strtolower($_POST['username']) == strtolower($user['username']) and $user['blocked'] == 0 )
					{
						$bool=true;
						if ($user['type'] == 'adm')
						{
							if (isset($_SESSION['user'])) unset($_SESSION['user']);
							$_SESSION['admin'] = $user['username'];
							$_SESSION['type']= $user['type'];
							header("location:admin.php");
							exit();
						}
						else
						{
							if (isset($_SESSION['admin'])) unset($_SESSION['admin']);
							$_SESSION['user'] = $user['username'];
							$_SESSION['type']= '';
							header("location:simple_user.php");
							exit();
						}
					}
				}
				if (!$bool) echo '<div align="center">'.'<h3>'.'<font color=red>'."Incorrects parameters...".'</font>'.'</h3>'.'</div>';
			}
			if(isset($_POST['login']) and ($_POST['username']=='' or $_POST['pass'] == '')) echo '<div align="center">'.'<h3>'.'<font color=red>'."Both fields are required...".'</font>'.'</h3>'.'</div>';
	?>


		<fieldset>
			<Legend><h3>Login Area</h3></legend>
				<?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
				<hr />
					<form autocomplete="off" id="form_login" method="POST" action="index.php">
						<label for="username" class="_0">Username: *</label><br /><input type="text" name="username" id="username" /> <br />
						<label for="pass" class="_0">Password: *</label><br /><input type="password" name="pass" id="pass" /> <br />
						<center><input type="submit" value="Login" name="login" id="login" /></center>
					</form>
				<hr />
				<center><a href="#">Password forgotten</a></center>
		</fieldset>
	</div>
	
</body>
</html>