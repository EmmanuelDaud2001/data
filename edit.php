<?php
include 'config.php';

// Check if the form for editing an existing client has been submitted
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];
    $newPhoneNumber = $_POST['newPhoneNumber'];
    
    $sql = "UPDATE client SET FirstName='$newFirstName', LastName='$newLastName', PhoneNumber='$newPhoneNumber' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve client details based on the ID provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM client WHERE id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the form for editing the client details
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "<label for='newFirstName'>New First Name:</label>";
        echo "<input type='text' name='newFirstName' id='newFirstName' value='".$row['FirstName']."' required><br>";
        echo "<label for='newLastName'>New Last Name:</label>";
        echo "<input type='text' name='newLastName' id='newLastName' value='".$row['LastName']."' required><br>";
        echo "<label for='newPhoneNumber'>New Phone Number:</label>";
        echo "<input type='text' name='newPhoneNumber' id='newPhoneNumber' value='".$row['PhoneNumber']."' required><br>";
        echo "<input type='submit' name='edit' value='Update'>";
        echo "</form>";
    } else {
        echo "Client not found";
    }
} else {
    echo "No client ID provided";
}

$conn->close();
?>
