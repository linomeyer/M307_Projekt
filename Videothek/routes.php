<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'erfassen' => 'app/Controllers/CaptureController.php',
    'bearbeiten' => 'app/Controllers/EditController.php',
]);