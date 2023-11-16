<?php
require_once('town_city.php');

$townId = $_GET['townId'];
$townName = $_POST['townName'];

$TownCity = new TownCity($db);
$townCity->update($townId, $townName);

header('Location: towns.view.php');
?>