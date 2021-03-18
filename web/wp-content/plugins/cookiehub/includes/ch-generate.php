<?php

add_action('wp_footer', 'dcchub_generate_code');
add_action('wp_head', 'dcchub_generate_code_head');


function dcchub_generate_code() {
    $options = get_option( 'dcchub_option_name' );
    if($options != null){
        if($options['dcchub_api_key'] != ''){
            $detectLanguage = false;
            if(array_key_exists('dcchub_language', $options) && $options['dcchub_language'] == '1'){
                $detectLanguage = true;
            }

            $lang = get_bloginfo("language");
            if ($detectLanguage && function_exists('icl_object_id') ) {
                $lang = ICL_LANGUAGE_CODE;             
            }

            if ($detectLanguage && function_exists('pll_current_language') ) {
                $lang = pll_current_language('slug');             
            }
			
			if (strlen($lang) > 2)
			{
				$lang = substr($lang, 0, 2);
			}

            $baseUrl = "https://cookiehub.net/c2/";
            $dev = false;
            if(array_key_exists('dcchub_dev', $options) && $options['dcchub_dev'] == '1'){                
                $dev = true;
                $baseUrl = "https://cookiehub.net/dev/c2/";
            }

            echo "<script type=\"text/javascript\">\n";
            if($detectLanguage) {
                echo "          var cpm = {
                    language: '" . $lang . "'
                };\n";
            }
            else {
                echo "          var cpm = {};\n";
            }
            echo "          (function(h,u,b){
            var d=h.getElementsByTagName(\"script\")[0],e=h.createElement(\"script\");
            e.async=true;e.src='" . $baseUrl . ($options['dcchub_api_key']) . ".js';
            e.onload=function(){u.cookiehub.load(b);}
            d.parentNode.insertBefore(e,d);
            })(document,window,cpm);
            </script>";

            if($options['dcchub_necessary_body'] != '')
            {
                echo dcchub_update_script($options['dcchub_necessary_body'], 'necessary');
            }

            if($options['dcchub_analytics_body'] != '')
            {
                echo dcchub_update_script($options['dcchub_analytics_body'], 'analytics');
            }

            if($options['dcchub_marketing_body'] != '')
            {
                echo dcchub_update_script($options['dcchub_marketing_body'], 'marketing');
            }

            if($options['dcchub_preferences_body'] != '')
            {
                echo dcchub_update_script($options['dcchub_preferences_body'], 'preferences');
            }

            if($options['dcchub_other_body'] != '')
            {
                echo dcchub_update_script($options['dcchub_other_body'], 'other');
            }
        }
    }
}

function dcchub_generate_code_head() {
    $options = get_option( 'dcchub_option_name' );
    if($options != null){
        if($options['dcchub_api_key'] != ''){
            if($options['dcchub_necessary_head'] != '')
            {
                echo dcchub_update_script($options['dcchub_necessary_head'], 'necessary');
            }

            if($options['dcchub_analytics_head'] != '')
            {
                echo dcchub_update_script($options['dcchub_analytics_head'], 'analytics');
            }

            if($options['dcchub_marketing_head'] != '')
            {
                echo dcchub_update_script($options['dcchub_marketing_head'], 'marketing');
            }

            if($options['dcchub_preferences_head'] != '')
            {
                echo dcchub_update_script($options['dcchub_preferences_head'], 'preferences');
            }

            if($options['dcchub_other_head'] != '')
            {
                echo dcchub_update_script($options['dcchub_other_head'], 'other');
            }
        }
    }
}

function dcchub_update_script($script, $type){
    if (strpos($script, 'data-consent') === false)
    {
        //remove type
        $script = preg_replace('#<script(.+?)type="(.*?)"(.*?)>#is', '<script$1$3>', $script);

        //add type="plain/text" and data-consent
        $script = preg_replace('#<script(.*?)>#is', '<script$1 type="text/plain" data-consent="'.$type.'">', $script);
    }
    return $script;
}

?>