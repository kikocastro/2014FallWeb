<?
include_once __DIR__ . '/../includes/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view   = null;

$view = 'login/index.php';  

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
