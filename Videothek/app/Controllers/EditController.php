<?php
require 'app/Views/navbar.view.php';

$name = '';
$email= '';
$telefon = '';
$rentStatus = '';
$film = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['ausleihe'];
    $movies = Movie::getAllMovies();
    $rent = RentedMovie::getRentbyId($id);
}
else {
    echo '<script>window.location = "anzeigen"</script>';
}

require 'app/Views/edit.view.php';
