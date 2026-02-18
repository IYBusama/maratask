<?php

$conn = mysqli_connect("localhost", "root", "", "internship_db");

if (!$conn) {
    die("Connection failed");
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

echo "<h2>Student Records</h2>";

echo "<table border='1' cellpadding='8'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['course']."</td>
          </tr>";
}

echo "</table>";

mysqli_close($conn);
?>
<br><a href="task3.html">Go Back</a>