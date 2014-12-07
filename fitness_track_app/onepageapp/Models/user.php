<?php
include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class User {
  
  public static function Blank()
  {
    return array('id'=>null, 'first_name' => null, 'last_name' => null, 'birthdate' => null);
  }
  
  public static function Get($id=null)
  {
    $sql = "  SELECT * FROM 2014Fall_User
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

    if (!empty($row['id'])) {

      $sql = "Update 2014Fall_User
      Set first_name='$row2[first_name]',last_name='$row2[last_name]', birthdate='$row2[birthdate]'
      WHERE id = $row2[id]
      ";
    }else{
      $sql = "INSERT INTO 2014Fall_User
      (first_name, last_name, weight, birthdate)
      VALUES ('$row2[first_name]', '$row2[last_name]', '$row2[birthdate]') 
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
    $sql = "DELETE FROM 2014Fall_User WHERE id = $id";
    $results = $conn->query($sql);
    $error = $conn->error;
    $conn->close();

    return $error ? array ('sql error' => $error) : false;
  }

  static public function Validate($row)
  {
    $errors = array();

    if(empty($row['name'])) $errors['name'] = "is required";
    if(empty($row['birthdate'])) $errors['birthdate'] = "is required";
    
    return count($errors) > 0 ? $errors : false ;
  }
}

