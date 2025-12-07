<?php
class AdminAuth
{
    public function check_role($roles = [])
    {
        foreach ($roles as $role) {
            $id_key = $role . '_id';
            $name_key = $role . '_username';

            if (isset($_SESSION[$id_key]) && isset($_SESSION[$name_key])) {
                $access_role = $id_key . "<br>" . $name_key;
                return $access_role;
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
            return "<div style='color: #01000a;font-size: 1.3rem;font-weight: 600;background-color: #c9c5c5; border-radius: 0.3rem;padding-left: 10px;padding-right: 10px;box-shadow: 2px 2px 2px #9d9292;'>" . $_SESSION[$name_key] . "</div>";
        }
        return null;
    }

    public function can_access($allowd = [])
    {
        foreach ($allowd as $role) {
            if (isset($_SESSION[$role . "_username"])) {
                return true;
            }
        }
        return false;
    }

}
