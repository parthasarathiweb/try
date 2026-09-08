<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Lab - Portal Auth</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- 1. LOGIN CARD -->
  <div class="auth-card active" id="loginSection">
    <div class="header">
      <div class="logo">🔑 Student Login</div>
      <h1>Welcome Back</h1>
      <p>Enter your credentials to access your virtual lab workspace</p>
    </div>

    <form action="login_register.php" method="POST" id="loginForm">
      <div class="form-grid-login">
        <div class="form-group">
          <label for="studentId">Student ID</label>
          <input type="text" id="studentId" name="studentId" placeholder="e.g. 21CS045" required>
        </div>

        <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" id="loginPassword" name="loginPassword" placeholder="••••••••" required>
        </div>
      </div>

      <button type="submit" name="login_submit" class="btn-submit">Log In</button>
    </form>

    <div class="footer-text">
      Need an account? <a onclick="showRegister()">Register here</a>
    </div>
  </div>

  <!-- 2. REGISTRATION CARD -->
  <div class="auth-card" id="registerSection">
    <div class="header">
      <div class="logo">🔬 Virtual Lab Portal</div>
      <h1>Create Your Account</h1>
      <p>Access interactive simulations and submit lab assignments</p>
    </div>

    <form action="login_register.php" method="POST" id="registrationForm">
      <div class="form-grid-reg">
        <div class="form-group">
          <label for="studentName">Student Name</label>
          <input type="text" id="studentName" name="studentName" placeholder="e.g. John Doe" required>
        </div>

        <div class="form-group">
          <label for="rollno">Roll No / Student ID</label>
          <input type="text" id="rollno" name="rollno" placeholder="e.g. 21CS045" required>
        </div>

        <div class="form-group">
          <label for="course">Course / Program</label>
          <input type="text" id="course" name="course" placeholder="e.g. B.Tech / B.Sc" required>
        </div>

        <div class="form-group">
          <label for="role">Register As</label>
          <select id="role" name="role" required>
            <option value="student" selected>Student</option>
            <option value="faculty">Faculty / Instructor</option>
          </select>
        </div>

        <div class="form-group full-width">
          <label for="email">College Email Address</label>
          <input type="email" id="email" name="email" placeholder="student@college.edu" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="••••••••" required>
        </div>

        <div class="form-group full-width checkbox-group">
          <input type="checkbox" id="terms" name="terms" required>
          <label for="terms">I agree to the college lab usage guidelines & terms.</label>
        </div>
      </div>

      <button type="submit" name="register_submit" class="btn-submit">Register Account</button>
    </form>

    <div class="footer-text">
      Already registered? <a onclick="showLogin()">Log In here</a>
    </div>
  </div>

  <script src="run.js"></script>

</body>
</html>