<p class="title">Gal&eacute;rie</p>

<?php
$db = new DatabaseManager();

$db->Connect($db_config);

if(isset($_POST['album_remove'])) {
	$query = 'DELETE FROM Albums  WHERE albums_id='.$_POST['album_id'];
	$db->ApplyCommand($query);

	$dirname = './res/galerie/album_'.$_POST['album_id'];
	rmdir_recursive($dirname);
}

if(isset($_POST['album_submit'])) {
	// New album
	if($_POST['album_id'] == '') {
		$insertQuery = 'INSERT INTO Albums (albums_title, albums_date, albums_description) VALUES ("'.$_POST['album_title'].'", "'.$_POST['album_date'].'", "'.$_POST['album_description'].'")';
		$db->ApplyCommand($insertQuery);

		$indexQuery = 'SELECT albums_id FROM Albums ORDER BY albums_id DESC LIMIT 1';
		$db->ApplyQuery($indexQuery);
		$data = $db->GetNext();
		$id = $data['albums_id'];
	}
	else { // Updating one
		$query = 'UPDATE  Albums SET albums_title="'.$_POST['album_title'].'",  albums_date="'.$_POST['album_date'].'", albums_description="'.$_POST['album_description'].'" WHERE albums_id='.$_POST['album_id'];
		$db->ApplyCommand($query);
		$id = $_POST['album_id'];
	}

	// Inserting images
	if(isset($_FILES['album_img'])) {
		$dirname = './res/galerie/album_'.$id;

		mkdir($dirname);

		foreach ($_FILES['album_img']['name'] as $i => $name) {
      if (strlen($_FILES['album_img']['name'][$i]) > 1) {
        move_uploaded_file($_FILES['album_img']['tmp_name'][$i], $dirname.'/'.$name);
      }
    }

	}
}

if((isset($_GET['id']) and is_numeric($_GET['id'])) or isset($_POST['album_add'])) {
	// Update
	if(!isset($_POST['album_add'])) {
		$query = 'SELECT * FROM Albums WHERE albums_id='.$_GET['id'];
		$db->ApplyQuery($query);
	
		$data = $db->GetNext();
		$id = $data['albums_id'];
		$title = $data['albums_title'];
		$date = $data['albums_date'];
		$description = $data['albums_description'];
	} 
	else { // Add new
		$id = '';
		$title = '';
		$date = '';
		$description = '';
	}

	echo '<form enctype="multipart/form-data" action="admin.php?page=galerie" method="post">';
	echo '<input type="text" style="display:none" name="album_id" value="'.$id.'" />';

	echo '<input class="title_output" type="text" name="album_title" style="display:none;"  />';
	echo 'Titre:<br/>';
	echo '<input class="title_input" type="text" name="album_title_input" style="width:500px;" value="'.$title.'" / required> <br/><br/>';
	
	echo 'Date (format yyyy-MM-dd):<br/>';
	echo '<input type="date" name="album_date" value="'.$date.'" required/> <br/><br/>';
	
	echo '<textarea class="desc_output" name="album_description" style="display:none;"></textarea>';
	echo 'D&eacute;scription:<br/>';
	echo '<textarea class="desc_input" name="album_description_input" cols=60 rows=5 required>'.$description.'</textarea><br/><br/>';
	

	echo 'Image (format jpeg):<br/>';
	if(isset($_POST['album_add'])) { // if insert, then required
		echo '<input type="file" name="album_img[]" multiple="" directory="" webkitdirectory="" mozdirectory="" accept=".jpg" required> <br/><br/><br/>';
	}
	else {
		echo '<input type="file" name="album_img[]" multiple="" directory="" webkitdirectory="" mozdirectory="" accept=".jpg"> <br/><br/><br/>';
	}


	echo '<input type="submit" name="album_submit" onclick="encodeText(\'title_input\', \'title_output\');encodeText(\'desc_input\', \'desc_output\');" value="Appliquer"><br/>';
	
	if(!isset($_POST['album_add'])) { // Update (remove)
		echo '<input type="submit" name="album_remove" value="Eliminer">';
	}
	echo '</form>';
}
else {
	$query = 'SELECT * FROM Albums ORDER BY Albums.albums_date DESC LIMIT 20';
	$db->ApplyQuery($query);
	
	echo '<form action="admin.php?page=galerie" method="post">';
	echo '<input type="submit" name="album_add" value="Ajouter">';
	echo '</form>';

	
	echo '<ul>';
	while($data = $db->GetNext()) {
		  $id = $data['albums_id'];
		  $title = $data['albums_title'];
		  $date = $data['albums_date'];

		  echo '<li><a href="admin.php?page=galerie&id='.$id.'">'.$date.': '.$title.'</a></li>';
	}
	echo '</ul>';
}

$db->Close();
