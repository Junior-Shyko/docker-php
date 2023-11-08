<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$filename = date("Y-m-d H:i:s").".csv";

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=' . $filename);
header("Content-Transfer-Encoding: UTF-8");


include("../vendor/autoload.php");


// echo "Json";
$pasta = dirname(__DIR__).'/json/arquivos/';
$arquivos = glob("$pasta{*.json}", GLOB_BRACE);
// dump($arquivos);
$br = '<br/>';


$header = [ 'Tipo', 'Nome', 'Email', 'Cidade', 'Pais', 'Tot. Mensagem', 'Tempo', 'Criado'  ];
$f = fopen('php://output', 'w');

foreach($arquivos as $img){
   $fileJson = file_get_contents($img);
// //    dump($fileJson);
   $arrayJson = json_decode($fileJson, true);
//    dump($arrayJson);
   $fieldSpreadsheet = [];
//    echo "<strong>Tipo: </strong>" . $arrayJson['type']. ', <strong>Nome: </strong>'.$arrayJson['visitor']['name'].',
//    <strong>E-mail: </strong>'.$arrayJson['visitor']['email'].', <strong> Cidade: </strong>'.$arrayJson['location']['city'].'
//    <strong>Pais: </strong>'.$arrayJson['location']['countryCode'].'<strong> Total de Mensage: </strong>'.$arrayJson['messageCount'].'
//    <strong>Durou: </strong>'.$arrayJson['chatDuration'].' seg. , <strong> Criado em: </strong>'.$arrayJson['createdOn'].$br;
   //Header da planilha
if($arrayJson['type'] == 'ticket'){
    $fieldSpreadsheet['type'] = $arrayJson['type'];
    $fieldSpreadsheet['name'] = $arrayJson['requester']['name'];
    $fieldSpreadsheet['email'] = $arrayJson['requester']['email'];
    $fieldSpreadsheet['city'] = '--';
    $fieldSpreadsheet['country'] = '--';
    $fieldSpreadsheet['messageCount'] = '--';
    $fieldSpreadsheet['chatDuration'] = '--';
    $fieldSpreadsheet['createdOn'] = $arrayJson['createdOn'];

}else{
    $fieldSpreadsheet['type'] = $arrayJson['type'];
    $fieldSpreadsheet['name'] = $arrayJson['visitor']['name'];
    $fieldSpreadsheet['email'] = $arrayJson['visitor']['email'];
    $fieldSpreadsheet['city'] = $arrayJson['location']['city'];
    $fieldSpreadsheet['country'] = $arrayJson['location']['countryCode'];
    $fieldSpreadsheet['messageCount'] = $arrayJson['messageCount'];
    $fieldSpreadsheet['chatDuration'] = $arrayJson['chatDuration'];
    $fieldSpreadsheet['createdOn'] = $arrayJson['createdOn'];
}
// dump($fieldSpreadsheet);
//    fputcsv($f, $header, "\t");
    fputcsv($f, $fieldSpreadsheet);
   

}

fclose($f); 
?>