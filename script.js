$(document).ready(function() {
    // Submit add client form via AJAX
    $('#addClientForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'add_client.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                // Reset form fields
                $('#addClientForm')[0].reset();
                // Reload client details after adding
                getClientDetails();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Load client details on page load
    getClientDetails();
});

// Function to fetch and display client details
function getClientDetails() {
    $.ajax({
        url: 'get_client_details.php',
        type: 'GET',
        success: function(response) {
            $('#clientDetails').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
