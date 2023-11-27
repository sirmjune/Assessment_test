<?php

$conn = new mysqli('locahost', 'admin', 'admin123', 'destinations');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);


    $sql = "INSERT INTO destinations (name, description, image_url) VALUES ('$name', '$description', '$image_url')";
    $result = $conn->query($sql);

    if ($result) {
        echo "Destination added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination</title>
</head>
<body>
    <h2>Add New Destination</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url" required><br>

        <input type="submit" value="Add Destination">
    </form>
</body>
</html>
