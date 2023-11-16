<?php

require_once('town_city.php');

$townName = $_POST['townName'];

$townCity = new TownCity($db);
$townCity->create($townName);

header('Location: towns.view.php');
?>