<?php

class Photo extends Db_object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('photo_id', 'title', 'description', 'filename', 'size', 'type');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $size;
    public $type;

    public $tmp_path;
    public $upload_directory = "images";
    public $custom_errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize_directory",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload",
    );


    //This is passing $_file['uploaded_file'] as an argument
    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['temp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }


    public function save(){
        if($this->photo_id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
        }
        if(empty($this->filename) || empty($this->tmp_path)){
            $this->errors[] = "The file was not available";
            return false;
        }
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;
        if(file_exists($target_path)){
            $this->errors[] = "This file {$this->filename} is already exists";
            return false;
        }
        if(move_uploaded_file($this->tmp_path,$target_path)){
            if($this->create()){
                unset($this->tmp_path);
                return true;
            }
        }else{
            $this->errors[] = "The file directory probably does not exists";
            return false;
        }
    }
}

?>
