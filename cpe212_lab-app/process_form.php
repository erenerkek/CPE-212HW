<?php
// Database connection settings
$host = 'localhost';
$db_name = 'students';
$username = 'root';
$password = '';

// Create a new PDO instance
$dsn = "mysql:host=$host;dbname=$db_name";
$db = new PDO($dsn, $username, $password);

// Retrieve form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Validate form data
$errors = array();
if (empty($full_name)) {
    $errors[] = 'Full Name is required.';
}
if (empty($email)) {
    $errors[] = 'Email Address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid Email Address.';
}
if (empty($gender)) {
    $errors[] = 'Gender is required.';
}

// If there are errors, display them and stop processing
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    exit();
}

// Insert the student's information into the database
$sql = "INSERT INTO students (full_name, email, gender) VALUES (:full_name, :email, :gender)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':gender', $gender);

if ($stmt->execute()) {
    echo 'Student information inserted successfully.';
} else {
    echo 'Error inserting student information.';
}
?>

