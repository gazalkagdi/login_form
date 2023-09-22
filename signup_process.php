<?php


$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

// Get user input from the form
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];

// Hash the password for security (you should use a stronger hashing method)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO users (user_name, password, name) VALUES ('$username', '$password', '$name')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful. You can now <a href='index.php'>Log In</a>.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
