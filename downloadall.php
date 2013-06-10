<?
$directory = "images/";
 
//get all image files with a .jpg extension.
$images = glob($directory . "*.jpg");


$checked = $_GET['files'];

$zip = new ZipArchive;
$zip->open('file.zip', ZipArchive::CREATE);

foreach($images as $image){
	$zip->addFile($image);
    $variable = NULL;
}


$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=file.zip');//line1
header('Content-Length: ' . filesize("file.zip"));//line2
readfile("file.zip");

unlink("file.zip");

?>