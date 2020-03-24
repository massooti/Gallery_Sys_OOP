<?php

class  User
{
    protected static $db_table="users";
    protected static $db_table_fields=array('username','password','first_name','las_name');
    public $id;
    public $username;
    public $password;
    public $firstName;
    public $lastName;

    public static function find_all_users()
    {
        global $database;
        return self::find_this_query("SELECT * FROM users");

    }

    public static function find_user_by_id($user_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id=$user_id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
//        return empty($the_result_array) ;
        return $found_user;
    }

    public static function find_this_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);
//        var_dump($result_set);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instatiation($row);
        }
        return $the_object_array;
    }

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM users WHERE username='{$username}' AND password = '{$password}' LIMIT 1";
//        $sql .=";
//        $sql .="AND password = '{$password}'";
//        $sql .="LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function instatiation($the_record)
    {

        $the_object = new self;
        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties(){
        $properties=array();
      foreach (self::$db_table_fields as $value=>$db_field){
          if(property_exists($this,$db_field)){
              $properties[$db_field]=$this->$db_field;
          }
      }
        return $properties;
    }

    //abstraction & improvment
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $database;
        $properties =$this->properties();
        $sql = "INSERT INTO " .self::$db_table. "(" .implode("," ,array_keys($properties)).")";
        $sql .= "VALUES ('". implode("','" ,array_values($properties))."')";


        if ($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else
            return false;
    }

    public function update()
    {
        global $database;
        $sql = "UPDATE " .self::$db_table. " SET ";
        $sql .= "username= '" . $database->escape_string($this->username) . "' ,";
        $sql .= "password= '" . $database->escape_string($this->password) . "' ,";
        $sql .= "first_name= '" . $database->escape_string($this->firstName) . "' ,";
        $sql .= "last_name= '" . $database->escape_string($this->lastName) . "' ";
        $sql .= " WHERE id= " . $database->escape_string($this->id);
//        $sql = "UPDATE users SET username='$database->escape_string($this->username)',password='$database->escape_string($this->password)',first_name='$database->escape_string($this->firstName)',last_name='$database->escape_string($this->lastName)' WHERE id= '$database->escape_string($this->id)'";

        $database->query($sql);
//        return "1";
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete()
    {
        global $database;
//        $sql="DELETE FROM users WHERE id=$id";
        $sql = "DELETE FROM users ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
}

//010 Logion creation download

?>