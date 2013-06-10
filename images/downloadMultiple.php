<?

$checked = $_GET['files'];

$zip = new ZipArchive;
$zip->open('file.zip', ZipArchive::CREATE);


for($i=0; $i < count($checked); $i++){

	$foo = $checked[$i];
    $zip->addFile($foo);
    $variable = NULL;

}

$zip->close();


header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=file.zip');//line1
header('Content-Length: ' . filesize("file.zip"));//line2
readfile("file.zip");

unlink("file.zip");

?>