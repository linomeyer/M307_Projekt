<?php
function validate(string $name, string $firstname, string $email, string $telefon, string $memberStatus, string $video): array
{
    $errors = [];

    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    $movies = Movie::getAllMovies();

    $allMemberStatuses = ['', 'Bronze', 'Silber', 'Gold'];

    if (trim($name) === '') {
        array_push($errors, 'Namensfeld ist leer!');
    }
    if (strlen($name) <= 2) {
        array_push($errors, 'Der Name muss länger als 4 Zeichen sein!');
    }
    if (trim($firstname) === '') {
        array_push($errors, 'Namensfeld ist leer!');
    }
    if (trim($email) === '') {
        array_push($errors, 'Emailfeld ist leer!');
    }
    if (!preg_match($regex, $email)) {
        array_push($errors, 'Email ist invalid!');
    }
    if (strpos($email, "google.com")) {
        array_push($errors, 'google.com ist keine gültige Email!');
    }
    if (preg_match("/[a-z]/i", $telefon)) {
        array_push($errors, 'Telefonnummer darf keine Alphabetischen Zeichen enthalten!');
    }
    if (!in_array($video, $movies)) {
        array_push($errors, 'Der Ausgewählte Film existiert nicht!');
    }
    if (!in_array($memberStatus, $allMemberStatuses)) {
        array_push($errors, 'Der Ausgewählte Mitgliedschaftsstatus existiert nicht!');
    }
    return $errors;
}