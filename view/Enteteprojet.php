<!DOCTYPE html>
<html>
	<head>
		<title>Site_E-commerce.com</title>
		<link rel="stylesheet" href="Couleurs/Couleurs.css"/>
		<?php if(isset($_SESSION["id"]))
		{
		 $users = SearchIdUser($_SESSION["id"])?>
			<p class="connexionshown"><?php echo $users["email"]?>
				<p class="connexionstate">Connected :</p>
			</p>
		<?php
		}
		?>
	</head>

	<header>
		<h1 class="TitreSite">Site de E-Commerce</h1>
		<h3 class="Soustitre">Site de reférence pour le E-shopping</h3>
	</header>

	<body>
		<br/>
		<br/>
		<br/>
		<br/>
		<div>
			<marquee class="bandef" direction ="left">
				#Nightmare
				<img class="imagebandef" src="images/Freddy.jpg"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Mask
				<img class="imagebandef" src="images/mask.jpg"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#DF6
				<img class="imagebandef" src="images/Destination final 6.jpg"/>
			</marquee>
		</div>
		<br/>
		<div>
			<ul class="menuderoulant">
				<li><a href="">Compte</a>
					<ul>
						<?php 
						if(!isset($_SESSION["id"]))
						{
						?>
							<li><a href="index.php?page=inscription">Inscription</a></li>
							<li><a href="index.php?page=connexion">Connexion</a></li>
						<?php
						}
						else {
							?>
							<li><a href="index.php?page=account">Mon Compte</a></li>
						<?php
						}	
						?>
					</ul>
				</li>
				<li><a href="">Articles</a>
					<ul>
						<li><a href="index.php?page=news">Nouveautés</a></li>
						<?php 
						if(isset($_SESSION["id"]))
						{
						?>
						<li><a href="index.php?page=cart">Panier</a></li>
						<li><a href="">Favoris</a></li>
						<?php 
						} 
						?>
					</ul>
				</li>
				<li><a href="index.php?page=search">Recheche</a>
				</li>
			</ul>
		</div>
	</body>
</html>