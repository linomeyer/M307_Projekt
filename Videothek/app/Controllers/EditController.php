<?php

$name = '';
$email= '';
$telefon = '';
$rentStatus = '';
$film = '';

// DB
require 'app/Models/MovieModel.php';
require 'app/Models/MemberModel.php';
require 'app/Models/TenantModel.php';

require 'app/Views/edit.view.php';
include 'app/core/helpers.php';