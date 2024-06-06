<?php
include 'config.php';

// Retrieve clients from the database
$sql = "SELECT * FROM client";
$result = $conn->query($sql);

// Start HTML output with CSS style
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Client List</title>";
echo "<style>";
echo "
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
";
echo "</style>";
echo "</head>";
echo "<body>";

// Display clients in a table
echo "<h2>Clients</h2>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone Number</th>
<th>Actions</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['FirstName']."</td>";
        echo "<td>".$row['LastName']."</td>";
        echo "<td>".$row['PhoneNumber']."</td>";
        echo "<td>
                <a href='edit.php?id=".$row['id']."'><button>Edit</button></a> | 
                <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure you want to delete this client?\")'><button>Delete</button></a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No clients found</td></tr>";
}
echo "</table>";

// Button for adding new record
echo "<br>";
echo "<a href='create.php'><button>Add New Record</button></a>";

echo "</body>";
echo "</html>";

$conn->close();
?>
