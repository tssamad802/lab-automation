<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $tester = $_POST['tester'];
    $date = $_POST['date'];
    $result = $_POST['result'];

    require_once 'config.session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();
    $controller = new controller($conn);

    $errors = [];

    if ($controller->is_empty_inputs([$name, $type, $tester, $date, $result])) {
        $errors[] = "All fields are required.";
    }

    if ($controller->is_only_char([$name, $type, $tester, $result])) {
        $errors[] = "Letters only.";
    }

    if ($controller->is_date_invalid($date)) {
        $errors[] = "The date cannot be in the future.";
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin/pages/testing.php');
        exit;
    }

    $result = $controller->insert_record('testing', ['product' => $name, 'type' => $type, 'tester' => $tester, 'date' => $date, 'result' => $result]);
    if ($result) {
        header("Location: ../admin/pages/testing.php");
    }
} else {
    header("Location: ../admin/pages/testing.php");
    exit;
}
?>