#!/usr/bin/env php
<?php
static $logo = <<<EOF
\033[1;32m
   ___       __     ___        ___     ___                      _ _           
  / _ \__ _ / _|   / _ \/\  /\/ _ \   / __\___  _ __ ___  _ __ (_) | ___ _ __ 
 / /_\/ _` | |_   / /_)/ /_/ / /_)/  / /  / _ \| '_ ` _ \| '_ \| | |/ _ \ '__|
/ /_\\ (_| |  _|  / ___/ __  / ___/  / /__| (_) | | | | | | |_) | | |  __/ |   
\____/\__,_|_|   \/   \/ /_/\/      \____/\___/|_| |_| |_| .__/|_|_|\___|_|   
                                                         |_|                  
\033[0m
\033[1;34mGabriele Fontana <gafreax@gmail.com>\033[0m

EOF;

if(!isset($argv[1])) {
    echo $logo;
    echo 'Usage: php ' . __FILE__ . ' <filename.php>' . PHP_EOL;
    exit;
}
$filename = $argv[1];
if(!is_file($filename) || strpos($filename,'php') === false) {
    echo $logo;
    echo $filename . ' is not a valid php file' . PHP_EOL;
    exit;
}
$file = file_get_contents($argv[1]);
$file = str_replace('<?php','',$file);
$obfuscated = base64_encode($file);
$exec = '<?php eval(base64_decode(\''.$obfuscated.'\')); ';
echo $exec;


