<?php 
require "mod/start.php";
$addressform = new AddressForm;

?>
<!doctype html>
<html>
<head>
	<title><?php echo basename(__DIR__, '.php' )?></title>
	<link rel="stylesheet" type="text/css" href="css/addressform.css">
</head>
<body>
	<?php 
		$addressform();
	?>
</body>
</html>

