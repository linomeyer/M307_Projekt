<?php
require 'app/Views/navbar.view.php';
require 'app/Controllers/ValidationController.php';

$movies = Movie::getAllMovies();

$name = '';
$firstname = '';
$email= '';
$phone = '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST)){
        $name = $_POST['name'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $member = strtolower($_POST['member-status'] ?? '') ;
        $video = $_POST['movie'] ?? '';
        $enddatum = $_POST['enddate'] ?? '';
        $rentstart = date("d.m.Y");

        $errors = validate($name, $firstname, $email, $phone, $member, $video);

        if(count($errors) === 0) {
            $rentedMovie = new RentedMovie($name, $firstname, $email, $member, $phone);
            $rentedMovie->createRent();
            header('Location: anzeigen');
        } 
        require 'app/Views/capture.view.php';
    }
} else {
    require 'app/Views/capture.view.php';
}

//foreach(Movie::getAllMovies() as $movie) {
//    echo $movie['title'];
//}


