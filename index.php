<?php

require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function ($request, $response, $args) {
    $response->write("Programa mister");
    return $response;
});

$app->run();

?>
