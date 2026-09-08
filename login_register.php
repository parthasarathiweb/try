<?php
session_start();
require_once 'db.php';

// ==========================================
// 1. REGISTRATION LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_submit'])) {
    $name     = trim($_POST['studentName']);
    $id       = trim($_POST['rollno']);
    $course   = trim($_POST['course']);
    $role     = trim($_POST['role']);
    $email    = trim($_POST['email']);
    $pass     = $_POST['password'];
    $confirm  = $_POST['confirmPassword'];

    // Check if passwords match
    if ($pass !== $confirm) {
        echo "<script>alert('Passwords do not match!'); window.location.href='index.php';</script>";
        exit();
    }

    // Check if Student ID or Email is already registered
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE student_id = ? OR email = ?");
    $checkStmt->bind_param("ss", $id, $email);
    $checkStmt->execute();
    if ($checkStmt->get_result()->num_rows > 0) {
        echo "<script>alert('Student ID or Email is already registered!'); window.location.href='index.php';</script>";
        exit();
    }
    $checkStmt->close();

    // Securely hash password
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (student_name, student_id, course, role, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $id, $course, $role, $email, $hashedPass);

    if ($stmt->execute()) {
        // Automatically start user session after successful registration
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['student_name'] = $name;
        $_SESSION['role'] = $role;

        // Direct user straight to lab workspace
        echo "<script>alert('Registration Successful! Welcome to Virtual Lab.'); window.location.href='lab.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.location.href='index.php';</script>";
    }
    $stmt->close();
}

// ==========================================
// 2. LOGIN LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $id   = trim($_POST['studentId']);
    $pass = $_POST['loginPassword'];

    // Retrieve user by Student ID
    $stmt = $conn->prepare("SELECT * FROM users WHERE student_id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Verify hashed password
        if (password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['student_name'] = $user['student_name'];
            $_SESSION['role'] = $user['role'];
            
            echo "<script>alert('Login Successful!'); window.location.href='lab.php';</script>";
        } else {
            echo "<script>alert('Incorrect Password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Student ID not found!'); window.location.href='index.php';</script>";
    }
    $stmt->close();
}
?>