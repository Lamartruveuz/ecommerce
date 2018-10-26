<!DOCTYPE html>
<?php session_start();?>
<html>
	<?php
		$bdd = new PDO('mysql:host=localhost;dbname=projetecommerce','root','');
	?>
	<head>
		<title>Site_E-commerce.com</title>
		<link rel="stylesheet" href="Couleurs/Couleurs.css"/>
		<?php if(isset($_SESSION["id"]))
		{
		?>
		<?php $users = $bdd->query("SELECT * FROM users WHERE users.id=".$_SESSION["id"])->fetch()?>
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
						<li><a href="inscription.php">Créer un compte</a></li>
						<li><a href="connexion.php">Mon compte</a></li>
					</ul>
				</li>
				<li><a href="">Articles</a>
					<ul>
						<li><a href="news.php">Nouveautés</a></li>
						<li><a href="cart.php">Panier</a></li>
						<li><a href="">Favoris</a></li>
					</ul>
				</li>
				<li><a href="./search.php">Recheche</a>
				</li>
			</ul>
		</div>
	</body>
</html>