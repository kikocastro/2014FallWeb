<?php
  include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class User {
  
  public static function Get($id)
  {
    $sql = " SELECT * FROM 2014Fall_User";
    
      // $sql .= " WHERE id=$id ";
			$sql .= " WHERE id=1 ";
      $ret = FetchAll($sql);
      return $ret[0];
    
  }
}
