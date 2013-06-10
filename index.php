<?php

//path to directory to scan
$directory = "images/";
 
//get all image files with a .jpg extension.
$images = glob($directory . "*.jpg");
//usort($images, create_function('$a,$b', 'return filemtime($b) - filemtime($a);'));


function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

 
?>

<html lang="en">

<head>
	<title>Banner Screen-grabs</title>
	<link type="text/css" rel="stylesheet" href="css/styles.css" />
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="css/jquery.fancybox.css" />
	<link type="text/css" rel="stylesheet" href="js/helpers/jquery.fancybox-buttons.css"/>	
</head>

<body>
<header>
<form method="get" action="downloadall.php">
<input class="downloadAll" type="submit" value="Download All images"></input>
</form>
<div class="deleteAll"></div>
<div class="title">
	<h1>Flash Screenshots</h1>
</div>

<hr>
</header>
<div class="wrap">




<form method="get" action="images/downloadMultiple.php">
<ul class="way">

<?
//print each file name
foreach($images as $image)
{
echo "<li class='thumb corners'>
		<div class='head'>
			<div class='name'>
				<span class='thumb_title'>" . basename($image) . "</span>
			</div>
			<div class='delete'></div>
		</div>
		
	
		<a class='fancyboxthumb' data-fancybox-group='fancyboxthumb' href='" . $image . "' title='" . basename($image). "'>
			<div class='v_image'><img src='$image' alt='$image'/></div>
		</a>
		
		<div class='buttons'>
		<a class='single' href='download.php?file=$image' target='_blank'>Download single</a>" . 
		 
		"<label class='single' style='float:right' for='" . basename($image) . "'><div>Select for download</div></label>
		</div>
			<input style='display:none;' type='checkbox' id='" . basename($image) .  "' name='files[]' value='" . basename($image) . "'/>
				<div class='cornersbottom'>
			</div>
			
			
	</li>";

}

?>
</ul>

<div class="selected">
<div class="number"></div>
<input class="single" type="submit" value="Download Selected" />
</div>

</form>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/wait.js"></script>
<script type="text/javascript" src="js/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>