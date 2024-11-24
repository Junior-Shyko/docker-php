<?php
require '../vendor/autoload.php'; 

require 'Crud.php';

$db = new Conn();
if(isset($_POST) && $_POST['action'] == "create" ) {
    

$insertRepo = new Crud($db);
    $re = $insertRepo->create($_POST);

}