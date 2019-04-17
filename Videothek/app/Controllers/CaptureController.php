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

        RentedMovie::createRent($name, $firstname, $email, $phone, $rentstart, $video, $member, $member, 1, $enddatum);
    }
}


//foreach(Movie::getAllMovies() as $movie) {
//    echo $movie['title'];
//}

require 'app/Views/capture.view.php';

