<?php
include 'config.php';

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete client from the database
    $sql = "DELETE FROM client WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Client deleted successfully";
        // Add a button to go back to the index page
        echo "<br><br>";
        echo "<a href='index.php'><button>Back to Clients</button></a>";
    } else {
        echo "Error deleting client: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();
?>
