<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="CTT Rolle est le club de tennis de table de la ville de Rolle">
<title>CTT Rolle - Session Admin</title>

<link rel="stylesheet" type="text/css" href="css/themes/dark.css">

<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">

<?php
	include("./utils/configuration_managers.php");
	include("./config/config.php");

	include("./utils/database.php");
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
		include("pages/admin/menu.php");
		echo '</div>';

		echo '<div id="page" class="section page_color"><div id="page_content">';
		include("pages/admin/content.php");
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
