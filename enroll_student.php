<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Enroll Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Enroll Student</h3>

<form method="post">
<select name="student" class="form-control mb-2" required>
<option value="">Select Student</option>
<?php
$s = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($s)) {
echo "<option value='{$row['student_id']}'>{$row['student_number']} - {$row['first_name']} {$row['last_name']}</option>";
}
?>
</select>

<input name="sy" class="form-control mb-2" placeholder="School Year (e.g. 2025-2026)" required>

<button name="enroll" class="btn btn-success">Enroll</button>
<a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php
if (isset($_POST['enroll'])) {
mysqli_query($conn,"
INSERT INTO enrollments VALUES (
NULL,
'{$_POST['student']}',
'{$_POST['sy']}',
CURDATE(),
'Enrolled'
)");
echo "<div class='alert alert-success mt-2'>Enrollment successful.</div>";
}
?>
</div>
</body>
</html>
