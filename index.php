<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="CTT Rolle est le club de tennis de table de la ville de Rolle">

<link rel="stylesheet" type="text/css" href="css/themes/dark.css">

<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">

<?php
	include("./utils/configuration_managers.php");
	include("./config/config.php");

	include("./utils/database.php");
	include("./utils/mail.php");




	$page = "accueil";

	if(isset($_GET['page'])) {
    $page  = htmlentities($_GET['page']);
		
		switch ($page)
		{ 
		case "accueil":
			echo '<title>CTT Rolle - Accueil</title>';
			break;
		case "sponsor":
			echo '<title>CTT Rolle - Devenir Sponsor</title>';
			break;
		case "contact":
			echo '<title>CTT Rolle - Contact</title>';
			break;
		case "galerie":
			echo '<title>CTT Rolle - Gal&eacute;rie Photos</title>';
			break;
		case "evenements":
			echo '<title>CTT Rolle - Ev&eacute;nements</title>';
			break;

		// Menu club
		case "organisation":
			echo '<title>CTT Rolle - Organisation</title>';
			break;
		case "ping":
			echo '<title>CTT Rolle - TT ou Ping ?</title>';
			break;
		case "reglements":
			echo '<title>CTT Rolle - R&egrave;glements</title>';
			break;
		case "membre":
			echo '<title>CTT Rolle - Devenir Membre</title>';
			break;
		case "entrainements":
			echo '<title>CTT Rolle - Entra&icirc;nements</title>';
			break;
		case "equipes":
			echo '<title>CTT Rolle - Equipes</title>';
			break;
		case "presse":
			echo '<title>CTT Rolle - Presse</title>';
			break;


		// Autre
		case "news":
			echo '<title>CTT Rolle - News</title>';
			break;

		default:
			echo '<title>CTT Rolle - Accueil</title>';
			$page = "accueil";
			break;
		}
	} else {
		echo '<title>CTT Rolle - Accueil</title>';
		$page = "accueil";
	}

	echo '<link rel="stylesheet" type="text/css" href="css/pages/'.$page.'.css">';
?>

</head>
<body class="body_color">
<script type="text/javascript" src="js/jquery.js"></script>

<div id="index">
<div id="content" class="content_color">
	<?php

		echo '<div id="header" class="section">';
			include("header.php");
		echo '</div>';

		echo '<div id="menu" class="section">';
		include("menu.php");
		echo '</div>';

		echo '<div id="page" class="section page_color"><div id="page_content">';
		include("pages/".$page.".php");	
		echo '<br/><br/></div></div>';

		echo '<div id="footer" class="section">';
		include("footer.php");
		echo '</div>';
	?>
</div>
<div id="bottom_margin"></div>
</div>
</body>
</html>
