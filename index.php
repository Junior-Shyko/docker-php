<?php
//https://packagist.org/packages/altorouter/altorouter
ini_set('display_errors', 1);
require 'vendor/autoload.php';
require __DIR__ . '/vendor/altorouter/altorouter/AltoRouter.php';


if (file_exists($_SERVER['SCRIPT_FILENAME']) && pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_EXTENSION) !== 'php') {
    echo "return";
}

$router = new AltoRouter();
$router->setBasePath(__DIR__);

dump($_SERVER['REQUEST_METHOD']);

try {

    $router->map('GET', '/home', function() {
        //require __DIR__ . '/index2.php';
        echo 'home';
    }, 'home');
    $match = $router->match();
    var_dump($match);
} catch (\Exception $th) {
    $th->getMessage();
}
echo "fora";
?>