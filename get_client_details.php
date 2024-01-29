<?php
// Include database connection
include 'db_connection.php';

// Fetch clients from the database
$query = "SELECT * FROM clients";
$result = mysqli_query($connection, $query);

if(mysqli_num_rows($result) > 0) {
    // Display clients
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
        echo '<p class="card-text">Phone: ' . $row['phone_number'] . '</p>';
        echo '<p class="card-text">Address: ' . $row['address'] . '</p>';

        // Display notes for the client
        echo '<h6>Notes:</h6>';
        $client_id = $row['id'];
        $notes_query = "SELECT * FROM notes WHERE client_id = $client_id";
        $notes_result = mysqli_query($connection, $notes_query);
        while ($note_row = mysqli_fetch_assoc($notes_result)) {
            echo '<p class="card-text">' . $note_row['note'] . '</p>';
        }

        // Display next steps for the client
        echo '<h6>Next Steps:</h6>';
        $next_steps_query = "SELECT * FROM next_steps WHERE client_id = $client_id";
        $next_steps_result = mysqli_query($connection, $next_steps_query);
        while ($next_step_row = mysqli_fetch_assoc($next_steps_result)) {
            echo '<p class="card-text">' . $next_step_row['step'] . '</p>';
        }

        // Display activities for the client
        echo '<h6>Activities:</h6>';
        $activities_query = "SELECT * FROM activities WHERE client_id = $client_id";
        $activities_result = mysqli_query($connection, $activities_query);
        while ($activity_row = mysqli_fetch_assoc($activities_result)) {
            echo '<p class="card-text">' . $activity_row['activity'] . '</p>';
        }

        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No clients found.</p>';
}

// Close database connection
mysqli_close($connection);
?>
