<!DOCTYPE html>
    <html>
        <head>
            <title>Congratulation!!!</title>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
				
				<form id="content">
			    <div id="img_content_block">
                    
                </div>
				
                <div id="register">
					<h1>Congratulation </h1>
					<h4>
						Congratulation!!! You have recieved an email to confirm your registration... <br/> <a href="http://nasa.logipam.org" title="Home page">Return to the home page!</a>
					</h4>
							<br/><br/><br/><br/>
			
</form>			
            </div>
            
        </body>
    </html>
