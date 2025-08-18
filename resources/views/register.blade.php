<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .register-card {
      width: 100%;
      max-width: 400px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .btn-darkblue {
      background-color: #0d47a1;
      border: none;
    }
    .btn-darkblue:hover {
      background-color: #093170;
    }
  </style>
</head>
<body>
  <div class="card register-card">
    <div class="card-body p-4">
      <h4 class="text-center mb-3">Register</h4>
      <form>
        <!-- Username -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter username" required>
        </div>
        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="user@example.com" required>
        </div>
        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter password" required>
        </div>
        <!-- User Role -->
        <div class="mb-3">
          <label for="userRole" class="form-label">User Role</label>
          <select class="form-select form-select-sm" id="userRole" name="userRole" required>
            <option value="">Select Role</option>
            <option value="1">Freelancer</option>
            <option value="2">Job Seeker</option>
          </select>
        </div>
        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" class="btn btn-darkblue btn-sm text-white">Register</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
