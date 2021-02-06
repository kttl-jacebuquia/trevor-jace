<?php

function dcchub_uninstall(){
    //remove settings
    $option_name = 'dcchub_option_name';    
    delete_option($option_name);
}

register_uninstall_hook(__FILE__, 'dcchub_uninstall');

?>