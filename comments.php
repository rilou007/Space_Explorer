<?php
	session_start();
    require_once("rs.php");
	$bd= new Rs();
	$h=0;
    
		if (isset($_GET['id_file']))
			$idComment = $_GET['id_file'];
		else 
			header('location:index.php');
	
?>

<!DOCTYPE html>
    <html>
        <head>
			<?php
				if(isset($_SESSION['username']))
					{
						?><title><?php echo $_SESSION['username'];?> see all the comments</title><?php
					}
				else
					{
						?><title> All the comments </title><?php
					}
			?>
			<link rel="stylesheet" type="text/css" href="style2.css" />
            <link rel="stylesheet" type="text/css" href="style1_.css" />
            <link rel="stylesheet" type="text/css" href="style2_.css" />
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	    <script src="jquery.js"></script>
	    <script type="text/javascript">
                function example_ajax_request() {
                  $('#example-placeholder').html('<p><img src="img/ajax-loader.gif"/></p>');
                  $('#example-placeholder').load("<div>BONJOUR</div>");
                }
	   </script>
			
			<style type="text/css">
                body {
                    background: url(../img/ice.png);
                }
				.fieldset{
					color:black;
					margin-left: 100px;
					width:500px;
				}
                
				table{
					text-align:center;
				}
				legend{
					color:black;
					margin-left: 100px;
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
				
				<div>
						<?php 
							
							$requete=$bd->Select('SELECT * from comments c inner join files f on url = path_file left outer join year_mission using(mission) where f.id ='.$idComment.' limit 1');//SELECT path_file from comments c where c.id ='.$idComment);
							foreach ($requete as $val)
							{
								echo '<center><table style="float:right; margin-right: 100px;"><tr><td><img src="'.$val['path_file'].'" /></td></tr><tr><td valign="middle"><h5>Mission : '.
								$val['mission'].' ('.$val['year_mission'].')<br />Picture of : '.$val['geon']
								.'<br /><a href="index.php">Home page</a></td></tr></table></h5></center>
								
								
								<legend><h3 class="fieldset1">Related Comments :</h3></legend>
								';
								$requete2=$bd->Select('SELECT * from comments c inner join files on url = c.path_file left outer join year_mission using(mission) where path_file ="'.$val['path_file'].'"');
								echo '<table class="fieldset" border="1" cellspacing="10"><tr>';
								foreach ($requete2 as $val2)
								{
									$url = 'comments.php?idComment='.$val2['id'];
									echo '<tr><td align="center" style="width:105px;"><u>'.$val2['username'].'</u><hr /><small>('.$val2['date_comment'].')</small></td><td style="width:300px; text-align:left;"><b>'.$val2['comment'].'</b></td><td style="width:50px;"><img src="images/report.png" onclick="window.open(\''.$url.'\')" style="cursor:pointer;" height="20" width="20" /></td></tr>';
								}
								echo '</tr></table>';
								
							}						
						?>
						
					</div>
            
        </body>
    </html>
