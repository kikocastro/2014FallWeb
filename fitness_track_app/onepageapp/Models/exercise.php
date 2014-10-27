<?php
  include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Exercise {
  
  public static function Get($id=null)
  {
   		$conn = GetConnection();
		$sql = "	SELECT * FROM 2014Fall_Exercise";
		$results = $conn->query($sql);
		$arr = array();
		while ($rs = $results->fetch_assoc()) {
			$arr[] = $rs; // push 
		}
		return $arr;
		
		$conn->close();
		
  }
}

  