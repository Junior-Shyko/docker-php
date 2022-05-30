<?php
require 'vendor/autoload.php';

$br = "<br>";
//FUNÇÕES DE STRINGS
//ucfirst
$foo = 'olá Mundo!';
//$foo = ucfirst($foo);
dump($foo);
dump(strtolower($foo));
$bar = ucfirst(strtolower($foo));
dump($bar);

$ipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi eos illum aut accusamus';
dump(strtoupper($ipsum));
$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi eos illum aut accusamus';
dump(strtolower($ipsum));