<link rel="stylesheet" type="text/css" href="css/admin/menu.css">

<a class="menu_color menu_item" href="index.php?page=accueil" style="top:0px;">Accueil</a>

<?php

	if(isset($_SESSION['log_status']) and $_SESSION['log_status'] == 'logged')
	{
?>

<div id="menu_gestion">

	<h3>Gestion</h3>
	<a class="menu_color sub_menu_item <?php 
		if($page == 'news') {
			echo 'menu_item_selected';
		}
	?>" href="admin.php?page=news" style="top:0px;">News</a>

	<a class="menu_color sub_menu_item <?php 
		if($page == 'galerie') {
			echo 'menu_item_selected';
		}
	?>" href="admin.php?page=galerie" style="top:20px;">Gal&eacute;rie</a>

	<a class="menu_color sub_menu_item <?php 
		if($page == 'evenements') {
			echo 'menu_item_selected';
		}
	?>" href="admin.php?page=evenements" style="top:40px;">Ev&eacute;nements</a>

	<a class="menu_color sub_menu_item <?php 
		if($page == 'presse') {
			echo 'menu_item_selected';
		}
	?>" href="admin.php?page=presse" style="top:60px;">Presse</a>
</div>

  <div id="admin_dec_form"><form action="admin.php" method="post">
		<input id="admin_dec_form_hidden" type="text" name="admin_dec_form" value="dec" />
		
		<br/><div><?php echo $_SESSION['user']; ?></div><br/>
  	<input type="submit" value="Se d&eacute;connecter">
	</form></div>
<?php
	}
	else
	{
?>
  <div id="admin_form"><form action="admin.php" method="post">
					<br/><div>Utilisateur:</div>
          <input type="text" name="admin_form_user" size="40" />
					<br/><div>Mot de passe:</div>
          <input type="password" name="admin_form_pwd" size="40" />
          <br/><input type="submit" value="Se connecter">
	</form></div>


<?php
		if(isset($_SESSION['log_status']) and $_SESSION['log_status'] == 'bad') {
			echo '<div id="bad_log">Le login entr&eacute; n\'est pas valable ou le compte utilis&eacute; n\'a pas les droits d\'administrateur</div>';
		}
	}
?>
