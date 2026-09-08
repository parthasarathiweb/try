<?php
session_start();

// Security Guard: Redirect back to login if session does not exist
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$student_name = $_SESSION['student_name'] ?? 'Student';
$user_role    = $_SESSION['role'] ?? 'student';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Lab - Workspace</title>
  <style>
    :root {
      --primary: #1e3a8a;
      --primary-hover: #1e40af;
      --bg: #f8fafc;
      --surface: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --border: #cbd5e1;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: system-ui, -apple-system, sans-serif; }
    body { background-color: var(--bg); color: var(--text); min-height: 100vh; display: flex; flex-direction: column; }

    header {
      background: var(--primary);
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    header .logo { font-size: 1.25rem; font-weight: 700; }
    header .user-profile { display: flex; align-items: center; gap: 1rem; }

    .role-badge {
      background: rgba(255, 255, 255, 0.2);
      padding: 0.2rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      text-transform: uppercase;
      font-weight: 600;
    }

    .btn-logout {
      background: #ef4444;
      color: white;
      padding: 0.4rem 0.85rem;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.85rem;
      transition: background 0.2s ease;
    }
    .btn-logout:hover { background: #dc2626; }

    main { max-width: 1000px; width: 100%; margin: 2.5rem auto; padding: 0 1.5rem; flex: 1; }

    .welcome-card {
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 2rem;
      border-radius: 10px;
      margin-bottom: 2rem;
    }
    .welcome-card h1 { color: var(--primary); font-size: 1.75rem; margin-bottom: 0.5rem; }
    .welcome-card p { color: var(--muted); font-size: 0.95rem; }

    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; }

    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .card h3 { font-size: 1.1rem; margin-bottom: 0.5rem; }
    .card p { font-size: 0.875rem; color: var(--muted); margin-bottom: 1.25rem; line-height: 1.4; }

    .btn-action {
      display: inline-block;
      text-align: center;
      background: #2563eb;
      color: white;
      padding: 0.55rem 1rem;
      border-radius: 6px;
      text-decoration: none;
      font-size: 0.875rem;
      font-weight: 500;
    }
    .btn-action:hover { background: var(--primary-hover); }
  </style>
</head>
<body>

  <header>
    <div class="logo">🔬 Virtual Lab Portal</div>
    <div class="user-profile">
      <span>Welcome, <strong><?php echo htmlspecialchars($student_name); ?></strong> 
        <span class="role-badge"><?php echo htmlspecialchars($user_role); ?></span>
      </span>
      <a href="logout.php" class="btn-logout">Logout</a>
    </div>
  </header>

  <main>
    <div class="welcome-card">
      <h1>Student Workspace</h1>
      <p>Authentication complete. Select an interactive lab module below to launch your experiment session.</p>
    </div>

    <div class="grid">
      <div class="card">
        <div>
          <h3>⚡ Physics Lab</h3>
          <p>Simulate Ohm's Law and analyze DC circuit currents in real-time.</p>
        </div>
        <a href="#" class="btn-action" onclick="alert('Launching Physics Simulation...')">Enter Lab</a>
      </div>

      <div class="card">
        <div>
          <h3>🧪 Chemistry Lab</h3>
          <p>Perform virtual acid-base titrations and monitor pH changes.</p>
        </div>
        <a href="#" class="btn-action" onclick="alert('Launching Chemistry Simulation...')">Enter Lab</a>
      </div>

      <div class="card">
        <div>
          <h3>💻 Computer Science</h3>
          <p>Visualize stack, queue, and sorting algorithm executions.</p>
        </div>
        <a href="#" class="btn-action" onclick="alert('Launching CS Visualizer...')">Enter Lab</a>
      </div>
    </div>
  </main>

</body>
</html>