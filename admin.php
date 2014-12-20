<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="CTT Rolle est le club de tennis de table de la ville de Rolle">
<title>CTT Rolle - Session Admin</title>

<link rel="stylesheet" type="text/css" href="css/themes/dark.css">

<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/admin/admin.css">
<link rel="stylesheet" type="text/css" href="css/admin/menu.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">

<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

	include("./utils/configuration_managers.php");
	include("./config/config.php");

	include("./utils/database.php");

	include("./pages/admin/session.php");

	$session = new Session($db_config);
	// Set to true if using https
	$session->start_session('_s', false);

	if(isset($_POST['admin_dec_form'])) {
		$_SESSION['log_status'] = 'unlogged';
	}

	// User logged??
	if(isset($_POST['admin_form_user']) and isset($_POST['admin_form_pwd']))
	{
		$db = new DatabaseManager;

		$db->Connect($db_config);


		$query = 'SELECT is_admin FROM Users WHERE username="'.$_POST['admin_form_user'].'" AND password="'.md5($_POST['admin_form_pwd']).'"';
		$db->ApplyQuery($query);

		$data = $db->GetNext();

		if(isset($data) and $data['is_admin'] == 1) {
				$_SESSION['log_status'] = 'logged';
				$_SESSION['user'] = $_POST['admin_form_user'];
		}
		else {
			$_SESSION['log_status'] = 'bad';
		}
	}

	$page = '';

	if(isset($_GET['page'])) {
    $page  = htmlentities($_GET['page']);
	}

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
