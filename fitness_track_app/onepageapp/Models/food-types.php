<?php
include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Food {
  
  public static function Blank()
  {
    return array('id'=>null,'name'=>null);
  }
  
  public static function Get($id=null)
  {
    $sql = "  SELECT * FROM 2014Fall_Food_Type
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

      $sql = "Update 2014Fall_Food_Type
              Set Name='$row2[name]'
            WHERE id = $row2[id]
            ";
      }else{
        $sql = "INSERT INTO 2014Fall_Food_Type
            (Name, created_at)
            VALUES ('$row2[name]', Now() ) ";       
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
    $sql = "DELETE FROM 2014Fall_Food_Types WHERE id = $id";
    $results = $conn->query($sql);
    $error = $conn->error;
    $conn->close();

    return $error ? array ('sql error' => $error) : false;
  }

     static public function Validate($row)
    {
      $errors = array();
      if(strlen($row['name']) > 40) $errors['name'] = "must be less than 40 charecters";
      if(empty($row['name'])) $errors['name'] = "is required";
      
      return count($errors) > 0 ? $errors : false ;
    }
}

