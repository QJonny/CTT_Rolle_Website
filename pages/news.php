<p class="title">News</p>


<?php
	if(isset($_GET['nb_news']) and is_numeric($_GET['nb_news'])) 
	{
  	$i = $_GET['nb_news'];// TODO: possible SQL injection!!! test if $i is a number, or if i does not exist

?>

<div id="accueil_news">
	<div id="news_image">
<?php
  	echo '		<img src="res/news/'.$i.'.jpg" />';
?>
	</div>

	<div id="news_body">
<?php
		$db = new DatabaseManager();

		$db->Connect($db_config);

		$query = 'SELECT * FROM News WHERE news_id='.$i;

		$db->ApplyQuery($query);

		$data = $db->GetNext();
		$title = $data['news_title'];
		$msg = $data['news_message'];
		$date = $data['news_date'];


		echo '<p class="news_title">'.$title.'</p>';
		echo '<p class="news_date">'.$date.'</p>';
		echo '<p class="news_text">'.$msg.'</p>';

		$db->Close();
?>
	</div>

</div>
<?php
	}
	else
	{
		echo '<p class="text_paragraph">Cette news n\'existe pas!!!</p>';
	}
?>
