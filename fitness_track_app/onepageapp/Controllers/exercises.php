<?
  include_once __DIR__ . '/../includes/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view   = null;

switch ($action . '_' . $method) {
  case 'create_GET':
    $view = "exercises/edit.php";
    break;
  case 'create_POST':
    //  Proccess input
    break;
  case 'edit_GET':
    // $model = DietControl::Get($_REQUEST['id']);
    $view = "exercises/edit.php";    
    break;
  case 'edit_POST':
    //  Proccess input
    break;
  case 'delete_GET':
    $view = "exercises/delete.php";    
    break;
  case 'delete_POST':
    //  Proccess input
    break;
  case 'index_GET':
  default:
    // $model = DietControl::Get();
    $view = 'exercises/index.php';   
    break;
}

switch ($format) {
  case 'json':
    echo json_encode($model);
    break;
  case 'plain':
    include __DIR__ . "/../Views/$view";    
    break;    
  case 'web':
  default:
    include __DIR__ . "/../Views/shared/_template.php";   
    break;
}
