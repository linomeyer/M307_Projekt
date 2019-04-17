<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $telefon = $_POST['phone'];
    $movie = $_POST['movie'];
    $ausleih_status = $_POST['ausleih_status'];

    RentedMovie::updateRent($name, $firstname, $email, $telefon, $movie, $ausleih_status, $id);

    );

    echo '<script>window.location = "anzeigen"</script>';

}