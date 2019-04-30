<?php
    if(isset($_FILES["file"])) {
        $errors="Unssuported file extension!!!";
        $file_name = $_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = $_FILES["file"]["type"];

        $allowedExtensions = array("jpg","jpeg","png");
        $extension = end(explode(".",$_FILES["file"]["name"]));
        
        if(in_array($extension,$allowedExtensions)) {
            move_uploaded_file($file_tmp,"image/".$file_name);
            echo "Success";
        } else {
            print_r($errors);
        }

    }
    
?>