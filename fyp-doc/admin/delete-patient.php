<?php
    // Start session and check user authentication
    session_start();
    if(isset($_SESSION["user"])) {
        if(($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
            header("location: ../login.php");
            exit; // Add exit to prevent further execution
        }
    } else {
        header("location: ../login.php");
        exit; // Add exit to prevent further execution
    }

    // Import database connection
    include("../connection.php");

    // Check if ID is provided in the query string for deletion
    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET["id"];

        // Delete from the patient table
        $result = $database->query("SELECT * FROM patient WHERE pid = $id;");
        if($result->num_rows > 0) {
            $sql = $database->query("DELETE FROM patient WHERE pid = $id;");
            // Additional deletion from related tables (if applicable) goes here

            // Redirect back to the patients.php page after deletion
            header("location: patient.php");
            exit; // Add exit to prevent further execution
        } else {
            echo "Patient not found.";
            // Handle the case where the patient with the provided ID doesn't exist
        }
    }
?>
