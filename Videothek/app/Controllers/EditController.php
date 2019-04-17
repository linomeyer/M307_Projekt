<?php
require 'app/Views/navbar.view.php';

$name = '';
$email= '';
$telefon = '';
$rentStatus = '';
$film = '';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $rent = new RentedMovie();
    $rent = $rent->getRentbyId($id);


    $name = $rent['name'];
    $firstname = $rent['firstname'];
    $rentStart = $rent['rentStart'];
    $movie = $rent['fk_movieID'];
    $memberstatus = $rent['fk_memberstatus'];
    $email = $rent['email'];
    $phone = $rent['telNr'];

    $movies = Movie::getAllMovies();

    

}
else {
    header('Location: anzeigen');
}

require 'app/Views/edit.view.php';
