<?php

$name = '';
$email= '';
$telefon = '';
$films = [];
$vorname = '';

foreach(Movie::getAllMovies() as $movie) {
    echo $movie['title'];
}

require 'app/Views/capture.view.php';

