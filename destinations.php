<?php

$conn = new mysqli('locahost', 'admin', 'admin123', 'destinations');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM destinations";
$result = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Destinations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .destination {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        .destination img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Travel Destinations</h2>

    <?php

    while ($row = $result->fetch_assoc()) {
        echo '<div class="destination">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '">';
        echo '</div>';
    }
    ?>
</body>
</html>
