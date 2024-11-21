<?php
require '../vendor/autoload.php';
require 'Crud.php';

$db = new Conn();

$personRepo = new Crud($db);
$persons = $personRepo->getAllUsers();
dump($persons);


?>
