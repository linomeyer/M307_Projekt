
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/twitter-bootstrap.css">
    <link rel="stylesheet" href="public/css/styles_show.css">
    <link rel="stylesheet" href="public/css/bootstrapcdn.css">

    <link rel="stylesheet" type="text/css" href="public/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="public/js/jQuery.js"></script>
    <script type="text/javascript" src="public/DataTables/datatables.min.js"></script>

    <script type="text/javascript" src="public/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="public/css/bootstrap.css"></script>


    <title>Erfassen</title>
</head>
<body>

<div>

    <?php
    if ( ! empty($errors)) {?>
        <div class="alert alert-danger" role="alert">
            <ul class="errors">
                <?php foreach ($errors as $err) { ?>
                    <li><?= e($err) ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <ul id="errorList"></ul>

    <div style="margin: 20px">
        <table id="example" class="display" ></table>
    </div>

</div>

<!--<script src="public/js/ausleihe-enddatum.js"></script>
<script src="public/js/formValidation.js"></script>-->
</body>
</html>

<script>
    $(document).ready( function () {
        $('#showTable').DataTable();
    } );


    var dataSet = [

    ];

    $(document).ready(function() {
        $('#example').DataTable( {
            data: dataSet,
            columns: [
                { title: "Film" },
                { title: "Vorname" },
                { title: "Nachname" },
                { title: "Email." },
                { title: "Telefon Nummer" },
                { title: "Ausleihe Start" },
                { title: "Ausleihe Ende"},
                {title: "Ausleihestatus"},
                {title: "Bearbeiten"}
            ]
        } );
    } );
</script>