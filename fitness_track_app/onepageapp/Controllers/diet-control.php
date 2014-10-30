<?
	include_once __DIR__ . '/../includes/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view 	= null;

switch ($action . '_' . $method) {
	case 'create_GET':
		$view = "diet-control/edit.php";
		$model = Food::BlankModel();
		break;
	case 'save_POST':
		// Validate
		
		if(isset($_REQUEST['id'])) {
			//update
			Food::Save($_REQUEST);
		} else {
			//create
			Food::Save($_REQUEST);
		}
		//if error
		// 	display error msg
		//	redisplay form
		//else
		//	display success msg
		//	display list including saved food
		break;
	case 'edit_GET':
		$model = Food::Get($_REQUEST['id']);
		$view = "diet-control/edit.php";		
		break;
	case 'delete_GET':
		$view = "diet-control/delete.php";		
		break;
	case 'delete_POST':
		//	Proccess input
		break;
	case 'index_GET':
	default:
		$model = Food::Get();
		$view = 'diet-control/index.php';		
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
