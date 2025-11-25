<?php
class AdminAuth {
    public function check() {
        if (!isset($_SESSION['admin_id']) && !isset($_SESSION['admin_username'])) {
            $url = "http://localhost/project/form.php";
            header("Location: " . $url);
            exit;
        }
    }

    public function show_admin_name() {
        if (isset($_SESSION['admin_username'])) {
            return $_SESSION['admin_username'];
        } 
        return null; 
    }
}
