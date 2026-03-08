<?php
session_start();
include 'config/db.php';
include 'templates/header.php';

// Security: Ensure only Employees can see this specific page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Employee') {
    header("Location: login.php");
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar vh-100 text-white p-3">
            <h4>HR Portal</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white active">Dashboard</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white">My Attendance</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white">Submit Timesheet</a></li>
                <li class="nav-item mb-2"><a href="logout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>

        <main class="col-md-10 ms-sm-auto px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-success text-white">Shift Management</div>
                        <div class="card-body text-center">
                            <p id="current-time" class="h4 mb-3"></p>
                            <button id="clockBtn" class="btn btn-primary btn-lg w-100">Clock In</button>
                            <div id="attendance-status" class="mt-2 text-muted small">Not clocked in yet.</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">Daily Timesheet Entry</div>
                        <div class="card-body">
                            <form id="timesheetForm">
                                <div class="mb-3">
                                    <label class="form-label">Work Description</label>
                                    <textarea class="form-control" rows="3" placeholder="What did you work on today?"></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Save Entry</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">Latest Company News</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>New:</strong> Welcome to the new Intelligent HRMS portal!</li>
                                <li class="list-group-item"><strong>Reminder:</strong> Public Holiday next Monday.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        document.getElementById('current-time').innerText = now.toLocaleTimeString();
    }
    setInterval(updateTime, 1000);
    updateTime();
</script>

<?php include 'templates/footer.php'; ?>