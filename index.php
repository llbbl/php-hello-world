<?php 

require __DIR__.'/vendor/autoload.php';

echo "hello world".PHP_EOL;


$hello_world = ['hello world from an array'];

dump($hello_world);


$hello = new stdClass();

$hello->world = "hello world";

dump($hello);

