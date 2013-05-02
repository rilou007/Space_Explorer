<?php
require_once("../../rs.php");
$conn= new Rs();
$id=$_GET["q"];
if ($id==-1)
{
	echo '
	<table>
		<tr><td align="right"><label for="mail">E-mail</label></td><td align="left"><input type="text" name="mail" id="mail" onBlur="val_email()" required />
		<img id="admit" src="../../images/admit.ico"  style="visibility:hidden;" />
		<img id="cancel" src="../../images/cancel.ico" style="visibility:hidden; margin-left:-15px;" /></td></tr>
		<tr><td align="right"><label for="username">Username</label></td><td align="left"><input type="text" name="username" id="username" required /></td></tr>
		<tr><td align="right"><label for="passwd">Password</label></td><td align="left"><input type="password" name="passwd" id="passwd" /></td></tr>
		<tr><td align="right"><label for="passwd_conf">Password Confirmation </label></td><td align="left"><input type="password" name="passwd_conf" id="passwd_conf" /></td></tr>
	</table>
	';
}
else
{
	$suite=array();
	$suite=$conn->Select('SELECT * FROM users where type="adm" and username = "'.$id.'"');
	foreach($suite as $user)
	{		
		echo '
		<table>
			<tr><td colspan="2" align="center">'.(($user['blocked']==0) ? "This user is unblocked" : "This user has been blocked" ).'</td></tr>
			<tr><td align="right"><label for="mail">E-mail</label></td><td align="left"><input type="text" name="mail" id="mail" onBlur="val_email()" required value="'.(isset($user['email']) ? $user['email']: "" ).'" />
			<img id="admit" src="../../images/admit.ico"  style="visibility:hidden;" /></td></tr>
			<img id="cancel" src="../../images/cancel.ico" style="visibility:hidden; margin-left:-15px;" /></td></tr>
			<tr><td align="right"><label for="username">Username</label></td><td align="left"><input type="text" name="username" id="username" required value="'.(isset($user['username']) ? $user['username']: "" ).'" /></td></tr>
			<tr><td align="right"><label for="passwd">Password</label></td><td align="left"><input type="password" name="passwd" id="passwd" value="" /></td></tr>
			<tr><td align="right"><label for="passwd_conf">Password Confirmation </label></td><td align="left"><input type="password" name="passwd_conf" id="passwd_conf" value="" /></td></tr>
		</table>';
	}
}
?>