<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Add Student</h3>

<form method="post">
<input name="studno" class="form-control mb-2" placeholder="Student Number" required>
<input name="fname" class="form-control mb-2" placeholder="First Name" required>
<input name="lname" class="form-control mb-2" placeholder="Last Name" required>

<select name="gender" class="form-control mb-2">
<option value="">Gender</option>
<option>Male</option>
<option>Female</option>
</select>

<input type="date" name="bday" class="form-control mb-2">
<input type="email" name="email" class="form-control mb-2" placeholder="Email">

<select name="course" class="form-control mb-2" required>
<option value="">Select Course</option>
<?php
$c = mysqli_query($conn, "SELECT * FROM courses");
while ($row = mysqli_fetch_assoc($c)) {
echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
}
?>
</select>

<button name="save" class="btn btn-primary">Save</button>
<a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php
if (isset($_POST['save'])) {
mysqli_query($conn,"
INSERT INTO students VALUES (
NULL,
'{$_POST['studno']}',
'{$_POST['fname']}',
'{$_POST['lname']}',
'{$_POST['gender']}',
'{$_POST['bday']}',
'{$_POST['email']}',
'{$_POST['course']}'
)");
echo "<div class='alert alert-success mt-2'>Student added successfully.</div>";
}
?>
</div>
</body>
</html>
