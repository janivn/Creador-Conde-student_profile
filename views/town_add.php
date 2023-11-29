<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['name'],
    ];

    // Instantiate the Database and Student classes
    $database = new Database();
    $town = new TownCity($database);

    if ($town->create($data)) {
        echo "Record inserted successfully.";
    } else {
        echo "Failed to insert the record.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <title>Add Town Data</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h1>Add Town</h1>
    <form action="" method="post" class="centered-form">
        <label for="town_name">Town Name:</label>
        <input type="text" name="name" id="town_city" required>

        <input type="submit" value="Add Town">
    </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>