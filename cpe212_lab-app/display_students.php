<?php
// Database connection settings
$host = 'localhost';
$db_name = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

// Create a new PDO instance
$dsn = "mysql:host=$host;dbname=$db_name";
$db = new PDO($dsn, $username, $password);

// Retrieve students from the database
$sql = "SELECT * FROM students";
$stmt = $db->query($sql);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
<h1>Registered Students</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Gender</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['full_name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['gender']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

