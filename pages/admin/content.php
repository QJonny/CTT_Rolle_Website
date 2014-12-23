<p class="title">Session Admin</p>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/encoder.js"></script>


<script>
// or to set it to encode to html entities e.g & instead of &
Encoder.EncodeType = "entity";

function encodeText(input, output) {
	var str = $( "." + input ).val();

	// HTML encode text from an input element
	// This will prevent double encoding.
	var encoded = Encoder.htmlEncode(str);

	$( "." + output ).val( encoded );
}

</script>


<?php
	function rmdir_recursive($dir) {
		  foreach(scandir($dir) as $file) {
		      if ('.' === $file || '..' === $file) continue;
		      if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
		      else unlink("$dir/$file");
		  }
		  rmdir($dir);
	}



	if(isset($_SESSION['log_status']) and $_SESSION['log_status'] == 'logged') {
		if($page <> '') {
			// we call the page (switch for every page)
			switch($page) {
				case 'news':
					include('./pages/admin/news.php');
					break;
				case 'galerie':
					include('./pages/admin/galerie.php');
					break;
				case 'evenements':
					include('./pages/admin/evenements.php');
					break;
				case 'presse':
					include('./pages/admin/presse.php');
					break;
			}
		}
	}
?>
