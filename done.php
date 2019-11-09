<?php
require 'vendor/autoload.php';
require 'database.php';

$db = new Database();
$db->markAsDone();

header('Location: /index.php');
