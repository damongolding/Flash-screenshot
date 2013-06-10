<?

$delete = $_GET['delete']; 

  unlink($delete); 
  echo "<script>window.close;</script>";


?>