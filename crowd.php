
<!DOCTYPE html>
<html lang="en">


<head>
    <title>WholeDataGraph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <?php
    // Read the CSV file
    $file = fopen('/people1_count.csv', 'r');

    // Initialize arrays to store data
    $labels = [];
    $data = [];

    // Extract data from CSV
    while (($row = fgetcsv($file)) !== false) {
        $labels[] = $row[0]; // Assuming first column contains labels
        $data[] = $row[1]; // Assuming second column contains values
    }

    fclose($file);
    ?>

    <script>
    // Prepare graph data
    var labels = <?php echo json_encode($labels); ?>;
    var data = <?php echo json_encode($data); ?>;

    // Create the graph
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'CSV Data',
                data: data,
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
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
    </script>
</body>
</html>
