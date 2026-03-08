<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    // Securely hash the password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$username, $password, $role])) {
        echo "<div class='alert alert-success'>User registered! <a href='login.php'>Login here</a></div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card p-4" style="max-width: 400px;">
        <h2>Register User</h2>
        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <select name="role" class="form-select mb-3">
                <option value="Employee">Employee</option>
                <option value="Manager">Manager</option>
            </select>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
    </div>
</body>
</html>