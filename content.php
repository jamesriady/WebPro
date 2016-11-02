<?php
	session_destroy();

	if(! isset($_SESSION["username"])) {
		die("anda belum login");
	}
?>
