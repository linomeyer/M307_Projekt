<?php
require 'app/Views/navbar.view.php';
require 'app/Controllers/ValidationController.php';

$name = '';
$email = '';
$telefon = '';
$rentStatus = '';
$film = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST)) {

            $name = $_POST['name'] ?? '';
            $firstname = $_POST['firstname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $memberstatus = strtolower($_POST['member-status'] ?? '');
            $movie = $_POST['movie'] ?? '1';
            $enddatum = $_POST['enddate'] ?? '';
            $rentstart = date("d.m.Y");

            $errors = validate($name, $firstname, $email, $phone, $memberstatus, $movie);

            if (count($errors) === 0) {
                $rentedMovie = new RentedMovie($name, $firstname, $email, $memberstatus, $phone, $movie);
                $rentedMovie->updateRent($id, $memberstatus);
                header('Location: anzeigen');
            }
        }
    }
    else{
        $rent = new RentedMovie();
        $rent = $rent->getRentbyId($id);

        $id = (int)$rent['id'];
        $name = $rent['name'];
        $firstname = $rent['firstname'];
        $rentStart = $rent['rentStart'];
        $movie = $rent['fk_movieID'];
        $memberstatus = $rent['fk_memberstatus'];
        $email = $rent['email'];
        $phone = $rent['telNr'];

    }
    $movies = Movie::getAllMovies();


    require 'app/Views/edit.view.php';
} else {
    header('Loaction: anzeiegen');
}

