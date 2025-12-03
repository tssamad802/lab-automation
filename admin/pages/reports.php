<?php
require_once '../../includes/config.session.inc.php';
require_once '../../includes/AdminAuth.php';
require_once '../../includes/view.php';
$admin = new AdminAuth();
$admin->check_role(['admin', 'manager', 'viewer', 'tester']);
$view = new view();
$records = $view->getSearchData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

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

        .search-box {
            max-width: 350px;
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

        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="page-title m-0">Reports</h2>

            <form action="../../includes/report.inc.php" method="POST" class="d-flex gap-2"
                style="max-width: 350px; width: 100%;">
                <input type="text" name="search" class="form-control" placeholder="Search report...">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
        <?php $view->display_errors(); ?>



        <!-- Reports Table -->
        <div class="table-container mt-3">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Test ID</th>
                        <th>Product</th>
                        <th>Test Type</th>
                        <th>Tester</th>
                        <th>Date</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (!empty($records)) { 
                    foreach ($records as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['product'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['tester'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td class="text-danger fw-bold"><?php echo $row['result'] ?></td>
                        <td><button class="btn btn-sm btn-primary">View</button></td>
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