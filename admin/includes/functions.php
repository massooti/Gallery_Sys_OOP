<?php
function __autoload($class){
    $class =strtolower($class);
    $the_path = " includes/{$class}.php " ;
    if(file_exists($the_path)){
        require_once ($class);
    }else{
        die(" Sorry But youre file {$class}.php was not found...");
    }
}

function redirect($location){

    header("Location  : {$location}");
}


?>