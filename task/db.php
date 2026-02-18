<?php

$conn = mysqli_connect("localhost", "root", "", "internship_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

// Insert data
$sql = "INSERT INTO students (name, email, course)
        VALUES ('$name', '$email', '$course')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully<br>";
    echo "<a href='view.php'>View Records</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
