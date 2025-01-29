<?php
// Include the database connection file
include 'db.php';
// Start a session to manage user login state
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit; // Stop further execution
}

// Fetch the logged-in user's data using their user ID stored in the session
$user_id = $_SESSION['user_id'];

// Prepare an SQL statement to fetch the user's details from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id); // Bind the user ID to the SQL query
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result of the query
$user = $result->fetch_assoc(); // Fetch the user's data as an associative array

// Store the user's name and email in session variables for easier access later
$_SESSION['name'] = $user['name'];
$_SESSION['email'] = $user['email'];

// Fetch all users' data to display in a table
$sql = "SELECT * FROM users";
$allUsers = $conn->query($sql); // Execute the query and store all users' data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding and viewport for responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>User Profile</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Container for the profile content -->
    <div class="container my-5">
        <!-- Welcome Message -->
        <div class="text-center mb-4">
            <!-- Display a personalized welcome message -->
            <h1>Welcome, <?= $_SESSION['name']; ?>!</h1>
            <!-- Subtitle explaining the purpose of the page -->
            <p class="text-muted">Here is your information along with all registered users.</p>
        </div>

        <!-- Logged-In User Details -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4>Your Details</h4>
                <!-- Table displaying the logged-in user's details -->
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th> <!-- Label for ID -->
                        <td><?= $user['id']; ?></td> <!-- User ID -->
                    </tr>
                    <tr>
                        <th>Name</th> <!-- Label for Name -->
                        <td><?= $user['name']; ?></td> <!-- User Name -->
                    </tr>
                    <tr>
                        <th>Email</th> <!-- Label for Email -->
                        <td><?= $user['email']; ?></td> <!-- User Email -->
                    </tr>
                </table>
            </div>
        </div>

        <!-- All Users Data -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>All Registered Users</h4>
                <!-- Table displaying all registered users -->
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th> <!-- Column header for ID -->
                            <th>Name</th> <!-- Column header for Name -->
                            <th>Email</th> <!-- Column header for Email -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through all users and display their data -->
                        <?php while ($row = $allUsers->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id']; ?></td> <!-- User ID -->
                                <td><?= $row['name']; ?></td> <!-- User Name -->
                                <td><?= $row['email']; ?></td> <!-- User Email -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <!-- Button to log out and end the session -->
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Link to Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
