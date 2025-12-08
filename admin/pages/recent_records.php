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
$recent_records = $controller->get_recent_records('testing');
    $passed = $controller->countByResult('Passed');
    $failed = $controller->countByResult('Failed');
    $total = $controller->countRows('testing');

    // Total section will fill the remaining part
    $passedPercent = ($total > 0) ? ($passed / $total) * 100 : 0;
    $failedPercent = ($total > 0) ? ($failed / $total) * 100 : 0;
    $totalPercent = 100 - ($passedPercent + $failedPercent);

    // Ranges for gradient
    $range1 = $passedPercent;
    $range2 = $passedPercent + $failedPercent;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        h3 {
            margin-bottom: 20px;
            display: inline-block;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-view {
            background-color: #0d6efd;
            color: #fff;
        }

        .btn-view:hover {
            background-color: #0b5ed7;
        }

        .btn-add {
            background-color: #198754;
            color: #fff;
            margin-bottom: 15px;
        }

        .btn-add:hover {
            background-color: #157347;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- TESTING TABLE -->
        <div class="section-box">
            <h3 class="mb-3">Recent Records</h3>

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Test ID</th>
                        <th>Product</th>
                        <th>Test Type</th>
                        <th>Date</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($recent_records) {
                        foreach ($recent_records as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><span class="badge bg-success"><?php echo $row['result']; ?></span></td>
                                <td><button class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#dummyModal"
                                        data-name="<?php echo $row['product']; ?>" data-type="<?php echo $row['type']; ?>"
                                        data-date="<?php echo $row['date']; ?>"
                                        data-result="<?php echo $row['result']; ?>">view</button></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<td>No Records Found</td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Dummy Data Modal -->
        <div class="modal fade" id="dummyModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Product Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p id="modalName"><strong>Name:</strong></p>
                        <p id="modalType"><strong>Type:</strong></p>
                        <p id="modalDate"><strong>Date:</strong></p>
                        <p id="modalResult"><strong>Result:</strong></p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

            <div class="card p-4 mb-4"
        style="max-width:350px; margin:auto; text-align:center; background:#fff; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.1);">
        <h5 class="mb-4">Testing Statistics</h5>

        <!-- Circular Chart -->
        <div style="
      width:200px;
      height:200px;
      margin:auto;
      border-radius:50%;
      background: conic-gradient(
        #198754 0% <?php echo $range1; ?>%,                     /* Passed */
        #dc3545 <?php echo $range1; ?>% <?php echo $range2; ?>%, /* Failed */
        #0dcaf0 <?php echo $range2; ?>% 100%                     /* Total */
      );
      display:flex;
      align-items:center;
      justify-content:center;
      position:relative;
    ">

            <!-- Inner circle -->
            <div style="
        width:120px;
        height:120px;
        background:#f8f9fa;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:600;
        font-size:1.2rem;
        color:#212529;
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
      ">
                <?php echo $total; ?>
            </div>
        </div>

        <!-- Legend -->
        <div class="mt-4 text-start">
            <div class="mb-2"><span class="badge bg-success me-2">&nbsp;</span> Passed: <?php echo $passed; ?></div>
            <div class="mb-2"><span class="badge bg-danger me-2">&nbsp;</span> Failed: <?php echo $failed; ?></div>
            <div><span class="badge bg-info me-2">&nbsp;</span> Total: <?php echo $total; ?></div>
        </div>
    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>


</body>
<script>
    var modal = document.getElementById('dummyModal');

    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        document.getElementById('modalName').innerHTML = "<strong>Name:</strong> " + button.getAttribute('data-name');
        document.getElementById('modalType').innerHTML = "<strong>Type:</strong> " + button.getAttribute('data-type');
        document.getElementById('modalDate').innerHTML = "<strong>Date:</strong> " + button.getAttribute('data-date');
        document.getElementById('modalResult').innerHTML = "<strong>Result:</strong> " + button.getAttribute('data-result');
    });
</script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>