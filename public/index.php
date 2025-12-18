<?php
//session_start();
//require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap.php';

use App\Controllers\HomeController;

$controller = new HomeController();

$page = $_GET["page"] ?? 'index';

switch($page){
    case 'register':
        $controller->register();
    break;
    case 'activate':
        $controller->activate();
    break;
    case 'login':
        $controller->login();
    break;
    case 'logout':
        $controller->logout();
    break;
    default:
    $controller->index();
}