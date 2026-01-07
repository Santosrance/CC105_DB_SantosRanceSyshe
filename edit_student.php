<?php include 'db.php';
$id = $_GET['id'];
$s = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE student_id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Edit Student</h3>

<form method="post">
    <input type="text" name="fname" value="<?= $s['first_name'] ?>" class="form-control mb-2" required>
    <input type="text" name="lname" value="<?= $s['last_name'] ?>" class="form-control mb-2" required>

    <button name="update" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn,
        "UPDATE students SET
         first_name='{$_POST['fname']}',
         last_name='{$_POST['lname']}'
         WHERE student_id=$id"
    );
    header("Location: index.php");
}
?>
</div>

</body>
</html>
