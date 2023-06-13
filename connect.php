<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $phno = $_POST["phno"];
    $email = $_POST["email"];

    // Insert the form data into the database
    $sql = "INSERT INTO registration (name, phno, email) VALUES ('$name', '$phno', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
