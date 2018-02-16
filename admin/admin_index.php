<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/app.css">
<title>CMS Portal</title>
</head>
<body>

<div class="welcome">
	<h1>Welcome Back <?php echo $_SESSION['user_name'];?>,</h1>
	<h2><?php
    $tzone = date_default_timezone_set("America/Toronto");
    $eastTime = date("H");

    if ($eastTime < "12") {
        echo "Good Morning Sleepy Head!";
    } else

    if ($eastTime >= "12" && $eastTime < "17") {
        echo "Nice Weather We're Having This Afternoon!";
    } else

    if ($eastTime >= "17") {
        echo "You're Looking Sexy Tonight!";
    }
  ?></h2>
	<?php echo "<p>Your last successful login was: {$_SESSION['prev_log']}</p>"?>


</div>
</body>
</html>
