<?php
require_once 'database/connect.php';
require_once 'config.php';
require_once 'database/query.php';
require_once 'database/function.php';

if (isset($_GET['module']) && is_string($_GET['module'])) {
    $module = trim($_GET['module']);
} else {
    $module = 'pages';
}

if (isset($_GET['action']) && is_string($_GET['action'])) {
    $action = trim($_GET['action']);
} else {
    $action = 'lists';
}



$path = 'modules/' . $module . '/' . $action . '.php';
if (file_exists($path)) {
    require_once $path;
}
?>
