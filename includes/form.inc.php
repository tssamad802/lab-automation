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
    $controller = new controller($conn);

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
    //  echo '<pre>';
    // print_r($check_admin);
    // echo '</pre>';
    // exit;
    $user = $controller->check_record('users', ['username' => $name, 'pwd' => $pwd]);
    // echo '<pre>';
    // print_r($check_admin);
    // echo '</pre>';
    // exit;
    if ($check_admin) {
        $row = $check_admin[0];
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['name'];
        header('Location: ../admin/index.php?admin');
        exit;
    } elseif (!empty($user)) {
        $row = $user[0];
        $role = $row['role']; // Manager, Viewer, Tester

        $_SESSION[strtolower($role) . '_id'] = $row['user_id'];
        $_SESSION[strtolower($role) . '_username'] = $row['username'];
        header('Location: ../admin/index.php?admin');
        exit;
    } else {
        $_SESSION['errors'] = ['Invalid Information'];
        header('Location: ../form.php');
        exit;
    }
} else {
    header('Location: ../form.php');
    exit;
}
?>