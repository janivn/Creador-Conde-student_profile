<?php
require_once('town_city.php');

$townId = $_GET['townId'];

$townCity = new TownCity($db);
$townCity->delete($townId);

header('Location: towns.view.php')
?>