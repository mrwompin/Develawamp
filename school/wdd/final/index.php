<?php

include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8>"
<title>Welcome</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is a secure area.</p>
<p><a href="sdg.html">Sdg Website</a></p>
<?php 
if ($_SESSION['username'] == 'boss') { 
echo '<p><a href="admin_view.php">Admin Controls</a></p>';
}
?>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
