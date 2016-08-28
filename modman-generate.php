#!/usr/bin/env php
<?php
echo "Simple Modman Generator v0.1.1" . PHP_EOL;
$ignoreFiles = array(
    'modman',
    'composer.json',
    'instructions',
    '.gitignore',
    'README.md',
    'LICENSE',
    'modman-generate.php',
    'modman-symlink.php'
);


$path = realpath(__DIR__);
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($files as $name => $object){
    if(is_dir($name)){
        continue;
    }
    if(basename($name)=='.'){
        continue;
    }
    if(basename($name)=='..'){
        continue;
    }


    if(strstr($name,'.git')!==false){
        continue;
    }
    if(strstr($name,'.idea')!==false){
        continue;
    }

    $name = substr($name,strlen(__DIR__)+1);
    $name = str_replace('\\',"/",$name);

    if(in_array($name,$ignoreFiles)){
        continue;
    }

    $output [] = $name." ".$name;
}
//print_r($output);

$output = implode("\n", $output);
file_put_contents('modman', $output);
echo "'modman' file generated." . PHP_EOL;
