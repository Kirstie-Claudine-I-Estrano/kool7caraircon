<?php
include 'conn.php';

if (isset($_POST['id'])) {
    $client_id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "DELETE FROM appointments WHERE id='$client_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "
        <script>
            alert('Appointment deleted successfully');
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting appointment');
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Delete Appointment</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Appointment Deletion</h4>
                    </div>
                    <div class="card-body text-center">
                        <h5>Appointment has been deleted successfully.</h5>
                        <a href="index.php" class="btn btn-primary mt-3">Go Back to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>