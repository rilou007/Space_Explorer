<html>						
<?php
	session_start();
    require_once("rs.php");
	$bd= new Rs();
if(isset($_GET['path'])){
	$path=$_GET['path'];
}

	//try
				//{
				//$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				//$bd=new PDO('mysql:host=localhost;dbname=nasa','root','',$pdo_options);
				//}catch (Exception $e){die('Erreur de connection');}
				
				$requete=$bd->Select('SELECT lat,lon,feat,geon FROM files where url="'.$path.'"');
				foreach ($requete as $val)
				{
				//$requete->execute(array($path));
				//$val=$requete->fetch();
				
					$lat=$val['lat'];
					$lon=$val['lon'];
					$feat=$val['feat'];	
					$geon=$val['geon'];
				}
?>							
<head>


   <!-- <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsmI0b9uNWLnRG2HgIG0ALjOiTvIMqLss&sensor=false">
    </script>-->
	

	</head>
	
	<body>
								
									<div style="float:left;width:500px;height:500px;border:yellow solid 2px;" id="img" >
                                        <img id="images" src="<?php echo $path ?>" alt=""/>
                                    </div>
									
										
								<!-- FOR THE MAP-->
								<a href="map.php?lat=<?php echo $lat?>&lon=<?php echo $lon?>&feat=<?php echo $feat?>">See the map</a>
												
												
												
												
												
												<!-- END THE MAP-->
												
												<!--for textarea-->
												<div style="background: #000; float: right; width: 380px; margin-left: 10px; height: 70px; margin-bottom: 10px;">
													<form action="comment_post.php" method="post">
													<!--form action="" method="post"-->
														<fieldset id="fieldset_uregister"> 
															<legend>Add comments</legend>
															<?php
															
																
																if(isset($_SESSION['username']))
																	{
																		?>
																			<input type="text" class="input_comment" style=" width: 250px " alt="Comment" maxlength="256" name="comment"/>
																			<input type="hidden" value="<?php //echo $tab[0];?>" name="file">
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
																			<input type="hidden" value="<?php //echo $tab[0];?>" name="file">
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
												
		</body>
									
</div>