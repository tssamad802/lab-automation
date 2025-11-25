<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $mfg_date = $_POST['mfg_date'];

    require_once 'config.session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();
    $controller  = new controller($conn);

    $errors = [];

    if ($controller->is_empty_inputs([$name, $type, $mfg_date])) {
        $errors[] = "All fields are required.";
    }

    if ($controller->is_only_char([$name, $type])) {
        $errors[] = "Letters only.";
    }

    if ($controller->is_date_invalid($mfg_date)) {
        $errors[] = "The date cannot be in the future.";
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin/pages/products.php');
        exit;
    }

    $result = $controller->insert_record('products', ['name' => $name, 'type' => $type, 'mfg_date' => $mfg_date]);
    if ($result) {
        header("Location: ../admin/pages/products.php");
    } 
} else {
    header("Location: ../admin/pages/products.php");
    exit;
}
?>