<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM students WHERE id=$id")
);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn,
        "UPDATE students SET
         name='$name',
         email='$email',
         course='$course'
         WHERE id=$id");

    header("Location: index.php");
}
?>

<h2>Edit Student</h2>

<form method="post">
    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br><br>
    <input type="text" name="email" value="<?php echo $data['email']; ?>"><br><br>
    <input type="text" name="course" value="<?php echo $data['course']; ?>"><br><br>

    <button name="update">Update</button>
</form>
