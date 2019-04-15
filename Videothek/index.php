<?php

require 'core/bootstrap.php';

require 'routes.php';

var_dump('test');

$uri = $_GET['uri'] ?? '';

require $router->parse($uri);