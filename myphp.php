<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname     = "studentreg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data via POST request
  $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $depart = $_POST['depart'];
    $Acadamic_Year = $_POST['Acadamic_Year'];
    $semester = $_POST['semester'];
    $email = $_POST['email'];
    $address = $_POST['address'];

  // Prepare SQL statement with parameter placeholders
  $sql = 'INSERT INTO studentrecord (fname, last_name, gender, id_no, department, academic_year, semester, email, addrss)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

  // Prepare the SQL statement
  $stmt = $conn->prepare($sql);

  // Bind parameters to be inserted into SQL statement
  $stmt->bind_param("sssssiiss",  $Fname , $Lname,  $gender,  $id,  $depart,  $Acadamic_Year, $semester, $email,  $address );

  // Execute prepared statement
  if ($stmt->execute()) {
    // Output a success message
    echo "registered successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>