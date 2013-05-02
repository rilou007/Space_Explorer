<?php
	session_start();
	require_once("../../rs.php");
	$conn= new Rs();
	if (!isset($_SESSION['admin']))
	{
		header("location:../../index.php");
		exit();
	}
?>
<!DOCTYPE html> <!--Designed by L. Giscard AUGUSTIN-->
<html>
<head>

	<!-- En-tête de la page -->
	<title>ESIH_PICSTORIA | Administration Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../css/halfmoontabs.css" />
	<link rel="stylesheet" type="text/css" href="../../../../../Datasolution/CSS/design.css"/>
	<link rel='shortcut icon' href='../../images/star1.png' type='image/x-icon'/ >
	<script>		
		function change_visibility(element)
		{
			document.getElementById("new_adm").style.visibility="hidden";
			document.getElementById("edit_adm").style.visibility="hidden";
			document.getElementById("del_adm").style.visibility="hidden";
			document.getElementById("new_file").style.visibility="hidden";
			document.getElementById("edit_file_info").style.visibility="hidden";
			document.getElementById("pub_unpub_file").style.visibility="hidden";
			document.getElementById("view_com").style.visibility="hidden";
			document.getElementById("view_tags").style.visibility="hidden";
			document.getElementById(element).style.visibility="visible";
			document.getElementById(element).style.margin-top=0;
		}
		
		function showUser(str)
		{
			if (str=="")
			  {
			   if (str=='-1') 
			   {document.getElementById("optional").style.visibility="hidden";}
			   else 
			   {document.getElementById("optional").style.visibility="visible";}
			  document.getElementById("comm").innerHTML="";
			  return;
			  } 
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("comm").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","content.php?q="+str,true);
			xmlhttp.send();
		}

		
		function val_email()
		{
			var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
			if( !emailPattern.test(document.form.mail.value)) 
			{document.getElementById("admit").style.visibility="hidden";
			document.getElementById("cancel").style.visibility="visible";
			document.getElementById("mail").focus();}
			else
			{document.getElementById("admit").style.visibility="visible"; 
			document.getElementById("cancel").style.visibility="hidden";}
		}
		
	</script>
</head>
<body>
	
	<center style="display:block; background-color:rgba(128, 128, 128, .2); height: 30px; line-height: 30px; ">Welcome <?php echo $_SESSION['admin']; ?> <a href="deconnexion.php"><span style="float:right; margin-right:200px; background-color:rgba(128, 128, 128, .3); font-weight:bold;">Logout</span></a></center><hr color="#0033FF" />
	
	<fieldset>
		<legend align="left">
			<a href="#adm_management"><input type="button" value="Users Management" /></a>
			<a href="#files_management"><input type="button" value="Files Management" /></a>
		</legend>
	
			
			<div id="adm_management">
			<h3>Users Management</h3>
				<table class="tab"><tr><td>
				<?php	
				echo '
					<form id="form" name="form" method="post" action="admin.php">							
						<center>List of Administrators<select onchange="showUser(this.value)" name="admin" id="admin"></center>
							<option value="-1">New</option>';
								$suite=array();
								$suite=$conn->Select('SELECT * FROM users where type="adm" order by username');
								foreach($suite as $user)
								{
									echo '<option value="'.$user['username'].'">'.$user['username'].'</option>';
								}							
							echo
							'</select><br /><hr />

						<span id="comm">
							<table>
								<tr><td align="right"><label for="mail">E-mail</label></td><td align="left"><input type="text" name="mail" id="mail" onBlur="val_email()" required />
								<img id="admit" src="../../images/admit.ico"  style="visibility:hidden;" />
								<img id="cancel" src="../../images/cancel.ico" style="visibility:hidden; margin-left:-15px" /></td></tr>
								<tr><td align="right"><label for="username">Username</label></td><td align="left"><input type="text" name="username" id="username" required /></td></tr>
								<tr><td align="right"><label for="passwd">Password</label></td><td align="left"><input type="password" name="passwd" id="passwd"  /></td></tr>
								<tr><td align="right"><label for="passwd_conf">Password Confirmation </label></td><td align="left"><input type="password" name="passwd_conf" id="passwd_conf"  /></td></tr>
							</table>
						</span>';
					
			
					if(isset($_POST['register']))	 	
					{
						if(($_POST['passwd'] == $_POST['passwd_conf']) and $_POST['username']!="" and $_POST['mail']!="")
						{
							$insert = array();
							$insert[0] = $_POST['username']; 
							$insert[1] = md5($_POST['passwd']);
							$insert[2] = $_POST['mail'];
							$insert[3] = 'adm';
							$insert[4] = 0;
						try
							{
								$retour = $conn->Insert("insert into users(username, password, email, type, blocked) VALUES (?,?,?,?,?)",$insert);		
								$_SESSION['msg'] = 'Try login with the new parameters';
								header("location:deconnexion.php");
							}
							catch (Exception $e)
							{
								echo 'Please verify your inputs';
							}
						}
					}
					
					
					if(isset($_POST['update']))	 	
					{
						if(($_POST['passwd'] == $_POST['passwd_conf']) and $_POST['passwd']!="" and $_POST['username']!="" and $_POST['mail']!="")
						{
							$update = array();
							$update[0] = $_POST['username']; 
							$update[1] = md5($_POST['passwd']);
							$update[2] = $_POST['mail'];
							$update[3] = 0;
						try
							{
								$retour = $conn->update('UPDATE users SET username=?, password=?, email=?, blocked=? where username =\''.$_POST['admin'].'\'', $update);
							}
							catch (Exception $e)
							{
								echo 'Please verify your inputs';
							}
						}
					}
					
					
					if(isset($_POST['block']))	 	
					{
						if(($_POST['passwd'] == $_POST['passwd_conf']) and $_POST['username']!="" and $_POST['mail']!="")
						{
							$update = array();
						try
							{
								$retour = $conn->update('UPDATE users SET blocked=1 where username =\''.$_POST['admin'].'\'', $update);
							}
							catch (Exception $e)
							{
								echo 'Please verify your inputs, and put a new password';
							}
						}
					}
					
					if(isset($_POST['unblock']))	 	
					{
						if(($_POST['passwd'] == $_POST['passwd_conf']) and $_POST['username']!="" and $_POST['mail']!="")
						{
							$update = array();
						try
							{
								$retour = $conn->update('UPDATE users SET blocked=0 where username =\''.$_POST['admin'].'\'', $update);
							}
							catch (Exception $e)
							{
								echo 'Please verify your inputs, and put a new password';
							}
						}
					}
					
					
					if(isset($_POST['delete']))	 	
					{
						if(($_POST['passwd'] == $_POST['passwd_conf']) and $_POST['username']!="" and $_POST['mail']!="")
						{
							$update = array();
						try
							{
								$retour = $conn->Delete('DELETE FROM users where username =\''.$_POST['admin'].'\'', $update);

							}
							catch (Exception $e)
							{
								echo 'Please try again';
							}
						}
					}
					
				echo'
				</td><td valign="bottom">
				<input id="register" name="register" type="submit" value="Add ADM" /><br />
				<div id="optional">
					<input id="update" name="update" type="submit" value="Edit ADM" /><br />
					<input id="block" name="block" type="submit" value="Block" /><input id="unblock" name="unblock" type="submit" value="Unblock" /><br />
					<input id="delete" name="delete" type="submit" value="Delete ADM" /><br />
				</div>
				<input type="reset"  value="Cancel" />
				</td></tr></table>
				
				
				 </form>';
				
				?>
			</div>
			
			<hr />
			
			<div id="files_management">
			<h3>Files Management</h3>
				<form name="files_form" method="post" action="admin.php">
				
					<center><table class="tab">
						 <tr><td align="right"><label for="mission">Mission</label></td><td align="left"><input type="text" name="mission" id="mission" required /></td></tr>
					   <tr><td align="right"><label for="roll">Roll</label></td><td align="left"><input type="text" name="roll" id="roll" required /></td></tr>
						<tr><td align="right"><label for="frame">Frame</label></td><td align="left"><input type="text" name="frame" id="frame" required /></td></tr>
					   <tr><td align="right"><label for="width">Width</label></td><td align="left"><input type="text" name="width" id="width" required /></td></tr>
					   <tr><td align="right"><label for="height">Height</label></td><td align="left"><input type="text" name="height" id="height" required /></td></tr>
						<tr><td align="right"><label for="filesize">Filesize</label></td><td align="left"><input type="text" name="filesize" id="filesize" required /></td></tr>
						<tr><td align="right"><label for="cldp">CLDP</label></td><td align="left"><input type="text" name="cldp" id="cldp" required /></td></tr>
						<tr><td align="right"><label for="lat">Latitude</label></td><td align="left"><input type="text" name="lat" id="lat" required /></td></tr>
						<tr><td align="right"><label for="lon">Longitude</label></td><td align="left"><input type="text" name="lon" id="lon" required /></td></tr>
						<tr><td align="right"><label for="geon">Geon</label></td><td align="left"><input type="text" name="geon" id="geon" required /></td></tr>
						<tr><td align="right"><label for="feat">Feat</label></td><td align="left"><input type="text" name="feat" id="feat" required /></td></tr>
						<tr><td align="right"><label for="url">URL</label></td><td align="left"><input type="text" name="url" id="url" required /></td></tr>
						<tr><td colspan="2" align="center"><input type="submit" value="Submit" id="addd" name="addd" /><input type="reset" value="Cancel" /></td></tr>
					</table></center>
	
					<?php
						if(isset($_POST['addd']))	 	
						{
							$insert = array();
							$insert[0] = $_POST['mission'];
							$insert[1] = $_POST['roll'];
							$insert[2] = $_POST['frame'];
							$insert[3] = $_POST['width'];
							$insert[4] = $_POST['height'];
							$insert[5] = $_POST['filesize'];
							$insert[6] = $_POST['cldp'];
							$insert[7] = $_POST['lat'];
							$insert[8] = $_POST['lon'];
							$insert[9] = $_POST['geon'];
							$insert[10] = $_POST['feat'];
							$insert[11] = $_POST['url']; 
													
								
														
							/*try
								{*/
								$retour = $conn->Insert("insert into files(mission, roll, frame, width, height, filesize, cldp, lat, lon, geon, feat, url) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",$insert);
								//}
								//catch{}
						
						}
					?>
				</form>
			</div>		
		
	
	</fieldset>
	
</body>
</html>