<?php
require 'koneksi.php';

// Check if the ID parameter is passed
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM bungas WHERE id_bunga = ?";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the dashboard page after successful deletion
        header("Location: ../admins.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the ID parameter is not provided, redirect back to the dashboard page
    header("Location: ../admins.php");
    exit();
}
?>
