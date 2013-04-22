<?php
	session_start();
    $i=0;
    
    $tab = array();
    $tab2 = array();
    try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bd=new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
    }catch (Exception $e){
	die('Erreur de connection');
    }
    
    $requete=$bd->query('SELECT url, geon, feat FROM files ORDER BY RAND() LIMIT 12');
    //$requete->execute(array($username));
    while($val=$requete->fetch()){
	//$name=$val['name'];
	$path=$val['url'];
	$country=$val['geon'];
	$desc=$val['feat'];
	//$width=$val['width'];
	//$height=$val['height'];
	//$info=pathinfo($path);
	$tab[$i] = $path;
	$tab1[$i] = $country;
	$tab2[$i] = $desc;
	$i++;
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <?php
				if(isset($_GET['conn']))
					{
						?><title>Hi <?php echo $_SESSION['username'];?></title><?php
					}
				else
					{
						?><title> Nasa space explorer </title><?php
					}
			?>
			
			
            <link rel="stylesheet" type="text/css" href="style1.css" />
            <link rel="stylesheet" type="text/css" href="style2.css" />
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="jquery.js"></script>
            <script type="text/javascript">
               function example_ajax_request() {
                  $('#example-placeholder').html('<p><img src="img/ajax-loader.gif"/></p>');
                  $('#example-placeholder').load("<div>BONJOUR</div>");
                }
				
				
			$(document).ready(function() {
							
				var latlng = new google.maps.LatLng(18.53917,-72.33917);		
				var myOptions = {
					zoom: 17, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				
				var map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas3"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas4"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas5"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas6"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas7"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas8"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas9"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas10"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas11"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas12"), myOptions);
						
			});
			
            </script>
	    <!--Adding Verification code-->
	    <script>

			function surligne(champ, erreur)
				{
					if(erreur)
						champ.style.backgroundColor = "#fba";
					else
						champ.style.backgroundColor = "";
				}
			
			function erreurConn(champ, erreur)
				{
					if(erreur)
						champ.value= "Il y a erreur dans vos identifiants...";
					else
						champ.style.backgroundColor = "";
				}

			function verifNom(champ)
				{
					if(champ.value.length < 1)
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}

			function verifMail(champ)
				{
					var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
					if(!regex.test(champ.value))
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}
				
				
			function verifPass(champ)
				{
					if(champ.value.length < 1 || champ.value.length > 20)
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}
				
			function verifPass1(pass, confPass)
				{
					if(confPass.value.length < 1 || confPass.value.length > 20)
						{
							surligne(confPass, true);
							return false;
						}
					else
						{
							if(confPass.value === pass.value)
								{
									surligne(confPass, false);
									return true;
								}
							else
								{
									surligne(confPass, true);
									return false;
								}
						}
				}
			
				
			function verifForm(f)
				{
					var nomOk = verifNom(f.nom);
					var mailOk = verifMail(f.mail);
					var passOk = verifPass(f.motDePasse);
					
					if(nomOk && passOk && mailOk)
						return true;
					else
						{
							alert("Rassurez-vous d'avoir fourni toutes les informations requises!");
							return false;
						}
				}
				
		
	</script>
	    <!--Adding JQUERY ANIMATION -->
            <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
				// Dialog 1			
				$('#dialog1').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link1
				$('#dialog_link1').click(function(){
					$('#dialog1').dialog('open');
					return false;
				});
                                /////////////////////
                                // Dialog 2			
				$('#dialog2').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link2').click(function(){
					$('#dialog2').dialog('open');
					return false;
				});
                                ///// Dialog 3			
				$('#dialog3').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link3').click(function(){
					$('#dialog3').dialog('open');
					return false;
				});
                                ///// Dialog 4			
				$('#dialog4').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link4').click(function(){
					$('#dialog4').dialog('open');
					return false;
				});
                                ///// Dialog 5			
				$('#dialog5').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 5
				$('#dialog_link5').click(function(){
					$('#dialog5').dialog('open');
					return false;
				});
                                ///// Dialog 6			
				$('#dialog6').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 6
				$('#dialog_link6').click(function(){
					$('#dialog6').dialog('open');
					return false;
				});
                                ///// Dialog 7			
				$('#dialog7').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 7
				$('#dialog_link7').click(function(){
					$('#dialog7').dialog('open');
					return false;
				});
                                ///// Dialog 8			
				$('#dialog8').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 8
				$('#dialog_link8').click(function(){
					$('#dialog8').dialog('open');
					return false;
				});
                                ///// Dialog 9			
				$('#dialog9').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 9
				$('#dialog_link9').click(function(){
					$('#dialog9').dialog('open');
					return false;
				});
                                ///// Dialog 10			
				$('#dialog10').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 10
				$('#dialog_link10').click(function(){
					$('#dialog10').dialog('open');
					return false;
				});
                                ///// Dialog 11			
				$('#dialog11').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 11
				$('#dialog_link11').click(function(){
					$('#dialog11').dialog('open');
					return false;
				});
                                ///// Dialog 12			
				$('#dialog12').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 12
				$('#dialog_link12').click(function(){
					$('#dialog12').dialog('open');
					return false;
				});
                                ///
                                
                                ///Login
                                // login			
				$('#login').dialog({
					autoOpen: false,
					width: 525,
					resizable: false,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
                                // Dialog Link
				$('#login_link').click(function(){
					$('#login').dialog('open');
					return false;
				});
				
				// Register			
				$('#register').dialog({
					autoOpen: false,
					width: 500,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
                                // Register Link
				$('#register_link').click(function(){
					$('#register').dialog('open');
					return false;
				});
			});
		</script>
        </head>
        <body>
            <div id="global">
                <div id="top_bar_head">
                    <div class="name_container">
                        <img src="img/g3969.png" alt="logo" style="width: 145px; height: 100px;float: left; margin-right: 5px; margin-top:5px;" />
                        <br/><br/><a style="font-size: 25px; font-weight: bold; "><h2>Space Explorer</h2></a>
			<!--<ul id="menu">
				<li>
				    <a href="#">Category</a>
				    <ul>
					<li><a href="#">Securite</a></li>
					<li><a href="#">Cadre de vie</a></li>
					<li><a href="#">Economie</a></li>
					<li><a href="#">Jeunesse et Sport</a></li>
					<li><a href="#">Action Sociales</a></li>
					<li><a href="#">Vie Associative</a></li>
					<li><a>*************************************************</a></li>
				    </ul>
				</li>
				<li>
				    <a href="#">Language</a>
				    <ul>
					<li><a href="#">Securite</a></li>
					<li><a href="#">Cadre de vie</a></li>
					<li><a href="#">Economie</a></li>
					<li><a href="#">Jeunesse et Sport</a></li>
					<li><a href="#">Action Sociales</a></li>
					<li><a href="#">Vie Associative</a></li>
					<li><a>*************************************************</a></li>
				    </ul>
				</li>
			</ul>
			-->
                    </div>
                    <div class="search_container">
                        <div class="block_registrer">
                            <?php
								if(isset($_SESSION['username']))
									{
										?> <a href="logout.php" id="login_link1" class="ui-state-default ui-corner-all">Logout</a><?php
									}
								else
									{
										?><a id="login_link" class="ui-state-default ui-corner-all">Login</a><?php
									}
							?>
                            <a id="register_link" class="ui-state-default ui-corner-all">REGISTER</a>
							<a id="login_link">ENGLISH</a>
                            <a id="login_link">FRENCH</a>
                            </div>
                       
                             <div id="login" title="LOGIN">
								<form method="post" action="login_post.php">
									<img src="img/bg_world_login.jpg" alt="" style="margin-bottom: 5px;"/>
									<div class="input_block">   
										<label class="for_label">USERNAME</label>
										<input type="text" alt="" class="for_input" name="userName" placeholder="Username"/>
									</div>
									<div class="input_block">
										<label class="for_label">PASSWORD</label>
										<input type="password" alt="" name="password" class="for_input"/>
									</div>
                                
									<input type="submit" class="for_submit" alt="" value="LOGIN"/>
									
									<a href="">Forgot your password?</a><br/>
									<a href="registration/account.php">Create an Account.</a>
                             </form>
							 </div>
                        
			
                        
			
                             <div id="register" title="REGISTER">
								<form onsubmit="return verifForm(this)" method="post" action="register_post.php">
									<div class="input_block">   
										<label class="for_label">USERNAME</label>
										<input type="text" alt="" class="for_input" name="userName" onblur="verifNom(this)"/>
									</div>
									
									<div class="input_block">
										<label class="for_label">EMAIL</label>
										<input type="text" alt="" class="for_input" name="email" onblur="verifMail(this)"/>
									</div>
                                
									<div class="input_block">
										<label class="for_label">PASSWORD</label>
										<input type="password" alt="" class="for_input" name="password" onblur="verifPass(this)"/>
									</div>
									
									<div class="input_block">
										<label class="for_label">CONFIRM PASSWORD</label>
										<input type="password" alt="" class="for_input" name="cpassword" onblur="verifPass1(password,this)"/>
									</div>
                                
									<input type="submit" class="for_submit" alt="" value="REGISTER"/>
                              </form>
							 </div>
                       
			
                        
                                <!--<input type="radio" name="rdio" /><label class="lab_type">IMAGES</label>
                                <input type="radio" name="rdio" /><label class="lab_type">VIDEOS</label-->
                            <div id="searchbox">
								<!--form method="post" action="recherche_post.php"-->
								<form method="post" action="">
                                <input id="search" type="text" name="recherche" placeholder="Type here">
                                <input id="submit" type="submit" value="Search">
								</form>
							</div>
                        
                    </div> 
                </div>
                
                <div id="head">
                    
                </div>
                
                <div id="content">
                    <div id="left_pane">
                        <div class="block">
                            <a href="" class="img_back1 blow" style="background: url(<?php echo $tab[0]?>) no-repeat center center;" id="dialog_link1" class="ui-state-default ui-corner-all">
                            <div class="bottom_span_text"><?php echo $tab2[0] . " <br/>" . "<small>" . $tab1[0] . "</small>"; ?></div>
							<div class="bottom_span"></div>
							<div id="dialog1" title="Dialog Title">
									<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
									<div style="float: left;">
                                        <img src="<?php echo $tab[0]?>" alt=""/>
                                    </div>
				    
								<!-- FOR THE MAP-->
												<div id="map_canvas" style="float: left; background: #000; width: 380px; height: 300px; margin-left: 10px; margin-bottom: 10px; text-align:center;">
													
												</div>
												<!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
										</div>
						</a>
                            
						<a href="" class="img_back2 blow" style="background: url(<?php echo $tab[1]?>) no-repeat center center;" id="dialog_link2" class="ui-state-default ui-corner-all">
                            <div class="bottom_span_text"><?php echo $tab2[1]  . " <br/>" . "<small>" . $tab1[1] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog2" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[1]?>" alt=""/>
								</div>
				    
								<!-- FOR THE MAP-->
												<div id="map_canvas2" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
												
												</div>
												<!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
										</div>
						</a>
                            
						<a href="" class="img_back3 blow" style="background: url(<?php echo $tab[2]?>) no-repeat center center;" id="dialog_link3" class="ui-state-default ui-corner-all">
							<div class="bottom_span_text"><?php echo $tab2[2]  . " <br/>" . "<small>" . $tab1[2] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog3" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[2]?>" alt=""/>
								</div>
								
								<!-- FOR THE MAP-->
												<div id="map_canvas3" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
												</div>
												<!-- END THE MAP-->
						
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
						</a>
					</div>
                        
					<div class="block">
						<a href="" class="img_back4 blow" style="background: url(<?php echo $tab[3]?>) no-repeat center center;" id="dialog_link4" class="ui-state-default ui-corner-all">
							<div class="bottom_span_text"><?php echo $tab2[3]  . " <br/>" . "<small>" . $tab1[3] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog4" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[3]?>" alt=""/>
								</div>
				
								<!-- FOR THE MAP-->
										<div id="map_canvas4" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
										<!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
						</a>
						
						<a href="" class="img_back5 blow" style="background: url(<?php echo $tab[4]?>) no-repeat center center;" id="dialog_link5" class="ui-state-default ui-corner-all">
							<div class="bottom_span_text"><?php echo $tab2[4]  . " <br/>" . "<small>" . $tab1[4] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog5" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[4]?>" alt=""/>
								</div>
				
								 <!-- FOR THE MAP-->
					<div id="map_canvas5" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
						</a>
						
						<a href="" class="img_back6 blow" style="background: url(<?php echo $tab[5]?>) no-repeat center center;" id="dialog_link6" class="ui-state-default ui-corner-all">
							<div class="bottom_span_text"><?php echo $tab2[5]  . " <br/>" . "<small>" . $tab1[5] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog6" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[5]?>" alt=""/>
								</div>
				
								<!-- FOR THE MAP-->
					<div id="map_canvas6" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
						</a>
                    </div>
                        
					<div class="block">
						<a href="" class="img_back7 blow" style="background: url(<?php echo $tab[6]?>) no-repeat center center;" id="dialog_link7" class="ui-state-default ui-corner-all">
							<div class="bottom_span_text"><?php echo $tab2[6]  . " <br/>" . "<small>" . $tab1[6] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog7" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[6]?>" alt=""/>
								</div>
				
							<!-- FOR THE MAP-->
					<div id="map_canvas7" style="float: left; width: 500px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
					</a>
					<a href="" class="img_back8 blow" style="background: url(<?php echo $tab[7]?>) no-repeat center center;" id="dialog_link8" class="ui-state-default ui-corner-all">
						<div class="bottom_span_text"><?php echo $tab2[7]  . " <br/>" . "<small>" . $tab1[7] . "</small>";?></div>
							<div class="bottom_span"></div>
							<div id="dialog8" title="Dialog Title">
								<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
								<div style="float: left;">
									<img src="<?php echo $tab[7]?>" alt=""/>
								</div>
						
							<!-- FOR THE MAP-->
					<div id="map_canvas8" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
					</a>
                    
					<a href="" class="img_back9 blow" style="background: url(<?php echo $tab[8]?>) no-repeat center center;" id="dialog_link9" class="ui-state-default ui-corner-all">
						<div class="bottom_span_text"><?php echo $tab2[8]  . " <br/>" . "<small>" . $tab1[8] . "</small>";?></div>
						<div class="bottom_span"></div>
						<div id="dialog9" title="Dialog Title">
							<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
							<div style="float: left;">
								<img src="<?php echo $tab[8]?>" alt=""/>
							</div>
							
							<!-- FOR THE MAP-->
					<div id="map_canvas9" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
					</a>
				</div>
                        
				<div class="block">
					<a href="" class="img_back10 blow" style="background: url(<?php echo $tab[9]?>) no-repeat center center;" id="dialog_link10" class="ui-state-default ui-corner-all">
						<div class="bottom_span_text"><?php echo $tab2[9]  . " <br/>" . "<small>" . $tab1[9] . "</small>";?></div>
						<div class="bottom_span"></div>
						<div id="dialog10" title="Dialog Title">
							<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
							<div style="float: left;">
								<img src="<?php echo $tab[9]?>" alt=""/>
							</div>
				    
							<!-- FOR THE MAP-->
					<div id="map_canvas10" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
                                    </div>
					</a>
					
					<a href="" class="img_back11 blow" style="background: url(<?php echo $tab[10]?>) no-repeat center center;" id="dialog_link11" class="ui-state-default ui-corner-all">
						<div class="bottom_span_text"><?php echo $tab2[10]  . " <br/>" . "<small>" . $tab1[10] . "</small>";?></div>
						<div class="bottom_span"></div>
						<div id="dialog11" title="Dialog Title">
							<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
							<div style="float: left;">
								<img src="<?php echo $tab[10]?>" alt=""/>
							</div>
				
						<!-- FOR THE MAP-->
					<div id="map_canvas11" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->                          
												</div>
					</a>
					<a href="" class="img_back12 blow" style="background: url(<?php echo $tab[11]?>) no-repeat center center;" id="dialog_link12" class="ui-state-default ui-corner-all">
						<div class="bottom_span_text"><?php echo $tab2[11]  . " <br/>" . "<small>" . $tab1[11] . "</small>";?></div>
						<div class="bottom_span"></div>
						<div id="dialog12" title="Dialog Title">
							<p><?php echo $tab2[0]?> <?php echo $tab1[0]?> !!!</p>
							<div style="float: left;">
								<img src="<?php echo $tab[11]?>" alt=""/>
							</div>
				
							<!-- FOR THE MAP-->
					<div id="map_canvas12" style="float: left; width: 380px; height: 300px; background: #000; margin-left: 10px; margin-bottom: 10px;">
                                            
                                        </div>
				    <!-- END THE MAP-->
				    
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
																try
																	{	
																		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
																		$bdd = new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
																		$a=$tab[0];
																		$req = $bdd->query("SELECT * FROM comments where path_file = '$a'");
																		if($donnees = $req->fetch()){
																			?>
																				Last comment: <?php echo $donnees['name_user'];?> <?php echo $donnees['date_comment'];?><br/>
																				<label><?php echo $donnees['comment'];?></label>
																			<?php
																		}
																	}
																catch(Exception $e)
																	{
																		die('Erreur : '.$e->getMessage());
																	}
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Buttton" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Comment" maxlength="256" name="comment"/>
																			<button href="index.php">Login to comment</button>
																		<?php
																	}
															?>
														</fieldset>
													</form>
												</div>
												<!--END textarea-->
							
												<!--for ICON-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="tag_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add tags</legend>
															<?php
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Tag" maxlength="45" name="tag"/>
																			<input type="hidden" value="<?php echo $tab[0];?>" name="file">
																			<input type="submit" class="submit_btn" alt="Submit Button" name="submit" value="Submit" />
																		<?php
																	}
																else
																	{
																		?>
																			<input type="text" readonly class="input_comment" style=" width: 200px " alt="Tag" maxlength="45" name="tag"/>
																			<button href="index.php">Login to tag</button>
																		<?php
																	}
															?>
															
														</fieldset>
													</form>
												</div>
												<!--END ICON-->
												</div>
					</a>
				</div>
    
			</div>
                    
                    <!--<div id="right_pane">
                        
                    </div>-->
                </div>
            </div>
            <div id="footer">
                  <div><?php include("api.php"); ?></div>
            </div>
        </body>
    </html>