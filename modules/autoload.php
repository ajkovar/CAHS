<?php
function __autoload($class_name) {
    //require_once './modules/' . $class_name . '.php';
    //class directories
        $includeDirectories = array(
            './modules/',
            './modules/objects/',
        );
       
        //for each directory
        foreach($includeDirectories as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else
                return;
            }           
        }
}
 
?>
