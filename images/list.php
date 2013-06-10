<?

$directory = "";
 
//get all image files with a .jpg extension.
$images = glob($directory . "*.jpg");



foreach($images as $image){
	echo $image . "<br/>";
}

?>