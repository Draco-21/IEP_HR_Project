<?php
session_start();
// If user is already logged in, send them straight to the dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

include 'templates/header.php'; 
?>

<div class="container text-center mt-5">
    <div class="jumbotron bg-white p-5 rounded shadow-sm">
        <h1 class="display-4">Intelligent HRMS</h1>
        <p class="lead">Welcome to the Hideaway Holidays Internal Portal.</p>
        <hr class="my-4">
        <p>Please log in to manage your attendance, timesheets, and company news.</p>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
            <a class="btn btn-outline-secondary btn-lg" href="register.php" role="button">Register</a>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>