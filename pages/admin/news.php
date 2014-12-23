<p class="title">News</p>

<?php
$db = new DatabaseManager();

$db->Connect($db_config);

if(isset($_POST['news_remove'])) {
	$query = 'DELETE FROM News  WHERE news_id='.$_POST['news_id'];
	$db->ApplyCommand($query);

	$filename = './res/news/'.$_POST['news_id'].'.jpg';
	unlink($filename);
}

if(isset($_POST['news_submit'])) {
	// New news
	if($_POST['news_id'] == '') {
		$insertQuery = 'INSERT INTO News (news_title, news_date, news_message) VALUES ("'.$_POST['news_title'].'", "'.$_POST['news_date'].'","'.$_POST['news_message'].'")';
		$db->ApplyCommand($insertQuery);

		$indexQuery = 'SELECT news_id FROM News ORDER BY news_id DESC LIMIT 1';
		$db->ApplyQuery($indexQuery);
		$data = $db->GetNext();
		$id = $data['news_id'];
	}
	else { // Updating one
		$query = 'UPDATE  News SET news_title="'.$_POST['news_title'].'",  news_date="'.$_POST['news_date'].'", news_message="'.$_POST['news_message'].'" WHERE news_id='.$_POST['news_id'];
		$db->ApplyCommand($query);
		$id = $_POST['news_id'];
	}

	// Inserting image
	if(isset($_FILES['news_img'])) {
		$filename = './res/news/'.$id.'.jpg';

		move_uploaded_file($_FILES['news_img']['tmp_name'], $filename);
	}
}

if((isset($_GET['id']) and is_numeric($_GET['id'])) or isset($_POST['news_add'])) {
	// Update
	if(!isset($_POST['news_add'])) {
		$query = 'SELECT * FROM News WHERE news_id='.$_GET['id'];
		$db->ApplyQuery($query);
	
		$data = $db->GetNext();
		$id = $data['news_id'];
		$title = $data['news_title'];
		$date = $data['news_date'];
		$message = $data['news_message'];
	} 
	else { // Add new
		$id = '';
		$title = '';
		$date = '';
		$message = '';
	}

	echo '<form enctype="multipart/form-data" action="admin.php?page=news" method="post">';
	echo '<input type="text" style="display:none" name="news_id" value="'.$id.'" />';

	echo '<input class="title_output" type="text" name="news_title" style="display:none;"  />';
	echo 'Titre:<br/>';
	echo '<input class="title_input" type="text" name="news_title_input" style="width:500px;" value="'.$title.'" / required> <br/><br/>';
	
	echo 'Date (format yyyy-MM-dd):<br/>';
	echo '<input type="date" name="news_date" value="'.$date.'" required/> <br/><br/>';

	echo 'Image (format jpeg):<br/>';
	if(isset($_POST['news_add'])) { // if insert, then required
		echo '<input type="file" name="news_img" accept=".jpg" required> <br/><br/><br/>';
	}
	else {
		echo '<input type="file" name="news_img" accept=".jpg"> <br/><br/><br/>';
	}


	echo '<textarea class="message_output" name="news_message" style="display:none;"></textarea>';
	echo 'Message:<br/>';
	echo '<textarea class="message_input" name="news_message_input" cols=100 rows=40 required>'.$message.'</textarea> <br/><br/>';
	

	echo '<input type="submit" name="news_submit" onclick="encodeText(\'title_input\', \'title_output\');encodeText(\'message_input\', \'message_output\');" value="Appliquer"><br/>';
	
	if(!isset($_POST['news_add'])) { // Update (remove)
		echo '<input type="submit" name="news_remove" value="Eliminer">';
	}
	echo '</form>';
}
else {
	$query = 'SELECT * FROM News ORDER BY News.news_date DESC LIMIT 20';
	$db->ApplyQuery($query);
	
	echo '<form action="admin.php?page=news" method="post">';
	echo '<input type="submit" name="news_add" value="Ajouter">';
	echo '</form>';

	
	echo '<ul>';
	while($data = $db->GetNext()) {
		  $id = $data['news_id'];
		  $title = $data['news_title'];
		  $date = $data['news_date'];

		  echo '<li><a href="admin.php?page=news&id='.$id.'">'.$date.': '.$title.'</a></li>';
	}
	echo '</ul>';
}

$db->Close();
