<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @if (Auth::user()->role == 'administrator')Admin @endif
    @if (Auth::user()->role == 'teknisi')Teknisi @endif
    @if (Auth::user()->role == 'superuser')SuperUser @endif
  </title>
  <!-- Link to Bootstrap CSS and Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
    }
    .sidebar {
      width: 50px;
      height: 100%;
      background-color: #343a40;
      color: white;
      padding: 10px;
      overflow-y: auto; /* Enable vertical scroll if necessary */
    }
    .main-content {
      flex-grow: 1;
      padding: 20px;
      background-color: #f7f9fc;
    }
    .sidebar-header {
      margin-bottom: 10px;
    }
    .sidebar .nav-item {
      margin-bottom: 10px;
    }
    .sidebar .nav-link {
      color: white;
    }
    .nav-link:hover {
      text-decoration: underline;
    }
    .mb-4 {
      margin-bottom: 16px;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"></head>
<body class="bg-light">
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
      <h2 class="sidebar-header mb-4">Fastlink</h2>
      <div class="d-flex flex-column align-items-center">
        @if (Auth::user()->role == 'superuser')
        <div class="mb-4 text-center">
          <i class="bi bi-house-door-fill fs-10"></i>
          <div class="fs-6">Dashboard</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-bookmark-fill fs-10"></i>
          <div class="fs-6">Shortcut</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-person-lines-fill fs-10"></i>
          <div class="fs-6">Customer</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-map-fill fs-10"></i>
          <div class="fs-6">Coverage</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-file-earmark-dollar-fill fs-10"></i>
          <div class="fs-6">Bill</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-credit-card-fill fs-10"></i>
          <div class="fs-6">Finance</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-geo-alt-fill fs-10"></i>
          <div class="fs-6">Maps</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-question-circle-fill fs-10"></i>
          <div class="fs-6">Help</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-plug-fill fs-10"></i>
          <div class="fs-6">Integration</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-folder-fill fs-10"></i>
          <div class="fs-6">Master</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-calendar-fill fs-10"></i>
          <div class="fs-6">Schedule</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-gear-fill fs-10"></i>
          <div class="fs-6">Setting</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-person-check-fill fs-10"></i>
          <div class="fs-6">User</div>
        </div>
        <div class="mb-4 text-center">
          <a href="{{ url('role-management') }}" class="text-white text-decoration-none">
          <i class="bi bi-person-bounding-box fs-10"></i>
          <div class="fs-6">Role Management</div>
        </a>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-file-earmark-text-fill fs-10"></i>
          <div class="fs-6">Logs</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-file-earmark-diff-fill fs-10"></i>
          <div class="fs-6">Changelog</div>
        </div>
        @endif
        @if (Auth::user()->role == 'administrator')
        <div class="mb-4 text-center">
          <i class="bi bi-house-door-fill fs-10"></i>
          <div class="fs-6">Dashboard</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-bookmark-fill fs-10"></i>
          <div class="fs-6">Shortcut</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-person-lines-fill fs-10"></i>
          <div class="fs-6">Customer</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-map-fill fs-10"></i>
          <div class="fs-6">Coverage</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-file-earmark-dollar-fill fs-10"></i>
          <div class="fs-6">Bill</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-credit-card-fill fs-10"></i>
          <div class="fs-6">Finance</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-geo-alt-fill fs-10"></i>
          <div class="fs-6">Maps</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-question-circle-fill fs-10"></i>
          <div class="fs-6">Help</div>
        </div>
        @endif
        @if (Auth::user()->role == 'teknisi')
        <div class="mb-4 text-center">
          <i class="bi bi-question-circle-fill fs-10"></i>
          <div class="fs-6">Help</div>
        </div>
        <div class="mb-4 text-center">
          <i class="bi bi-geo-alt-fill fs-10"></i>
          <div class="fs-6">Maps</div>
        </div>
        @endif
      </div>
    </div>
    <!-- Main Content -->
    <div class="main-content flex-grow-1 p-4">
      <header>
        <div class="d-flex justify-content-between">
          <div>
            <h1>Dashboard</h1>
            <p>Tuesday, 10-12-2024 - 13:19:16</p>
            <div>
            </div>
            <h3>Halo, {{ Auth::user()->name }}</h3>
          </div>
          <button onclick="window.location.href='/logout'" class="btn btn-danger">Logout</button>
        </div>
      </header>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
