<?php

session_start();

require_once 'autoload.php';
require_once 'common.php';

use App\Controllers\Controller;
use App\Models\Purchases;
use database\Sql;

const ITEMS_PER_PAGE = 20;
const PAGINATION_IN_ONE_SIDE = 3;

$controller = new Controller(new Purchases(Sql::getInstance()));

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$allowedActions = ['create', 'store', 'destroy', 'edit', 'update', 'index'];
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($page == 'index') {
    $title = 'Вітаю на Med-test. До Вашої уваги список покупок.';
    $controller->index();
} elseif ($page == 'purchases' && in_array($action, $allowedActions)) {
    $title = 'Можете додавати або редагувати закупку.';
    $controller->$action();
} else {
    $title = 'Сторінка не знайдена.';
    $controller->page404();
}
