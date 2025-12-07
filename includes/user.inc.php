<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['userid'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $pwd = $_POST['pwd'];

    require_once 'config.session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();
    $controller = new controller($conn);

    $user_id = 5000; 
    $user_id1 = rand(1, $user_id);

    $errors = [];

    if ($controller->is_empty_inputs([$username, $fullname, $role, $pwd])) {
        $errors[] = "All fields are required.";
    }

    if ($controller->is_only_char([$fullname, $role])) {
        $errors[] = "Letters only.";
    }

    if ($controller->check_record('users', ['username' => $username, 'pwd' => $pwd])) {
        $errors[] = "Record already exists.";
    }
    // $result = $controller->check_record('users', ['username' => $username, 'pwd' => $pwd]);
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    // exit;
    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../admin/pages/users.php');
        exit;
    }

    $result = $controller->insert_record('users', ['user_id' => $user_id1, 'username' => $username, 'fullname' => $fullname, 'role' => $role, 'pwd' => $pwd]);
    if ($result) {
        header("Location: ../admin/pages/users.php");
        exit;
    }
} else {
    header("Location: ../admin/pages/users.php");
}
?>