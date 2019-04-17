<?php
function validate(string $name, string $firstname, string $email, string $phone, string $memberStatus, string $movie): array
{
    $errors = [];

    $regex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
    $nameRegex = '/[0-9]/';
    $allMovies = [];
    $allMemberStatuses = ['keine', 'bronze', 'silber', 'gold'];
    foreach(Movie::getAllMovieIds() as $movieId) {
        $allMovies[] = $movieId['id'];
    }

    if (trim($name) === '') {
        array_push($errors, 'Nachamensfeld ist leer!');
    }
    elseif (!preg_match($nameRegex, $name)){
        array_push($errors, 'Namen dürfen keine Nummern enthalten!');
    }
    if (trim($firstname) === '') {
        array_push($errors, 'Voramensfeld ist leer!');
    }
    elseif (!preg_match($nameRegex, $firstname)){
        array_push($errors, 'Namen dürfen keine Nummern enthalten!');
    }
    if (trim($email) === '') {
        array_push($errors, 'Emailfeld ist leer!');
    }
    elseif (!preg_match($regex, strtolower($email))) {
        array_push($errors, 'Email ist nicht gültig!');
    }
    if (strpos($email, "google.com")) {
        array_push($errors, 'google.com ist keine gültige Email!');
    }
    if (preg_match("/[a-z]/i", $phone)) {
        array_push($errors, 'Telefonnummer darf keine Alphabetischen Zeichen enthalten!');
    }
    if (!in_array($memberStatus, $allMemberStatuses)) {
        array_push($errors, 'Der Ausgewählte Mitgliedschaftsstatus existiert nicht!');
    }

    if (!in_array($movie, $allMovies)){
        array_push($errors, 'Der Ausgewählte Film existiert nicht!');
    }

    return $errors;
}
