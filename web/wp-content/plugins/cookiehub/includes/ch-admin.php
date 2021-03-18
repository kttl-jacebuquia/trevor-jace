<?php
class DCCHUBSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'dcchub_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'dcchub_page_init' ) );
    }

    /**
     * Add options page
     */
    public function dcchub_add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'CookieHub', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'dcchub_create_admin_page' )
        );
    }
    
    /**
     * Options page callback
     */
    public function dcchub_create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'dcchub_option_name' );
        ?>
        <div class="wrap dcchub-admin">
            <img class="dcchub-logo" src="https://dash.cookiehub.com/images/cookiehub.svg" />
            <div class="dcchub-wrap">
                <form method="post" action="options.php">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'dcchub_option_group' );
                    do_settings_sections( 'dcchub-setting-admin' );                   
                ?>
                <h3>Integration</h3>
                <p style="max-width: 700px">CookieHub will conditionally load 3rd party javascript code when configured correctly. Refer to the <a href="https://support.cookiehub.com/hc/en-us/sections/360007368712-Integration" target="_blank">Integration documentation</a> for further details.</p>
                <p style="max-width: 700px">Below you can paste javascript tags that should be conditionally loaded based on the user's cookie choices. The CookieHub Wordpress plugin will automatically modify your scripts to using the delay inline javascripts method as described in the <a href="https://support.cookiehub.com/hc/en-us/articles/360039467292-Integration-methods" target="_blank">documentation</a>. Please make sure the &lt;script&gt; tags are included.</p>
                <p style="max-width: 700px">The tabs represent each cookie category offered by CookieHub and you can choose to either include the script in the &lt;head&gt; tag or at the end of the &lt;body&gt; tag.</p>

                <ul class="dcchub-tab-buttons">
                    <li class="active" data-tab="#dcchub_necessary">Necessary</li>
                    <li data-tab="#dcchub_analytics">Analytics</li>
                    <li data-tab="#dcchub_marketing">Marketing</li>
                    <li data-tab="#dcchub_preferences">Preference</li>
                    <li data-tab="#dcchub_others">Others</li>
                </ul>
                <ul class="dcchub-tabs-content">
                    <li id="dcchub_necessary" class="active">
                    <?php do_settings_sections( 'dcchub-setting-admin-necessary' ); ?>
                    </li>
                    <li id="dcchub_analytics"> 
                    <?php do_settings_sections( 'dcchub-setting-admin-analytics' ); ?>
                    </li>
                    <li id="dcchub_marketing">
                    <?php do_settings_sections( 'dcchub-setting-admin-marketing' ); ?>
                    </li>
                    <li id="dcchub_preferences">
                    <?php do_settings_sections( 'dcchub-setting-admin-preferences' ); ?>
                    </li>
                    <li id="dcchub_others">
                    <?php do_settings_sections( 'dcchub-setting-admin-other' ); ?>
                    </li>
                </ul>
                <?php
                    submit_button();
                ?>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function dcchub_page_init()
    {   
        register_setting(
            'dcchub_option_group', // Option group
            'dcchub_option_name', // Option name
            array( $this, 'dcchub_sanitize' ) // Sanitize
        );

        add_settings_section(
            'dcchub_settings', // ID
            'General Settings', // Title
            array( $this, 'dcchub_print_section_info' ), // Callback
            'dcchub-setting-admin' // Page
        );  

        add_settings_field(
            'dcchub_api_key', // ID
            'Code', // Title 
            array( $this, 'dcchub_api_key_callback' ), // Callback
            'dcchub-setting-admin', // Page
            'dcchub_settings' // Section           
        );      

        add_settings_field(
            'dcchub_dev', // ID
            'Development mode', // Title 
            array( $this, 'dcchub_dev_callback' ), // Callback
            'dcchub-setting-admin', // Page
            'dcchub_settings' // Section           
        );   

        add_settings_field(
            'dcchub_language', // ID
            'Use language setting from Wordpress or WPML', // Title 
            array( $this, 'dcchub_language_callback' ), // Callback
            'dcchub-setting-admin', // Page
            'dcchub_settings' // Section           
        );   
        
        add_settings_section(
            'dcchub_settings_necessary', // ID
            '', // Title
            '', // Callback
            'dcchub-setting-admin-necessary' // Page
        );  

        add_settings_field(
            'dcchub_necessary_head', // ID
            'Head', // Title 
            array( $this, 'dcchub_necessary_head_callback' ), // Callback
            'dcchub-setting-admin-necessary', // Page
            'dcchub_settings_necessary' // Section           
        ); 
        
        add_settings_field(
            'dcchub_necessary_body', // ID
            'Body', // Title 
            array( $this, 'dcchub_necessary_body_callback' ), // Callback
            'dcchub-setting-admin-necessary', // Page
            'dcchub_settings_necessary' // Section           
        );

        add_settings_section(
            'dcchub_settings_analytics', // ID
            '', // Title
            '', // Callback
            'dcchub-setting-admin-analytics' // Page
        );  

        add_settings_field(
            'dcchub_analytics_head', // ID
            'Head', // Title 
            array( $this, 'dcchub_analytics_head_callback' ), // Callback
            'dcchub-setting-admin-analytics', // Page
            'dcchub_settings_analytics' // Section           
        ); 
        
        add_settings_field(
            'dcchub_analytics_body', // ID
            'Body', // Title 
            array( $this, 'dcchub_analytics_body_callback' ), // Callback
            'dcchub-setting-admin-analytics', // Page
            'dcchub_settings_analytics' // Section           
        );

        
        add_settings_section(
            'dcchub_settings_marketing', // ID
            '', // Title
            '', // Callback
            'dcchub-setting-admin-marketing' // Page
        );  

        add_settings_field(
            'dcchub_marketing_head', // ID
            'Head', // Title 
            array( $this, 'dcchub_marketing_head_callback' ), // Callback
            'dcchub-setting-admin-marketing', // Page
            'dcchub_settings_marketing' // Section           
        ); 
        
        add_settings_field(
            'dcchub_marketing_body', // ID
            'Body', // Title 
            array( $this, 'dcchub_marketing_body_callback' ), // Callback
            'dcchub-setting-admin-marketing', // Page
            'dcchub_settings_marketing' // Section           
        );

        add_settings_section(
            'dcchub_settings_preferences', // ID
            '', // Title
            '', // Callback
            'dcchub-setting-admin-preferences' // Page
        );  

        add_settings_field(
            'dcchub_preferences_head', // ID
            'Head', // Title 
            array( $this, 'dcchub_preferences_head_callback' ), // Callback
            'dcchub-setting-admin-preferences', // Page
            'dcchub_settings_preferences' // Section           
        ); 
        
        add_settings_field(
            'dcchub_preferences_body', // ID
            'Body', // Title 
            array( $this, 'dcchub_preferences_body_callback' ), // Callback
            'dcchub-setting-admin-preferences', // Page
            'dcchub_settings_preferences' // Section           
        );

        add_settings_section(
            'dcchub_settings_other', // ID
            '', // Title
            '', // Callback
            'dcchub-setting-admin-other' // Page
        );  

        add_settings_field(
            'dcchub_other_head', // ID
            'Head', // Title 
            array( $this, 'dcchub_other_head_callback' ), // Callback
            'dcchub-setting-admin-other', // Page
            'dcchub_settings_other' // Section           
        ); 
        
        add_settings_field(
            'dcchub_other_body', // ID
            'Body', // Title 
            array( $this, 'dcchub_other_body_callback' ), // Callback
            'dcchub-setting-admin-other', // Page
            'dcchub_settings_other' // Section           
        );
        
        wp_register_style( 'dcchub_style', plugins_url( '/css/dcchub-admin.css?0.1', __FILE__ ));
        wp_enqueue_style('dcchub_style');     
        wp_register_script( 'dcchub_test', plugins_url( '/js/dcchub-test.js', __FILE__ ),  array ('jquery') ,'', false);
        wp_enqueue_script('dcchub_test');
    }

    public function dcchub_print_section_info()
    {
        echo '<p>Before enabling the CookieHub plugin on your web site, create an account and your domain in the <a href="https://dash.cookiehub.com/register" target="_blank">CookieHub portal</a>.</p>';
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function dcchub_sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['dcchub_api_key']))
            $new_input['dcchub_api_key'] =  $input['dcchub_api_key'] ;
        if( isset( $input['dcchub_dev']))
            $new_input['dcchub_dev'] = $input['dcchub_dev'];
            if( isset( $input['dcchub_language']))
            $new_input['dcchub_language'] = $input['dcchub_language'];

        if( isset( $input['dcchub_necessary_head']))
            $new_input['dcchub_necessary_head'] = $input['dcchub_necessary_head'];
        if( isset( $input['dcchub_necessary_body']))
            $new_input['dcchub_necessary_body'] = $input['dcchub_necessary_body'];

        if( isset( $input['dcchub_analytics_head']))
            $new_input['dcchub_analytics_head'] = $input['dcchub_analytics_head'];
        if( isset( $input['dcchub_analytics_body']))
            $new_input['dcchub_analytics_body'] = $input['dcchub_analytics_body'];

        if( isset( $input['dcchub_marketing_head']))
            $new_input['dcchub_marketing_head'] = $input['dcchub_marketing_head'];
        if( isset( $input['dcchub_marketing_body']))
            $new_input['dcchub_marketing_body'] = $input['dcchub_marketing_body'];
        
        if( isset( $input['dcchub_preferences_head']))
            $new_input['dcchub_preferences_head'] = $input['dcchub_preferences_head'];
        if( isset( $input['dcchub_preferences_body']))
            $new_input['dcchub_preferences_body'] = $input['dcchub_preferences_body'];
        
        if( isset( $input['dcchub_other_head']))
            $new_input['dcchub_other_head'] = $input['dcchub_other_head'];
        if( isset( $input['dcchub_other_body']))
            $new_input['dcchub_other_body'] = $input['dcchub_other_body'];

        return $new_input;
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dcchub_api_key_callback()
    {
        printf(
            '<input type="text" id="dcchub_api_key" name="dcchub_option_name[dcchub_api_key]" value="%s" />',
            isset( $this->options['dcchub_api_key'] ) ? esc_attr( $this->options['dcchub_api_key']) : ''
        );

        printf('<p style="max-width:500px">Use the 8 character domain code that you can find in the CookieHub portal for your domain.</p>');
    }

    public function dcchub_dev_callback()
    {
        printf(
            '<input type="checkbox" id="dev" name="dcchub_option_name[dcchub_dev]" value="1" '. checked( 1, $this->options['dcchub_dev'], false ) .' /> <p style="max-width:500px">Enabling development mode will avoid edge caching and can be used to see changes made to your domain in the CookieHub portal quickly. Please note that a watermark will be shown on your web site. Make sure you disable development mode before publishing your site.</p>'            
        );
    }

    public function dcchub_language_callback()
    {
        printf(
            '<input type="checkbox" id="language" name="dcchub_option_name[dcchub_language]" value="1" '. checked( 1, $this->options['dcchub_language'], false ) .' /> <p style="max-width:500px">When this feature is enabled, the CookieHub display language will match your web sites language either by using the configured language (in Settings -> General) or the language configured by the WPML or Polylang plugins. Please note that you will have to enable all languages supported by your web site in the CookieHub Portal.</p>'            
        );
    }

    public function dcchub_necessary_head_callback()
    {
        printf(
            '<textarea id="dcchub_necessary_head" class="dcchub_script" name="dcchub_option_name[dcchub_necessary_head]">%s</textarea>',
            isset( $this->options['dcchub_necessary_head'] ) ? esc_textarea( $this->options['dcchub_necessary_head']) : ''
        );
    }

    public function dcchub_necessary_body_callback()
    {
        printf(
            '<textarea id="dcchub_necessary_body" class="dcchub_script" name="dcchub_option_name[dcchub_necessary_body]">%s</textarea>',
            isset( $this->options['dcchub_necessary_body'] ) ? esc_textarea( $this->options['dcchub_necessary_body']) : ''
        );
    }
    
    public function dcchub_analytics_head_callback()
    {
        printf(
            '<textarea id="dcchub_analytics_head" class="dcchub_script" name="dcchub_option_name[dcchub_analytics_head]">%s</textarea>',
            isset( $this->options['dcchub_analytics_head'] ) ? esc_textarea( $this->options['dcchub_analytics_head']) : ''
        );
    }

    public function dcchub_analytics_body_callback()
    {
        printf(
            '<textarea id="dcchub_analytics_body" class="dcchub_script" name="dcchub_option_name[dcchub_analytics_body]">%s</textarea>',
            isset( $this->options['dcchub_analytics_body'] ) ? esc_textarea( $this->options['dcchub_analytics_body']) : ''
        );
    }

    public function dcchub_marketing_head_callback()
    {
        printf(
            '<textarea id="dcchub_marketing_head" class="dcchub_script" name="dcchub_option_name[dcchub_marketing_head]">%s</textarea>',
            isset( $this->options['dcchub_marketing_head'] ) ? esc_textarea( $this->options['dcchub_marketing_head']) : ''
        );
    }

    public function dcchub_marketing_body_callback()
    {
        printf(
            '<textarea id="dcchub_marketing_body" class="dcchub_script" name="dcchub_option_name[dcchub_marketing_body]">%s</textarea>',
            isset( $this->options['dcchub_marketing_body'] ) ? esc_textarea( $this->options['dcchub_marketing_body']) : ''
        );
    }

    public function dcchub_preferences_head_callback()
    {
        printf(
            '<textarea id="dcchub_preferences_head" class="dcchub_script" name="dcchub_option_name[dcchub_preferences_head]">%s</textarea>',
            isset( $this->options['dcchub_preferences_head'] ) ? esc_textarea( $this->options['dcchub_preferences_head']) : ''
        );
    }

    public function dcchub_preferences_body_callback()
    {
        printf(
            '<textarea id="dcchub_preferences_body" class="dcchub_script" name="dcchub_option_name[dcchub_preferences_body]">%s</textarea>',
            isset( $this->options['dcchub_preferences_body'] ) ? esc_textarea( $this->options['dcchub_preferences_body']) : ''
        );
    }

    public function dcchub_other_head_callback()
    {
        printf(
            '<textarea id="dcchub_other_head" class="dcchub_script" name="dcchub_option_name[dcchub_other_head]">%s</textarea>',
            isset( $this->options['dcchub_other_head'] ) ? esc_textarea( $this->options['dcchub_other_head']) : ''
        );
    }

    public function dcchub_other_body_callback()
    {
        printf(
            '<textarea id="dcchub_other_body" class="dcchub_script" name="dcchub_option_name[dcchub_other_body]">%s</textarea>',
            isset( $this->options['dcchub_other_body'] ) ? esc_textarea( $this->options['dcchub_other_body']) : ''
        );
    }
}

if( is_admin() )
{    
    $dcchub_settings_page = new DCCHUBSettingsPage();
}
