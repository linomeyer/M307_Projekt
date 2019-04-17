<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = new RentedMovie();
    $delete->deleteRent($id);
    var_dump($id);

    header('Location: anzeigen');

} else {
    header('Loaction: anzeiegen');
}