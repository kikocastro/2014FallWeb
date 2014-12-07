<?php
include_once __DIR__ . '/../includes/_all.php';
/**
 * 
 */
class Measure {
  
  public static function Blank()
  {
    return array('id'=>null, 'weight' => null, 'biceps' => null, 'waist' => null, 'hips' => null, 'chest' => null, 'user_id' => null);
  }
  
  public static function Get($id=null)
  {
    $sql = "  SELECT E.*, T.name as T_name
    FROM 2014Fall_Measure E
    Join 2014Fall_User T ON E.user_id = T.id 
    ";
    if($id){
      $sql .= " WHERE E.id=$id ";
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

      $sql = "Update 2014Fall_Measure
      Set weight='$row2[weight]', biceps='$row2[biceps]',
      waist='$row2[waist]', hips='$row2[hips]', chest='$row2[chest]', user_id='$row2[user_id]'
      WHERE id = $row2[id]
      ";
    }else{
      $sql = "INSERT INTO 2014Fall_Measure
      (weight, biceps, waist, chest, hips, created_at, user_id)
      VALUES ('$row2[weight]', '$row2[biceps]', '$row2[waist]', '$row2[chest]', '$row2[hips]', Now(), '$row2[user_id]' ) 
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
    $sql = "DELETE FROM 2014Fall_Measure WHERE id = $id";
    $results = $conn->query($sql);
    $error = $conn->error;
    $conn->close();

    return $error ? array ('sql error' => $error) : false;
  }

  static public function Validate($row)
  {
    $errors = array();

   
    
    return count($errors) > 0 ? $errors : false ;
  }
}

