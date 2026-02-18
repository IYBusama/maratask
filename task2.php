<?php

// Basic backend processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    $errors = [];

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email required";
    }

    if (empty($age) || $age < 1) {
        $errors[] = "Enter valid age";
    }

    // Show errors
    if (!empty($errors)) {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $e) {
            echo $e . "<br>";
        }
        echo "<br><a href='index.html'>Go Back</a>";
    } else {

        // Data processing (example)
        echo "<h3>Data received successfully</h3>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Age: " . htmlspecialchars($age) . "<br>";

        // Here normally: save to database
        // mysqli / PDO code can go here
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Backend Week</title>
</head>
<body>

<h2>Student Registration</h2>

<form action="process.php" method="post">
    Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Age:<br>
    <input type="number" name="age"><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
