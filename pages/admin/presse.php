<p class="title">Presse</p>

<?php
$db = new DatabaseManager();

$db->Connect($db_config);

if(isset($_POST['article_remove'])) {
	$query = 'DELETE FROM Articles  WHERE articles_id='.$_POST['article_id'];
	$db->ApplyCommand($query);

	$filename = './res/presse/'.$_POST['article_id'].'.jpg';
	unlink($filename);
}

if(isset($_POST['article_submit'])) {
	// New article
	if($_POST['article_id'] == '') {
		$insertQuery = 'INSERT INTO Articles (articles_title, articles_date) VALUES ("'.$_POST['article_title'].'", "'.$_POST['article_date'].'")';
		$db->ApplyCommand($insertQuery);

		$indexQuery = 'SELECT articles_id FROM Articles ORDER BY articles_id DESC LIMIT 1';
		$db->ApplyQuery($indexQuery);
		$data = $db->GetNext();
		$id = $data['articles_id'];
	}
	else { // Updating one
		$query = 'UPDATE  Articles SET articles_title="'.$_POST['article_title'].'",  articles_date="'.$_POST['article_date'].'" WHERE articles_id='.$_POST['article_id'];
		$db->ApplyCommand($query);
		$id = $_POST['article_id'];
	}

	// Inserting image
	if(isset($_FILES['article_img'])) {
		$filename = './res/presse/'.$id.'.jpg';

		move_uploaded_file($_FILES['article_img']['tmp_name'], $filename);
	}
}

if((isset($_GET['id']) and is_numeric($_GET['id'])) or isset($_POST['article_add'])) {
	// Update
	if(!isset($_POST['article_add'])) {
		$query = 'SELECT * FROM Articles WHERE articles_id='.$_GET['id'];
		$db->ApplyQuery($query);
	
		$data = $db->GetNext();
		$id = $data['articles_id'];
		$title = $data['articles_title'];
		$date = $data['articles_date'];
	} 
	else { // Add new
		$id = '';
		$title = '';
		$date = '';
	}

	echo '<form enctype="multipart/form-data" action="admin.php?page=presse" method="post">';
	echo '<input type="text" style="display:none" name="article_id" value="'.$id.'" />';
	echo '<input class="title_output" type="text" name="article_title" style="display:none;"  />';
	echo 'Titre:<br/>';
	echo '<input class="title_input" type="text" name="article_title_input" style="width:500px;" value="'.$title.'" / required> <br/><br/>';
	echo 'Date (format yyyy-MM-dd):<br/>';
	echo '<input type="date" name="article_date" value="'.$date.'" required/> <br/><br/>';
	echo 'Image (format jpeg):<br/>';

	if(isset($_POST['article_add'])) { // if insert, then required
		echo '<input type="file" name="article_img" accept=".jpg" required> <br/><br/><br/>';
	}
	else {
		echo '<input type="file" name="article_img" accept=".jpg"> <br/><br/><br/>';
	}


	echo '<input type="submit" name="article_submit" onclick="encodeText(\'title_input\', \'title_output\');" value="Appliquer"><br/>';
	
	if(!isset($_POST['article_add'])) { // Update (remove)
		echo '<input type="submit" name="article_remove" value="Eliminer">';
	}
	echo '</form>';
}
else {
	$query = 'SELECT * FROM Articles ORDER BY Articles.articles_date DESC LIMIT 20';
	$db->ApplyQuery($query);
	
	echo '<form action="admin.php?page=presse" method="post">';
	echo '<input type="submit" name="article_add" value="Ajouter">';
	echo '</form>';

	
	echo '<ul>';
	while($data = $db->GetNext()) {
		  $id = $data['articles_id'];
		  $title = $data['articles_title'];
		  $date = $data['articles_date'];

		  echo '<li><a href="admin.php?page=presse&id='.$id.'">'.$date.': '.$title.'</a></li>';
	}
	echo '</ul>';
}

$db->Close();
