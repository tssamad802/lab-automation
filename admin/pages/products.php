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
$fetching_products = $controller->fetch_records('products');
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
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Products List</h3>
      <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
    </div>

    <!-- Full Screen Modal (REAL FULLSCREEN) -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

          <!-- Header (Close Button Only) -->
          <div class="modal-header">
            <h5 class="modal-title">Add New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- FULL PAGE BODY -->
          <div class="modal-body">

            <div class="container mt-4">

              <div class="row justify-content-center">
                <div class="col-md-6">

                  <form action="../../includes/products.inc.php" method="POST">

                    <div class="mb-3">
                      <label class="form-label">Product Name</label>
                      <input type="text" class="form-control" placeholder="Enter product name" name="name">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Product Type</label>
                      <input type="text" class="form-control" placeholder="Enter product type" name="type">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Manufacturing Date</label>
                      <input type="date" class="form-control" name="mfg_date">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                      <button class="btn btn-primary w-48">Add Product</button>
                    </div>
                  </form>
                  <?php $view->display_errors(); ?>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="table-container">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
          <th>Manufacturing Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($fetching_products as $row) {
          ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['mfg_date'] ?></td>
            <td>
              <a href="./testing.php"><button class="btn btn-sm btn-view">Test</button></a>
              <button class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#dummyModal"
                data-name="<?php echo $row['name']; ?>" data-type="<?php echo $row['type']; ?>"
                data-date="<?php echo $row['mfg_date']; ?>">View</button>
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
          <p id="modalDate"><strong>Manufactured:</strong></p>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</body>

</html>
<script>
  var modal = document.getElementById('dummyModal');

  modal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    document.getElementById('modalName').innerHTML = "<strong>Name:</strong> " + button.getAttribute('data-name');
    document.getElementById('modalType').innerHTML = "<strong>Type:</strong> " + button.getAttribute('data-type');
    document.getElementById('modalDate').innerHTML = "<strong>Manufactured:</strong> " + button.getAttribute('data-date');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>