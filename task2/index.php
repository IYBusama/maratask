<?php include 'db.php'; ?>

<h2>Add Student</h2>

<form method="post">
    Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Course:<br>
    <input type="text" name="course"><br><br>

    <button name="save">Save</button>
</form>

<?php
// CREATE
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn,
        "INSERT INTO students (name,email,course)
         VALUES ('$name','$email','$course')");
}
?>

<hr>

<h2>Student List</h2>

<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Action</th>
</tr>

<?php
// READ
$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['course']; ?></td>
<td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>
