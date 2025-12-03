<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/config.session.inc.php';
require_once '../includes/AdminAuth.php';
require_once '../includes/view.php';
require_once '../includes/model.php';
require_once '../includes/control.php';
$view = new view();
$admin = new AdminAuth();
$admin->check_role(['admin', 'manager', 'viewer', 'tester']);
$db = new database();
$conn = $db->connection();
$controller = new controller($conn);

?>
<!-- layout.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel Layout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      overflow-x: hidden;
      background-color: #f8f9fa;
    }

    .sidebar {
      min-width: 220px;
      max-width: 220px;
      background-color: #343a40;
      color: #fff;
      height: auto;
    }

    .sidebar .nav-link {
      color: #fff;
      margin: 5px 0;
      font-weight: 500;
    }

    .sidebar .nav-link:hover {
      background-color: #495057;
      border-radius: 5px;
    }

    .topbar {
      height: 60px;
      background-color: #fff;
      border-bottom: 1px solid #dee2e6;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .topbar .username {
      font-weight: 600;
      margin-right: 10px;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
    }

    .card-summary {
      border-radius: 10px;
      text-align: center;
      padding: 20px;
      color: #fff;
      font-weight: 500;
    }

    .bg-products {
      background-color: #0d6efd;
    }

    .bg-test-passed {
      background-color: #198754;
    }

    .bg-test-failed {
      background-color: #dc3545;
    }

    .bg-total-tests {
      background-color: #ffc107;
      color: #212529;
    }

    iframe {
      border: none;
      width: 100%;
      height: calc(100vh - 200px);
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <ul class="nav nav-pills flex-column">
      <li class="nav-item"><a class="nav-link" href="./pages/products.php" target="contentFrame">Products</a></li>
      <li class="nav-item"><a class="nav-link" href="./pages/testing.php" target="contentFrame">Testing</a></li>
      <li class="nav-item"><a class="nav-link" href="./pages/reports.php" target="contentFrame">Reports</a></li>
      <li class="nav-item"><a class="nav-link" href="./pages/users.php" target="contentFrame">Users</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="topbar d-flex justify-content-end align-items-center mb-4">
      <span class="username"><?php echo $admin->get_role_name('admin'); ?></span>
      <span class="username"><?php echo $admin->get_role_name('manager'); ?></span>
      <span class="username"><?php echo $admin->get_role_name('viewer'); ?></span>
      <span class="username"><?php echo $admin->get_role_name('tester'); ?></span>
      <a href="../includes/logout.php"><button class="btn btn-outline-danger btn-sm">Logout</button></a>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card-summary bg-products">
          <h5>Total Products</h5>
          <h3><?php echo $controller->countRows('products'); ?></h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-summary bg-test-passed">
          <h5>Test Passed</h5>
          <h3><?php echo $controller->countByResult('Passed'); ?></h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-summary bg-test-failed">
          <h5>Test Failed</h5>
          <h3><?php echo $controller->countByResult('Failed'); ?></h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-summary bg-total-tests">
          <h5>Total Tests</h5>
          <h3><?php echo $controller->countRows('testing'); ?></h3>
        </div>
      </div>
    </div>

    <!-- Single Dynamic Content iframe -->
    <iframe src="./pages/products.php" name="contentFrame"></iframe>
  </div>
</body>

</html>