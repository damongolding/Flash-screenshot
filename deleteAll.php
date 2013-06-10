<?
$directory = "images/";
$images = glob($directory . "*.jpg");

foreach($images as $image)
{
unlink($image);

}


?>