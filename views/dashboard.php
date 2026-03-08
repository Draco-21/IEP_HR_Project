<?php
session_start();
// Security Check: If not logged in, boot them back to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include '../templates/header.php';
?>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">HRMS Dashboard</span>
        <span class="navbar-text text-white">
            Logged in as: <strong><?php echo $_SESSION['username']; ?></strong> (<?php echo $_SESSION['role']; ?>)
        </span>
        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Company Announcements</h5>
                    <p class="card-text">Check here for the latest news and holiday updates.</p>
                </div>
            </div>
        </div>

        <?php if ($_SESSION['role'] == 'Manager'): ?>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <h3>Attendance Analytics</h3>
                        <p>Analyze absenteeism and overtime behavior.</p>
                        <a href="#" class="btn btn-primary">View Insights</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <h3>Timesheet Approvals</h3>
                        <p>Review and approve pending employee timesheets.</p>
                        <a href="#" class="btn btn-warning">Review Now</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <h3>Shift Management</h3>
                        <p>Record your clock-in, clock-out, and breaks.</p>
                        <button class="btn btn-success">Clock In</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <h3>My Timesheets</h3>
                        <p>Fill in your hourly work details for today.</p>
                        <a href="#" class="btn btn-info text-white">Submit Timesheet</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../templates/footer.php'; ?>