<?php

$name = '';
$email= '';
$telefon = '';
$films = [];

// DB
require 'app/Models/MovieModel.php';
require 'app/Models/MemberModel.php';
require 'app/Models/TenantModel.php';

require 'app/Views/capture.view.php';
include 'app/core/helpers.php';