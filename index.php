<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Enrollment System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h2>Student Enrollment Management System</h2>

<a href="add_student.php" class="btn btn-primary mb-2">Add Student</a>
<a href="enroll_student.php" class="btn btn-success mb-2">Enroll Student</a>

<table class="table table-bordered table-hover mt-3">
<thead class="table-dark">
<tr>
    <th>Student No.</th>
    <th>Name</th>
    <th>Course</th>
    <th>School Year</th>
    <th>Status</th>
    <th width="220">Actions</th>
</tr>
</thead>
<tbody>

<?php
$q = "
SELECT s.student_id, s.student_number, s.first_name, s.last_name,
       c.course_name, e.school_year, e.status
FROM students s
JOIN courses c ON s.course_id = c.course_id
LEFT JOIN enrollments e ON s.student_id = e.student_id
";
$res = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($res)) {
echo "
<tr>
<td>{$row['student_number']}</td>
<td>{$row['first_name']} {$row['last_name']}</td>
<td>{$row['course_name']}</td>
<td>{$row['school_year']}</td>
<td>{$row['status']}</td>
<td>
<a href='edit_student.php?id={$row['student_id']}' class='btn btn-warning btn-sm'>Edit</a>
<a href='update_status.php?id={$row['student_id']}' class='btn btn-info btn-sm'>Status</a>
<a href='delete_student.php?id={$row['student_id']}'
   onclick=\"return confirm('Delete this student?')\"
   class='btn btn-danger btn-sm'>Delete</a>
</td>
</tr>";
}
?>

</tbody>
</table>
</div>
</body>
</html>
