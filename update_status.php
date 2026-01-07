<?php include 'db.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Status</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Update Enrollment Status</h3>

<form method="post">
<select name="status" class="form-control mb-2">
<option>Enrolled</option>
<option>Completed</option>
<option>Dropped</option>
</select>

<button name="update" class="btn btn-info">Update</button>
<a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php
if (isset($_POST['update'])) {
mysqli_query($conn,"
UPDATE enrollments
SET status='{$_POST['status']}'
WHERE student_id=$id
");
header("Location: index.php");
}
?>
</div>
</body>
</html>
