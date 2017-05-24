<html>
<head>
	<title></title>
	<?php 
		include 'parts/links.php'; 
	?> 
</head>
<body>

<div class="container">
	<?php
		include 'parts/header.php';
	?>
<div class="page-header">
<h3>Login</h3>
</div>

	<div class="col-md-4">
		<form action="login.php" method="post">
		  <div class="form-group">
		    <label for="username">username</label>
		    <input type="text" class="form-control" name="username">
		  </div>
		  <div class="form-group">
		    <label for="password">password</label>
		    <input type="password" class="form-control" name="password">
		  </div>
		   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>	
	</div>

</container>

</body>
</html>

<?php

$db = new Database();

if(isset($_POST['submit'])){

	$db->query("SELECT * FROM user WHERE username= :username AND password= :password ");

	$username = $_POST['username'];
	$password = $_POST['password'];

	$db->bind(':username', $username, $type = null);

	$db->bind(':password', $password, $type = null);

	$db->execute();

	$count = $db->rowCount();
	if($count == 1){
		session_start();
		$_SESSION['user'] = $username;
		echo '<script> location.replace("index.php"); </script>';
	}else{
		echo 'Wrong credentials';
	}

}

?>
