<?php
function loader($filename) {
    if(!is_file($filename))
        die('File not found');
    $fp = fopen($filename,'r');
    bcompiler_read($fp);
    fclose($fp);
}
