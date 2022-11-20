<?php

namespace Src\admin;

use Src\API\AdminCallback;

class SPP_SectionField {

    protected $field;
    protected $section;
    protected $setting;
    protected $callback;

    function __construct()
    {
        $this->callback = new AdminCallback();
        $this->setting = array();
        $this->section = array();
        $this->field   = array();
        $this->settingAll();
    }

    private function settingAll () {
        
        $this->setting = array(
            "option_group"  => 'spp_option_settings',
            "option_name"   => 'google_map_api_key',
            'callback'      => array($this->callback, 'precticeOptionGroup')
        );

        $this->section = array(
            "id"            => 'spp_admin_index',
            "title"         => 'Fil Up Google api Key',
            "callback"      => array($this->callback, 'precticeAdminSection'),
            "page"          => 'google_map_api_key'
        );
           
        $this->field = array(
            "id"        => 'google_map_api_key',
            "title"     => 'Google Map Key',
            'callback'  => array($this->callback, 'precticeOptionField'),
            "page"      => 'google_map_api_key',
            "section"   => 'spp_admin_index',
            'args'      =>  array(
                "lebel_for"     => 'google_map_api_key',
                "class"         => 'form-control',
                "option_name"   => "google_map_api_key"
            )
        );
    }

    public function registerCustomFields () {
        
        // set custom settings
      if ($this->setting && $this->section && $this->field) {
        $setting = $this->setting;
        $section = $this->section;
        $field   = $this->field;

        // setting
        register_setting( $setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : '') );

        // section
        add_settings_section( $section['id'], $section['title'], (isset($setting['callback']) ? $setting['callback'] : ''), $section['page'] );

        // set custome fields
        add_settings_field( $field['id'], $field['title'], 
        (isset($field['callback']) ? $field['callback'] : ''), $field['page'], $field['section'], 
        (isset($field['args']) ? $field['args'] : '') );
      }
        // set custome section
        
       
        
    }

}