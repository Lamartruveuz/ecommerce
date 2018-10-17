<!DOCTYPE html>
<?php session_start(); ?>
<html>

	<head>
		<title>Site_E-commerce.com</title>
		<link rel="stylesheet" href="Couleurs/Couleurs.css"/>
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
				<img class="imagebandef" src="./images/Freddy.jpg"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Mask
				<img class="imagebandef" src="./images/mask.jpg"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#DF6
				<img class="imagebandef" src="./images/Destination final 6.jpg"/>
			</marquee>
		</div>
		<br/>
		<div>
			<ul class="menuderoulant">
				<li><a href="">Compte</a>
					<ul>
						<?php if(!isset($_SESSION["id"])) {?>
						<li><a href="./inscription.php">Créer un compte</a></li>
						<li><a href="./connexion.php">Connexion</a></li>
						<?php } 
						else{?>
						<li><a href="account.php">Mon compte</a></li> <?php }?>
					</ul>
				</li>
				<li><a href="">Articles</a>
					<ul>
						<li><a href="./news.php">Nouveautés</a></li>
						<?php if(isset($_SESSION["id"])) {?>
						<li><a href="./cart.php">Panier</a></li>
						<li><a href="">Favoris</a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a href="./search.php">Recheche</a>
				</li>
			</ul>
		</div>
	</body>
</html>