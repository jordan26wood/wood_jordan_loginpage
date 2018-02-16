<?php require_once('phpscripts/config.php');
$ip = $_SERVER['REMOTE_ADDR'];
// echo $ip;

if(isset($_POST['submit'])){
	$username = trim($_POST['username']); /// [] gets rid of whitespace
	$password = trim($_POST['password']);
	if($username !== "" && $password !== ""){
		$result = logIn($username, $password, $ip);
		$message = $result;

	}else{
		$message = "please fill out the required fields.";

	}
}
	// echo "Works";
 ?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/app.css">
<title>Welcome to your admin panel login</title>
</head>

<body>
	<div class="images">
	<?php if(!empty($message)){echo $message;} ?>

<div id="login">
	<form action="admin_login.php" method="post">
		<h1>Welcome!</h1>
		<h2>Login So We Can Get Started</h2>
		<label>Username</label>
		<input type="text" name ="username" size="40" value="" placeholder="Username">
		<br><br>
		<label>Password</label>
		<input type="password" name ="password" size="40" value="" placeholder="Password">
		<br>
		<input class="button" type="submit" name ="submit" value="Login">

	</form>

</div>
</div>
</body>
</html>
