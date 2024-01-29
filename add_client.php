<?php
// Include database connection
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $next_step = $_POST['next_step'];
    $activity = $_POST['activity'];

    // Insert client into the clients table
    $query = "INSERT INTO clients (first_name, last_name, phone_number, address) VALUES ('$first_name', '$last_name', '$phone_number', '$address')";
    if(mysqli_query($connection, $query)) {
        // Get the ID of the inserted client
        $client_id = mysqli_insert_id($connection);

        // Insert note for the client
        $note_query = "INSERT INTO notes (client_id, note) VALUES ('$client_id', '$note')";
        mysqli_query($connection, $note_query);

        // Insert next step for the client
        $next_step_query = "INSERT INTO next_steps (client_id, step) VALUES ('$client_id', '$next_step')";
        mysqli_query($connection, $next_step_query);

        // Insert activity for the client
        $activity_query = "INSERT INTO activities (client_id, activity) VALUES ('$client_id', '$activity')";
        mysqli_query($connection, $activity_query);

        echo "Client added successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

// Close database connection
mysqli_close($connection);
?>
