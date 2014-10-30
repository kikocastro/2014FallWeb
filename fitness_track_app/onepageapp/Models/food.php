<?php
	include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Food {
	
public static function BlankModel()
	{
		return array('name' => null, 'calories' => null, 'fat' => null, 'carbs' => null, 'protein' => null, 'dateTime' =>date(strtotime('today')));
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
	
	public static function Save($id=null)
	{
		if($id){
			$sql = "UPDATE 2014Fall_Food SET";
		}else{
			$sql = "INSERT Into 2014Fall_Food ()";
		}
		$conn = GetConnection();
		$conn->query($sql);
	}
}

