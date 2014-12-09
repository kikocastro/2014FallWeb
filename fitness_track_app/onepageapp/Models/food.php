<?php
include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Food {
	
	public static function Blank()
	{
		return array('id'=>null, 'name' => null, 'calories' => null, 'fat' => null, 'carbs' => null, 'protein' => null, 'dateTime' => date('Y-m-d H:i:s'), 'foodtype_id' => null);
	}	
  
	public static function QuickAdd($data)
	{
		return array('id'=>null, 'name' => $data['name'], 'calories' => $data['calories'], 'fat' => $data['fat'], 'carbs' => $data['carbs'], 'protein' => $data['protein'], 'dateTime' => date('Y-m-d H:i:s'), 'foodtype_id' => null);
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT E.*, T.name as T_name
		FROM 2014Fall_Food E
		Join 2014Fall_Food_Type T ON E.foodtype_id = T.id 
		";
		if($id){
			$sql .= " WHERE E.id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
	}
	
	public static function Search($query)
	{
		$sql = "	SELECT E.*, T.name as T_name
		FROM 2014Fall_Food E
		Join 2014Fall_Food_Type T ON E.foodtype_id = T.id 
		WHERE E.name LIKE '%$query%'
		";
		
		return FetchAll($sql);			
	}
	
	static public function Save(&$row)
	{

		$conn = GetConnection();
		$row2 = escape_all($row, $conn);
		$row2['dateTime'] = date( 'Y-m-d H:i:s', strtotime( $row2['dateTime'] ) );

		if (!empty($row['id'])) {

			$sql = "Update 2014Fall_Food
			Set name='$row2[name]', calories='$row2[calories]',
			fat='$row2[fat]', protein='$row2[protein]', carbs='$row2[carbs]', dateTime='$row2[dateTime]', foodtype_id='$row2[foodtype_id]'
			WHERE id = $row2[id]
			";
		}else{
			$sql = "INSERT INTO 2014Fall_Food
			(name, calories, fat, carbs, protein, dateTime, created_at, foodtype_id)
			VALUES ('$row2[name]', '$row2[calories]', '$row2[fat]', '$row2[carbs]', '$row2[protein]', '$row2[dateTime]', Now(), '$row2[foodtype_id]' ) 
			";        
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

