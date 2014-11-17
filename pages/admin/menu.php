
<a class="menu_color menu_item" href="index.php?page=accueil" style="top:0px;">Accueil</a>

<?php
	$logged = true;

	if(isset($logged) and $logged == true)
	{
?>

<div id="menu_gestion">

	<h3>Gestion</h3>
	<a class="menu_color sub_menu_item" href="admin.php?page=news" style="top:0px;">News</a>
	<a class="menu_color sub_menu_item" href="admin.php?page=galerie" style="top:20px;">Gal&eacute;rie</a>
	<a class="menu_color sub_menu_item" href="admin.php?page=evennements" style="top:40px;">Ev&eacute;nements</a>
	<a class="menu_color sub_menu_item" href="admin.php?page=presse" style="top:60px;">Presse</a>

</div>


<?php
	}
	else
	{
?>
	


<?php
	}
?>
