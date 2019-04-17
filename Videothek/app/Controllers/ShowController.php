<?php
require 'app/Views/navbar.view.php';

$name = '';
$email= '';
$telefon = '';
$films = [];
$vorname = '';


$movies = RentedMovie::getAllRentedMovies();


require 'app/Views/show.view.php';
