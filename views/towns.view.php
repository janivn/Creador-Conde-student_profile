<?php
require_once('town_city.php');

$townCity = new TownCity($db);
$towns = $townCity->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Towns</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Town ID</th>
                <th>Town Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($towns as $town): ?>
                <tr>
                    <td><?= $town['townId'] ?></td>
                    <td><?= $town['townName'] ?></td>
                    <td><a href="town_edit.php?townId=<?= $town['townId'] ?>">Edit</a></td>
                    <td><a href="town_delete.php?townId=<?= $town['townId'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="town_add.php">Add Town</a>
</body>
</html>