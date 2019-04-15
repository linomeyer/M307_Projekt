
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="edit"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Erfassen</title>
</head>
<body>

<div class="wrapper">

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

    <form method="post" id="formular">

        <fieldset>
            <legend>Person</legend>

            <div class="form-group">
                <label for="name" class="form-label">Name:</label><p class="required-star"> *</p>
                <input class="form-control" type="text" id="name" name="name" required value="<?= e($name) ?>">
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Vorname:</label><p class="required-star"> *</p>
                <input class="form-control" type="text" id="name" name="name" required value="<?= e($name) ?>">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label><p class="required-star"> *</p>
                <input class="form-control" type="email" id="email" name="email" required value="<?= e($email) ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="phone">Telefonnummer</label>
                <input class="form-control" type="text" id="phone" name="phone" value="<?= e($telefon) ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="member-status">Mitgliedschaftsstatus:</label><p class="required-star"> *</p>
                <select class="form-control" id="member-status" name="member-status">
                    <option value="">Keine</option>
                    <option value="Bronze">Bronze</option>
                    <option value="Silber">Silber</option>
                    <option value="Gold">Gold</option>
                </select>
            </div>

        </fieldset>

        <fieldset>
            <legend>Ausleih Details</legend>

            <div class="form-group">
                <label class="form-label" for="movie">Video:</label><p class="required-star"> *</p>
                <select class="form-control" id="movie" name="movie">
                    <?php foreach ($films as $index => $film) { ?>
                        <option value="<?= e($film['id']) ?>"><?= e($film['title'])?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="enddate">Ausleihe Enddatum:</label>
                <input class="form-control" type="text" id="enddate" name="enddate" readonly>
            </div>

        </fieldset>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Absenden">
        </div>

    </form>
</div>

<!--<script src="public/js/ausleihe-enddatum.js"></script>
<script src="public/js/formValidation.js"></script>-->
</body>
</html>