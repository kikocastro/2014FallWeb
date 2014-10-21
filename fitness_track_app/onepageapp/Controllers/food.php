<?php
ini_set('display_errors', 1);

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;

switch ($action . '_' . $method){
    case 'create_GET':
        include __DIR__ . '/../Views/food/edit.php';
      break;
    case 'create_POST':
      
      break;
    case 'update_GET':
        include __DIR__ . '/../Views/food/edit.php';
      break;
    case 'update_POST':
      
      break;
    case 'delete_GET':
      
      break;
    case 'delete_POST':
      
      break;
    case 'index_GET':
    default:
        include __DIR__ . '/../Views/food/index.php';
      break;
  
}


