<?php
$message = "		          <html>
			                      <head>
				                      <style type='text/css'>
					                      .content {
					                        margin: auto;
					                        text-align: center;
					                        max-width: 600px;
					                        width: 75%;
					                        background-color: rgba(200,200,200,0.2);
					                      }
					                      button {
											font-size: 18px;
											font-weight: bold;
											color: white;
											width: 40%;
											padding: 20px;
											background:#9b59b6; 
											border:0 none;
											cursor:pointer;
											-webkit-border-radius: 5px;
											border-radius: 5px; 
										  }

										  button:hover {
									        background:#724684; 
										  }

										  .banner{
						                     margin: auto;
											 max-width: 600px;
					                         width: 75%;
										  	 background-color: #9b59b6;
											 color: white;
											 font-weight: bold;
											 font-size: 25px;
											 text-align: center;
											 padding-top: 4%;
											 padding-bottom: 4%;
										  }
										  .logo{
										  	margin: auto;
										  	text-align: center;
										  	width: 35%;
										  }
				                      </style>
			                      </head>
			                      <body>

				                      <div class='logo'> <img src='http://cache.media.education.gouv.fr/image/General/95/4/logo_web_Dijon_653954.png'/></div>
				                      <div style='margin:auto;height:600px;padding:50px;background-color:white;'>
				                      <div class='banner'>Invitation à un événement organisé par le rectorat de l'académie de Dijon</div>
				                      <div class='content'>
				                      	<p> Bonjour, <br />
				                    	{$_POST['msg']} <br /><br />
				                    	Pour confirmer votre présence ou votre absence, veuillez remplir le formulaire accessible en cliquant sur le lien çi-dessous : <br /> <br />
		                    	  		<button>Cliquez ici</button>
		                    	  	  </div>
			                      </body>
		                      </html>
	";