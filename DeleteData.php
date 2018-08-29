<?php

require_once 'autoload/Autoload.php';
$keys = array_keys($_GET);
$key = array_shift($keys);

switch ($key) {
    case 'rid':
        $res = new result();
        $res->delete();
        break;

}


//unset($_SESSION['msg']);
