<?php
require_once 'config.session.inc.php';
session_unset();
session_destroy();
header('Location: ../form.php');
exit;
?>