<?php
class Db_object{

    public static function find_all()
    {
        global $database;
        return self::find_this_query("SELECT * FROM " .self::$db_table." ");

    }

    public static function find_by_id($user_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM ".self::$db_table." WHERE id=$user_id LIMIT 1");
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

}




?>