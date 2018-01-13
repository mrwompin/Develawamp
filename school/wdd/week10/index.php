<?php 
require "lib/start.php";
$css;
$title = basename(__DIR__, '.php' );
$theoffice = new TheOffice;
?>
<!doctype html>
<html>
<head>
		<title><?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="lib/css/<?php echo $title;?>.css">
</head>
<body>
	<?php 
		echo $theoffice->html;
	?>
</body>
</html>
