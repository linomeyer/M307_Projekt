<?php
require 'app/Views/navbar.view.php';

$name = '';
$email= '';
$telefon = '';
$films = [];
$vorname = '';

$movies = Movie::getAllMovies();


require 'app/Views/show.view.php';
