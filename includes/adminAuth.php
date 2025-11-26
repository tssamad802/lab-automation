<?php
class AdminAuth
{
    public function check_role($roles = [])
    {
        foreach ($roles as $role) {
            $id_key = $role . '_id';
            $name_key = $role . '_username';

            if (isset($_SESSION[$id_key]) && isset($_SESSION[$name_key])) {
                return true; // ek valid role mil gaya
            }
        }
        // agar koi role match nahi hua
        header("Location: http://localhost/project/form.php?NotAllowed");
        exit;
    }

    public function get_role_name($role)
    {
        $name_key = $role . '_username';

        if (isset($_SESSION[$name_key])) {
            return $_SESSION[$name_key];
        }
        return null;
    }

}
