<?php
	include('config.php');
	session_destroy();
	header("Location: user_index.php");
?>