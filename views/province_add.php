<?php
include_once("../db.php");
include_once("../province.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => isset($_POST['id']) ? $_POST['id'] : null,
        'name' => $_POST['name'],
    ];
    
    $database = new Database();
    $province = new Province($database);

    try {
        $newProvinceId = $province->create($data);

        if ($newProvinceId) {
            echo "Province added successfully with id: " . $newProvinceId;
            header ("Location: provinces.view.php");
        } else {
            echo "Failed to add province.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Province</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h1>Add Province</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="centered-form">
            <label for="name">Province Name:</label>
            <input type="text" name="name" id="name" required>

            <input type="submit" value="Add Province">
        </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>