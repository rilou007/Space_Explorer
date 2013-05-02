<!DOCTYPE html>
    <html>
        <head>
            <title>About us and the Space Explorer</title>
            <style type="text/css">
            h1, h2, h3, h4, h5, h6 {
            margin: 0;
            padding: 0;
            }
            a { color: #fff; opacity: 1; margin: 0;}

                body {
                    background: url(../img/ice.png);
                    margin: 0;
                    padding: 0;
                    font-size: small;
                    font-family:tahoma, geneva, sans-serif;
                }
                #global {
                    width: 1050px;
                    height: 700px;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 10px;
                    margin-bottom: 10px;
                    background: #fff;
                    clear: both;
                    -moz-box-shadow: 0 0 5px #000;
                    -webkit-box-shadow: 0 0 5px #000;
                    box-shadow: 0 0 5px #000;
                    display: table;
                }
		#head {
		    height: 300px;
		    border: 1px solid #e5e5e5;
		}
                #content {
                    width: 1040px;
                    margin: auto;
                }
                #content h1 {
                   background: #e5e5e5;
                   color: #fff;
                   text-shadow: 0 1px 1px #000;
                }
                #content a {
                   color: #666666;
                }
                .element {
                   width: 100px;
                   height: 150px;
                   border: 1px dotted #cccccc;
                   float: left;
                   margin-right: 5px;
                   margin-bottom: 5px;
                   padding: 2px;
                   font-size: smaller;
                }
                .element:hover {
                   background: #e5e5e5;
                   border-top: none;
                }
                .text_line {
                   background: #e5e5e5;
                   margin: 0;
                }
            </style>
            <link rel="stylesheet" type="text/css" href="../style2.css" />
            <!--++++++++++SLIDER CONTENT+++++++++++++++++++-->
            <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	    <script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
	    <script type="text/javascript" src="http://webplayer.yahooapis.com/player.js"></script> 
	    <script type="text/javascript">
	    $(document).ready(function(){
		$('#slideshow').cycle({
		    fx:     'fade',
		    speed:  'slow',
		    timeout: 5000,
		    pager:  '#slider_nav',
		    pagerAnchorBuilder: function(idx, slide) {
			// return sel string for existing anchor
			return '#slider_nav li:eq(' + (idx) + ') a';
		    }
		});
	    });
	    </script>
            <!--==========END+++++++++++++++++-->
        </head>
        
        <body>
            <div id="global">
                <div id="head" style="">
			<div id="slideshow" style="float: left;">
			        <div class="splash"><img src="img/1.jpg"  alt="icon" /></div>
			        <div class="splash"><img src="img/2.jpg"  alt="icon" /></div>
			        <div class="splash"><img src="img/4.jpg"  alt="icon" /></div>
			        
			</div>	
	
			<div style="width: 515px; height: 250px; float: right; margin-left: 5px; margin-right: 5px; font-size: smaller;">
			   <h2 style="background: #666666; color: #fff; text-shadow: 0 1px 1px #000; margin-bottom: 1px; ">Space Explorer</h2>
			   <ul class="text_line">
			      Picstoria is a "taggable" visual database of approximately 300,000 pictures of the Earth from Space, accumulated since 1946, aiming at solving The Blue Marble challenge. Picstoria provides an interactive visual timeline of world events and pictures from space associated with them. Each entry includes a combination of associated information (picture, past and present event, geolocation, searching, browsing and visualization tools). The following features will facilitate accessibility to these visual unexploited treasures:
<br/>1. From the home page, the human Visitor can view the photos as well as zoom on it. When the visitor clicks on the selected image, he will be presented with more information linked to the clicked picture (geolocation, tags, comments, mission). Note that comments from other Visitors can also be viewed.
<br/>2. From the home page, the Visitors can move through the picture database thanks to a space shuttle shaped navigation tool (left and right arrows).
<br/>3. A search tool is also available on the home page to facilitate specific searches (by country for example).
<br/>4. The Visitor can also register to upload its own tags and comments
<br/>5. NASA administrators have a special status and can login to access a more thorough administrative interface allowing them, not only to execute traditional admin actions (add/remove/edit users) but also to upload files and pertinent information. They will also be able to vet Visitors' comments and tags.
			   </ul>
			</div>	
                </div>
                <div id="content">
                    <h1>Our Team</h1>
                    <div class="element">
                      <img src="img/Amos_Sejour.jpg" alt="Amos Sejour"/>
                      <h4>Amos Sejour</h4>
                        <a>Engineer</a>
                    </div>
                    <div class="element">
                      <img src="img/Augustin_Guiscard.jpg" alt="Augustin Guiscard"/>
                      <h4>Augustin Guiscard</h4>
                        <a>Engineer</a>
                    </div>
                    <div class="element">
                      <img src="img/Benoit_Olivier_Jacquets.jpg" alt="Benoit Olivier Jacquets"/>
                      <h4>Benoit Olivier Jacquets</h4>
                      <a>Web Developer</a>
                    </div>
                    <div class="element">
                      <img src="img/Bob_Charlemagne.jpg" alt="Bob Charlemagne"/>
                      <h4>Bob Charlemagne</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                     <img src="img/Cyril-Mary_Hilaire.jpg" alt="Cyril-Mary Hilaire"/>
                     <h4>Cyril-Mary Hilaire</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                    <img src="img/Jean_Came_Poulard.jpg" alt="Jean Came Poulard"/>
                    <h4>Jean Came Poulard</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                    <img src="img/Midy_Evens.jpg" alt="Midy Evens"/>
                    <h4>Midy Evens</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                    <img src="img/Ralph_Alex_Charlemagne.jpg" alt="Ralph Alex Charlemagne"/>
                    <h4>Ralph Alex Charlemagne</h4>
                      <a>Web Developer</a>
                    </div>
                    
                    <div class="element">
                    <img src="img/Reginald_Louis.jpg" alt="Reginald Louis"/>
                    <h4>Reginald Louis</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <hr style="clear: both; border: 1px solid #e5e5e5;"/>
                    
                    <div class="element">
                    <img src="img/Richardson_Ciguene.jpg" alt="Richardson Ciguene"/>
                    <h4>Richardson Ciguene</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                    <img src="img/Suy_Emmanuel.jpg" alt="Suy Emmanuel"/>
                    <h4>Suy Emmanuel</h4>
                      <a>Engineer</a>
                    </div>
                    
                    <div class="element">
                    
                    </div>
                    
                    <div class="element">
                    
                    </div>
                    <div class="element">
                    
                    </div>
                    <div class="element">
                    
                    </div>
                    <div class="element">
                    
                    </div>
                    <div class="element">
                    
                    </div>
                    <div class="element">
                    
                    </div>
                </div>
            </div>
            <?php
	      include('../footer.inc.php');
	    ?>
        </body>
    </html>
