<?php
require_once '../../includes/dbh.inc.php';
require_once '../../includes/config.session.inc.php';
require_once '../../includes/AdminAuth.php';
require_once '../../includes/view.php';
require_once '../../includes/model.php';
require_once '../../includes/control.php';
$view = new view();
$admin = new AdminAuth();
$admin->check();
$db = new database();
$conn = $db->connection();
$controller = new controller($conn);
$fetching_testing = $controller->fetch_records('testing');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      padding: 20px;
      background-color: #f8f9fa;
    }

    .section-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 25px;
    }

    .btn-view {
      background-color: #0d6efd;
      color: #fff;
    }

    .btn-view:hover {
      background-color: #0b5ed7;
    }

    .btn-submit {
      background-color: #198754;
      color: #fff;
    }

    .btn-submit:hover {
      background-color: #157347;
    }
  </style>
</head>

<body>

  <div class="container-fluid">

    <!-- TESTING FORM -->
    <div class="section-box">
      <h3 class="mb-3">Add Test Record</h3>
      <form action="../../includes/test.inc.php" method="POST">
        <div class="row g-3">

          <div class="col-md-4">
            <label class="form-label">Product</label>
            <input type="text" class="form-control" placeholder="Enter product name" name="name">
          </div>

          <div class="col-md-4">
            <label class="form-label">Test Type</label>
            <select class="form-select" name="type">
              <option>Select Test Type</option>
              <option>Quality Check</option>
              <option>Performance</option>
              <option>Safety Test</option>
              <option>Durability</option>
            </select>
          </div>

          <div class="col-md-4">
            <label class="form-label">Tester</label>
            <input type="text" class="form-control" placeholder="Enter tester name" name="tester">
          </div>

          <div class="col-md-4">
            <label class="form-label">Test Date</label>
            <input type="date" class="form-control" name="date">
          </div>

          <div class="col-md-4">
            <label class="form-label">Result</label>
            <select class="form-select" name="result">
              <option>Select Result</option>
              <option>Passed</option>
              <option>Failed</option>
            </select>
          </div>

          <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-submit">Submit Test</button>
          </div>

        </div>
      </form>
      <?php $view->display_errors(); ?>
    </div>

    <!-- TESTING TABLE -->
    <div class="section-box">
      <h3 class="mb-3">Testing Records</h3>

      <table class="table table-striped table-hover align-middle">
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
          foreach ($fetching_testing as $row) {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['product']; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td><?php echo $row['tester']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td><span class="badge bg-success">Passed</span></td>
              <td><button class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#dummyModal"
                  data-name="<?php echo $row['product']; ?>" data-type="<?php echo $row['type']; ?>"
                  data-tester="<?php echo $row['tester']; ?>" data-date="<?php echo $row['date']; ?>"
                  data-result="<?php echo $row['result']; ?>">
                  View
                </button>

              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

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
          <p id="modalTester"><strong>Tester:</strong></p>
          <p id="modalDate"><strong>Date:</strong></p>
          <p id="modalResult"><strong>Result:</strong></p>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>
<script>
  var modal = document.getElementById('dummyModal');

  modal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    document.getElementById('modalName').innerHTML = "<strong>Name:</strong> " + button.getAttribute('data-name');
    document.getElementById('modalType').innerHTML = "<strong>Type:</strong> " + button.getAttribute('data-type');
    document.getElementById('modalTester').innerHTML = "<strong>Tester:</strong> " + button.getAttribute('data-tester');
    document.getElementById('modalDate').innerHTML = "<strong>Date:</strong> " + button.getAttribute('data-date');
    document.getElementById('modalResult').innerHTML = "<strong>Result:</strong> " + button.getAttribute('data-result');
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>