<?
include_once __DIR__ . '/../includes/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view   = null;

switch ($action . '_' . $method) {
  case 'create_GET':
  $model = User::Blank();
  $view = "user/edit.php";
  break;
  case 'save_POST':
  $sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
  $errors = User::Validate($_REQUEST);
  if(!$errors){
    $errors = User::Save($_REQUEST);
  }

  if(!$errors){
    if($format == 'json'){
      header("Location: ?action=edit&format=json&id=$_REQUEST[id]");
    }else{
      header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
    }
    die();
  }else{
    $model = $_REQUEST;
    $view = "user/edit.php";    
  }
  break;
  case 'delete':
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Promt
  }else{

  }
  break;
  break;
  case 'edit_GET':
  $model = User::Get($_REQUEST['id']);
  $view = "user/edit.php";    
  break;
  case 'delete_GET':
  $model = User::Get($_REQUEST['id']);
  $view = "user/delete.php";    
  break;
  case 'delete_POST':
  $errors = User::Delete($_REQUEST['id']);
  if($errors){
    $model = User::Get($_REQUEST['id']);
    $view = "user/delete.php";
  }else{
    header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
    die();      
  }
  break;
  case 'index_GET':
  default:
  $model = User::Get();
  $view = 'user/index.php';   
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
