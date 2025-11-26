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
    $check_manager = $controller->check_record('users', ['username' => $name, 'pwd' => $pwd]);
    // echo '<pre>';
    // print_r($check_admin);
    // echo '</pre>';
    // exit;
    if ($check_admin) {
        $row = $check_admin[0];
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['name'];
        // $test = $_SESSION['admin_id'] . $_SESSION['admin_username'];
        // echo $test;
        // exit;
        header('Location: ../admin/index.php?admin');
        exit;
    } elseif ($check_manager[0]['role'] == 'Manager') {
        //  echo '<pre>';
        //  print_r($check_manager);
        //  echo $check_manager[0]['role'];
        //  echo '</pre>';
        $row = $check_manager[0];
        $_SESSION['manager_id'] = $row['user_id'];
        $_SESSION['manager_username'] = $row['username'];
        // $test = $_SESSION['manager_id'] . $_SESSION['manager_username'];
        // echo $test;
        // exit;
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