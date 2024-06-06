<?php
include 'config.php';

// Handle form submission for adding new client
if(isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    
    $sql = "INSERT INTO client (FirstName, LastName, PhoneNumber) VALUES ('$firstName', '$lastName', '$phoneNumber')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error creating record: " . $conn->error;
    }
}

// Form for adding new client
echo "<form method='post'>";
echo "<label for='firstName'>First Name:</label>";
echo "<input type='text' name='firstName' id='firstName' required><br>";
echo "<label for='lastName'>Last Name:</label>";
echo "<input type='text' name='lastName' id='lastName' required><br>";
echo "<label for='phoneNumber'>Phone Number:</label>";
echo "<input type='text' name='phoneNumber' id='phoneNumber' required><br>";
echo "<input type='submit' name='submit' value='Add Client'>";
echo "</form>";

$conn->close();
?>
