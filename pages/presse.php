<p class="title">Presse</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="plugins/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="plugins/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<p class="text_paragraph">Dans cette section sont affich&eacute;s plusieurs articles parus dans la presse ayant un rapport avec le CTT Rolle.</p>
<br/>

<ul class="gallery">
<?php
	$db = new DatabaseManager();

	$db->Connect($db_config);

  $query = 'SELECT * FROM Articles ORDER BY Articles.articles_date DESC LIMIT 10';
  $db->ApplyQuery($query);


  while($data = $db->GetNext()) {
          $id = $data['articles_id'];
          $title = $data['articles_title'];
          $date = $data['articles_date'];

          echo '<li><h3>'.$date.': '.$title.'</h3><a href="res/presse/'.$id.'.jpg" rel="prettyPhoto[gallery]" ><img src="res/presse/'.$id.'.jpg" alt="'.$title.'" /></a></li>';
  }

  $db->Close();
?>

</ul>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery a[rel^='prettyPhoto']").prettyPhoto();
	});
</script>
