<p class="title">Presse</p>

<?php
$db = new DatabaseManager();

$db->Connect($db_config);

if(isset($_POST['article_submit'])) {
	$query = 'UPDATE  Articles SET articles_title="'.$_POST['articles_title'].'",  articles_date="'.$_POST['articles_date'].'" WHERE articles_id='.$_POST['articles_id'];
	$db->ApplyUpdateQuery($query);
	
	if(isset($_FILES['articles_img'])) {
		$filename = './res/presse/'.$_POST['articles_id'].'.jpg';

		move_uploaded_file($_FILES['articles_img']['tmp_name'], $filename);
	}

}

if(isset($_GET['id']) and is_numeric($_GET['id'])) {
	$query = 'SELECT * FROM Articles WHERE articles_id='.$_GET['id'];
	$db->ApplyQuery($query);
	
	$data = $db->GetNext();
	$id = $data['articles_id'];
	$title = $data['articles_title'];
	$date = $data['articles_date'];

	echo '<form enctype="multipart/form-data" action="admin.php?page=presse" method="post">';
	echo '<input type="text" style="display:none" name="articles_id" value="'.$id.'" />';
	echo '<input class="encoder_output" type="text" name="articles_title" style="display:none;"  />';
	echo 'Titre:<br/>';
	echo '<input class="encoder_input" type="text" name="articles_title_input" style="width:500px;" value="'.$title.'" /> <br/><br/>';
	echo 'Date (format yyyy-MM-dd):<br/>';
	echo '<input type="text" name="articles_date" value="'.$date.'" /> <br/><br/>';
	echo 'Image (format jpeg):<br/>';
	echo '<input type="file" name="articles_img" accept="image/jpg"> <br/><br/><br/>';
	echo '<input type="submit" name="article_submit" onclick="encodeText();" value="Appliquer"><br/>';
	echo '<input type="submit" name="article_remove" value="Eliminer">';
	echo '</form>';
}
else {
	$query = 'SELECT * FROM Articles ORDER BY Articles.articles_date DESC';
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
