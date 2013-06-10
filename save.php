<?php
if ( isset ( $GLOBALS["HTTP_RAW_POST_DATA"] )) {
    $uniqueStamp = date(U);
    $filename = $_SERVER['QUERY_STRING'].".jpg";
    $fp = fopen("images/$filename","wb");
    fwrite( $fp, $GLOBALS[ 'HTTP_RAW_POST_DATA' ] );
    fclose( $fp );
 
    echo "filename=".$filename."</br>&base=".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]);
    echo "<script>window.close()</script>";
}
?>