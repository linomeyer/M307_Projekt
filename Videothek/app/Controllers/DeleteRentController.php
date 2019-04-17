
<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        RentedMovie::deleteRent($_POST['id']);
    }

    echo "<script>window.location = 'anzeigen'</script>";