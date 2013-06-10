<?php
$fileserver_path = 'images/';    // change this to the directory your files reside
$req_file          = basename($_GET['file']);
$whoami             = basename(__FILE__);    // you are free to rename this file 

if (empty($req_file)) {
    print "Usage: $whoami?file=&lt;file_to_download&gt;";
    exit;
}

/* no web spamming */
if (!preg_match("/^[a-zA-Z0-9._-]+$/", $req_file, $matches)) {
    print "I can't do that. sorry.";
    exit;
}

/* download any file, but not this one */
if ($req_file == $whoami) {
    print "I can't do that. sorry.";
    exit;
}

/* check if file exists */
if (!file_exists("$fileserver_path/$req_file")) {
    print "File <strong>$req_file</strong> doesn't exist.";
    exit;
}

if (empty($_GET['send_file'])) {
    header("Refresh: 5; url=download.php?file=$req_file&send_file=yes");
}
else {
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header('Content-Length: ' . filesize("$fileserver_path/$req_file"));
    header('Content-Disposition: attachment; filename=' . $req_file);
    readfile("$fileserver_path/$req_file");
    exit;
}

mysql_query("UPDATE `your_downloads_tbl` SET `download_total` = download_total+1 WHERE `download_file` = '$req_file'");
echo '
<h3>Downloading '.$req_file.'...</h3>';
echo '
<p>Your download should begin shortly. If it doesn\'t start, 
   follow this <a href="'.$fileserver_path.''.$req_file.'">link</a>.</p>';  
   
?>