<?php
  include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class User {
  
  public static function Get($id=null)
  {
    $sql = " SELECT * FROM 2014Fall_User WHERE id='1'";
    if($id){
      $sql .= " WHERE id=$id ";
      $ret = FetchAll($sql);
      return $ret[0];
    }else{
      return FetchAll($sql);     
    }
  }
}

  