<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $search = $_POST['search'];

    require_once 'config.session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();
    $controller = new controller($conn);

    $errors = [];

    if ($controller->is_empty_inputs([$search])) {
        $errors[] = "Search field are required.";
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin/pages/reports.php');
        exit;
    }

    $result = $controller->search($search);
    if ($result) {
        $_SESSION['search_data'] = $result;
        header("Location: ../admin/pages/reports.php");
        exit;
    }
} else {
    header("Location: ../admin/pages/reports.php");
    exit;
}
?>