<?php

class  User extends Db_object
{
    protected static $db_table="users";
    protected static $db_table_fields=array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $firstName;
    public $lastName;



    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM ".self::$db_table." WHERE username='{$username}' AND password = '{$password}' LIMIT 1";
//        $sql .=";
//        $sql .="AND password = '{$password}'";
//        $sql .="LIMIT 1";
        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }




}

//010 Logion creation download

?>