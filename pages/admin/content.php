<p class="title">Session Admin</p>

<?php
	if(isset($_SESSION['log_status']) and $_SESSION['log_status'] == 'logged') {
		if($page <> '') {
			// we call the page (switch for every page)
			echo $page;
		}
	}
?>
