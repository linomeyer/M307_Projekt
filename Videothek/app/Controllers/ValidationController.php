<?php
function validate(string $name, string $firstname, string $email, string $telefon, string $memberStatus, int $video): array
{
    $errors = [];

    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    $allMemberStatuses = ['keine', 'bronze', 'silber', 'gold'];

    if (trim($name) === '') {
        array_push($errors, 'Nachamensfeld ist leer!');
    }
    elseif (strlen($name) <= 2) {
        array_push($errors, 'Der Name muss länger als 2 Zeichen sein!');
    }
    if (trim($firstname) === '') {
        array_push($errors, 'Voramensfeld ist leer!');
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
    if (preg_match("/[a-z]/i", $telefon)) {
        array_push($errors, 'Telefonnummer darf keine Alphabetischen Zeichen enthalten!');
    }
    if (!in_array($memberStatus, $allMemberStatuses)) {
        array_push($errors, 'Der Ausgewählte Mitgliedschaftsstatus existiert nicht!');
    }
    if (!in_array()){
        array_push($errors, 'Der Ausgewählte Film existiert nicht!');
    }
    return $errors;
}