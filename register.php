<?php
// Include the database connection file
include 'db.php';

// Variable to store messages for user feedback
$message = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form input values
    $name = $_POST['name']; // User's name
    $email = $_POST['email']; // User's email
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security

    // SQL query to check if the email already exists in the database
    $checkQuery = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery); // Execute the query

    if (mysqli_num_rows($result) > 0) {
        // If the email already exists, set an error message
        $message = "Email is already registered!";
    } else {
        // SQL query to insert the new user's data into the database
        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $insertQuery)) {
            // Set a success message if the query executes successfully
            $message = "Registration successful! You can now <a href='login.php'>Login</a>";
        } else {
            // Set an error message if the query fails
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding and viewport for responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>Register</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Center the card vertically and horizontally in the viewport -->
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <!-- Card for registration form -->
        <div class="card shadow-lg" style="width: 400px; padding: 20px;">
            <!-- Page header -->
            <h2 class="text-center mb-4">Register</h2>

            <!-- Display a message if it exists -->
            <?php if (!empty($message)): ?>
                <div class="alert alert-info text-center"><?= $message; ?></div>
            <?php endif; ?>

            <!-- Registration form -->
            <form method="POST">
                <!-- Name input field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Email input field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Password input field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Submit button -->
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-success">Register</button>
                </div>

                <!-- Link to login page for existing users -->
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Link to Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
