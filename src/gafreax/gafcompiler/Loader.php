<?php
namespace gafreax/gafcompiler;

use gafcompiler/gafcompiler/exceptions/InvalidFileException as InvalidFileException

class Loader
{
    public static function loader($filename) 
    {
        if(!is_file($filename))
            throw new InvalidFileException('File not found');
        $fp = fopen($filename,'r');
        bcompiler_read($fp);
        fclose($fp);
    }
}
