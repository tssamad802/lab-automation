<?php
require_once 'config.session.inc.php';

class View {

    // Reusable error display method
    public function display_errors($key = 'errors') {
        if (!empty($_SESSION[$key])) {
            foreach ($_SESSION[$key] as $msg) {
                echo '<br>';
                echo "<p class='alert alert-danger'>{$msg}</p>";
            }
            unset($_SESSION[$key]);
        }
    }

     public function getSearchData() {
        if (isset($_SESSION['search_data'])) {
            $result = $_SESSION['search_data'];
            return $result;
        }
        unset($_SESSION['search_data']);
    }
}
?>
