<p class="title">Gal&eacute;rie Photos</p>


<?php
	$db = new DatabaseManager();

	$db->Connect($db_config);

	if(isset($_GET['album']) and is_numeric($_GET['album'])) { // TODO: could have a SQL injection
		$album = $_GET['album'];

		$query = 'SELECT * FROM Albums WHERE albums_id='.$album;
		$db->ApplyQuery($query);

		$data = $db->GetNext();

		$title = $data['albums_title'];
		$description = $data['albums_description'];
		$date = $data['albums_date'];

		echo '<h3>'.$date.': '.$title.'</h3>';
		echo '<p class="text_paragraph">'.$description.'</p>';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="plugins/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="plugins/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<div id="gallery_container">
<ul class="gallery">

<?php
		$photos = scandir('res/galerie/album_'.$album);

		foreach($photos as $photo) 
		{
			if(preg_match("/^.+\.(jpg|png|bmp|gif)$/", $photo) != 0) 
			{
				echo '<li class="galerie_album"><a href="res/galerie/album_'.$album.'/'.$photo.'" rel="prettyPhoto[gallery]" ><img src="res/galerie/album_'.$album.'/'.$photo.'" alt="'.$title.'" /></a> </li>';
			}
		}

?>
</ul>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".gallery a[rel^='prettyPhoto']").prettyPhoto();
	});
</script>


<?php
	} 
	else {
?>
	<p class="text_paragraph">Nostalgie d'un tournoi d'il y a un an, ou envie de revivre les moments d'une soir&eacute;e inoubliable?<br/>
Cette section regroupe les photos prises lors des &eacute;venements les plus marquants pour le CTT Rolle.<br/><br/> </p>

<?php
		$query = 'SELECT * FROM Albums ORDER BY albums_date DESC';

		$db->ApplyQuery($query);

		echo "<ul>";
		// on fait une boucle qui va faire un tour pour chaque enregistrement
		while($data = $db->GetNext())
		{
			echo '<li class="galerie_link"><a href="index.php?page=galerie&album='.$data['albums_id'].'" title="'.$data['albums_description'].'">'.$data['albums_title']."</a></li>";
		}
		echo "</ul>";
	}


	$db->Close();
?>

