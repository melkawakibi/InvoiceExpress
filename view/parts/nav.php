<?php
	session_start();

	if(isset($_SESSION['user'])){
		echo $_SESSION['user'];
		echo '<nav class="nav" style="float: right;">
			<a class="nav-link" href="parts/logout.php">logout</a></nav>';
	}else{
		echo '<nav class="nav" style="float: right;">
			<a class="nav-link" href="../login.php">login</a></nav>';
	}
?>
