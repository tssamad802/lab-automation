<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];

    require_once 'config.session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();
    $controller  = new controller($conn);

    $errors = [];

    if ($controller->is_empty_inputs([$name, $pwd])) {
        $errors[] = "All fields are required.";
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../form.php');
        exit;
    }

    $check_admin = $controller->check_record('admin', ['name' => $name, 'pwd' => $pwd]);
    $check_user = $controller->check_record('users', ['username' => $name, 'pwd' => $pwd]);
    if ($check_admin) {
        $row = $check_admin[0]; 
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['name'];
        header('Location: ../admin/index.php?admin');
        exit;
    } elseif ($check_user) {
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        header('Location: ../admin/index.php?admin');
        exit;
    } 
    else {
        $_SESSION['errors'] = ['Invalid Information'];
        header('Location: ../form.php');
        exit;
    }
} else {
    header('Location: ../form.php');
    exit;
}
?>