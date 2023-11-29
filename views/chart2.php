
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Province Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .content {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        
    </style>
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <canvas id="chartWestEast"></canvas>
        <?php
        include_once("../db.php");
        include_once("../charts.php");

        $db = new Database();
        $connection = $db->getConnection();
        $chart2 = new Charts($db);
        $chartData = $chart2->chart2();
        ?>
        
        </div>
        
        <!-- Include the header -->
  
    <!-- <?php include('../templates/footer.html'); ?> -->

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the chart data from PHP
        var chartData = <?php echo json_encode($chartData); ?>;
        
        // Output the chartData for debugging
        console.log(chartData);

        // Extracting data for the chart
        var labels = ["West", "East", "North", "South"];
        var data = Object.values(chartData[0]);

        // Creating a bar chart
        var ctx = document.getElementById('chartWestEast').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Student Counts',
                    data: data,
                    backgroundColor: [
                        'red',
                        'pink',
                        'yellow',
                        'purple'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


</body>
</html>
