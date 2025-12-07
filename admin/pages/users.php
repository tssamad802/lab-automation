<?php
require_once '../../includes/dbh.inc.php';
require_once '../../includes/config.session.inc.php';
require_once '../../includes/AdminAuth.php';
require_once '../../includes/view.php';
require_once '../../includes/model.php';
require_once '../../includes/control.php';
$view = new view();
$admin = new AdminAuth();
$admin->check_role(['admin', 'manager', 'viewer', 'tester']);
$db = new database();
$conn = $db->connection();
$controller = new controller($conn);
$fetching_users = $controller->fetch_records('users');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>User Management</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .page-title {
            font-size: 26px;
            font-weight: 600;
        }

        .table-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <!-- Title + Add User Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="page-title">User Management</h2>
            <?php if($admin->can_access(['admin','manager','tester'])): ?>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</a>
            <?php endif; ?>
        </div>

        <!-- Full Screen Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Fullscreen Body -->
                    <div class="modal-body">

                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-md-6">

                                    <form action="../../includes/user.inc.php" method="POST">

                                        <input type="hidden" name="userid">

                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" placeholder="Enter username"
                                                name="username">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="Enter full name"
                                                name="fullname">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Role</label>
                                            <select class="form-select" name="role">
                                                <option>Select Role</option>
                                                <option>Admin</option>
                                                <option>Tester</option>
                                                <option>Manager</option>
                                                <option>Viewer</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" placeholder="Enter password"
                                                name="pwd">
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <button class="btn btn-secondary w-48"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary w-48">Add User</button>
                                        </div>
                                        <?php $view->display_errors(); ?>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Users Table -->
        <div class="table-container mt-3">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Created</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (!empty($fetching_users)) {
                        foreach ($fetching_users as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['role'] ?></td>
                                <td><?php echo $row['created'] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No results found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>