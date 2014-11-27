<?php
include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Food {
	
	public static function Blank()
	{
		return array('id'=>null, 'name' => null, 'calories' => null, 'fat' => null, 'carbs' => null, 'protein' => null, 'dateTime' => date('Y-m-d H:i:s'));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Food
		";
		if($id){
			$sql .= " WHERE id=$id ";
			$ret = FetchAll($sql);

			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
	}
	
	static public function Save(&$row)
	{

		$conn = GetConnection();
		$row2 = escape_all($row, $conn);
		$row2['dateTime'] = date( 'Y-m-d H:i:s', strtotime( $row2['dateTime'] ) );

		if (!empty($row['id'])) {

			$sql = "Update 2014Fall_Food
			Set name='$row2[name]', calories='$row2[calories]',
			fat='$row2[fat]', protein='$row2[protein]', carbs='$row2[carbs]', dateTime='$row2[dateTime]'
			WHERE id = $row2[id]
			";
		}else{
			$sql = "INSERT INTO 2014Fall_Food
			(name, calories, fat, carbs, protein, dateTime, created_at)
			VALUES ('$row2[name]', '$row2[calories]', '$row2[fat]', '$row2[carbs]', '$row2[protein]', '$row2[dateTime]', Now()) ";        
		}

		$results = $conn->query($sql);
		$error = $conn->error;

		if(!$error && empty($row['id'])){
			$row['id'] = $conn->insert_id;
		}

		$conn->close();

		return $error ? array ('sql error' => $error) : false;
	}

	static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM 2014Fall_Food WHERE id = $id";
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();

		return $error ? array ('sql error' => $error) : false;
	}

	static public function Validate($row)
	{
		$errors = array();

		if(empty($row['name'])) $errors['name'] = "is required";
		if(empty($row['calories'])) $errors['calories'] = "is required";
		if(empty($row['carbs'])) $errors['carbs'] = "is required";
		
		return count($errors) > 0 ? $errors : false ;
	}
}

