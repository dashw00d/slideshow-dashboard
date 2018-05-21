<!doctype html>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1800";
?>
<html>
<head>
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="jquery.chocolate.js?random=<?php echo uniqid(); ?>"></script>
	<title>Slideshow</title>
	<script>
		$(function() {
			$('body').chocolate({
				images		: <?php echo json_encode(GrabImg('images/') ); ?>,
				interval	: 7000,
				speed		: 1500,
			});
		});
	</script>
</head>
<body>
	
<?php
	$speed = file_get_contents("images/settings.txt"); 

	function GrabImg($dir)
	{

		$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		// $randomImage = $images[array_rand($images)];
		return $images;
	}
	function GrabInt($dir)
	{
		$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		$intervals = array();
		foreach($images as $image){
			$parts = explode("_", $image);
			$parts = explode(".", $parts[1]);
			array_push($intervals, $parts[0]);
			
		}
		return $intervals;
	}

?>
</body>
</html>