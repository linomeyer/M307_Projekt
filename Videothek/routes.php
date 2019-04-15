<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'auftrag-erfassen' => 'app/Controllers/CaptureController.php'
]);