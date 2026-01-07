# CC105_DB_SantosRanceSyshe

# Student Enrollment Management System (SEMS)

## 1. System Overview and Purpose

The **Student Enrollment Management System (SEMS)** is a database-driven system developed for **CC 105 – Information Management**.  
Its main purpose is to demonstrate:

- Proper database design using MySQL  
- Table relationships and normalization up to **3NF**  
- CRUD (Create, Read, Update, Delete) operations on student records  
- Enrollment management with foreign key constraints  

This system allows users to manage **students, courses, and enrollments** efficiently through a **PHP-based interface**, making it easy to store, retrieve, update, and delete data.

---

## 2. Table Descriptions and Relationships

### Courses Table
Stores the list of available courses/programs.

| Field Name | Description |
|-----------|-------------|
| course_id | Primary key |
| course_name | Name of the course |

---

### Students Table
Stores detailed information about each student.

| Field Name | Description |
|-----------|-------------|
| student_id | Primary key |
| student_number | Unique student identifier |
| first_name | Student’s first name |
| last_name | Student’s last name |
| gender | Male / Female |
| birthdate | Date of birth |
| email | Student email |
| course_id | Foreign key referencing `courses.course_id` |

---

### Enrollments Table
Stores enrollment details of students.

| Field Name | Description |
|-----------|-------------|
| enrollment_id | Primary key |
| student_id | Foreign key referencing `students.student_id` |
| school_year | Academic year (e.g., 2025–2026) |
| enrollment_date | Date of enrollment |
| status | Enrollment status (Enrolled / Completed / Dropped) |

---

### Relationships

- One **course** can have many **students**  
- One **student** can have multiple **enrollments**  
- Foreign keys ensure **referential integrity**  
- Tables are normalized to **avoid redundant data**  

---

## 3. Sample Outputs / Screenshots

### Example Query Output

**List of students with course and enrollment info**

| Student Number | Name | Course | School Year | Status |
|----------------|------|--------|-------------|--------|
| 2025-001 | Juan Dela Cruz | BS Information Technology | 2025–2026 | Enrolled |
| 2025-002 | Maria Santos | BS Computer Science | 2025–2026 | Enrolled |

### JOIN Query Example

```sql
SELECT s.student_number, s.first_name, s.last_name,
       c.course_name, e.school_year, e.status
FROM students s
JOIN courses c ON s.course_id = c.course_id
JOIN enrollments e ON s.student_id = e.student_id;
