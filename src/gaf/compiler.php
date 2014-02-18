<?php 
namespace gafreax/gafcompiler;
class gafCompiler 
{

    final static $DIST_FLAG = '--dist';
    final static $logo = <<<EOF
\033[1;32m
   ___       __     ___        ___     ___                      _ _           
  / _ \__ _ / _|   / _ \/\  /\/ _ \   / __\___  _ __ ___  _ __ (_) | ___ _ __ 
 / /_\/ _` | |_   / /_)/ /_/ / /_)/  / /  / _ \| '_ ` _ \| '_ \| | |/ _ \ '__|
/ /_\\ (_|  |  _| / ___/ __  / ___/  / /__| (_) | | | | | | |_) | | |  __/ |   
\____/\__,_|_|   \/   \/ /_/\/      \____/\___/|_| |_| |_| .__/|_|_|\___|_|   
                                                          |_|                  
\033[0m
\033[1;34mGabriele Fontana <gafreax@gmail.com>\033[0m

EOF;

    public static function exit($message) {
        echo $this->logo;
        echo PHP_EOL . $message . PHP_EOL. PHP_EOL;
        exit();
    }

    public static function usage() {
        exit('Usage: ' . __FILE__ . ' [--dist] <file_to_compile.php> ');
    }

    public static function not_vald_path() {
        exit('File not valid');
    }

    public static function run() {
        if(count($argv) < 2) {
            usage();
        }
        $file = is_file($argv[1])?$argv[1]:null;
        if(!$file) {
            not_vald_path();
        }
        $dist_flag_pos = array_search(DIST_FLAG,$argv);
        $dest_path = __DIR__;
        if($dist_flag_pos !== FALSE && isset($argv[$dist_flag_pos+1]) && is_dir($argv[$dist_flag_pos+1])) {
            $dest_path = $argv[$dist_flag_pos+1];
        }
        $dest_file = $dest_path . '/' .str_replace('.php','.pcb', $file);
        $fp = fopen($dest_file,'w'); 
        bcompiler_write_header($fp); 
        bcompiler_write_functions_from_file($fp,$file); 
        bcompiler_write_footer($fp); 
        fclose($fp); 
    }
}

