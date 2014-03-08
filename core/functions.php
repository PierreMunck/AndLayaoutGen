<?php


function nibsa_file_exists($file,$include_path = TRUE) {
    if (file_exists($file)) {
        return TRUE;
    }
    if($include_path){
        foreach(explode(PATH_SEPARATOR, get_include_path()) as $dir) {
            $ultimodir = substr($dir, -1);
            if ($ultimodir != DIRECTORY_SEPARATOR) {
                $dir.= DIRECTORY_SEPARATOR;
            }
            if (file_exists($dir.$file)) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

function splitByCaps($string){
    return trim(preg_replace('/([a-z0-9])?([A-Z])/','$1 $2',$string));
}

?>