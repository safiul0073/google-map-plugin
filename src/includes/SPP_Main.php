<?php

namespace Src\includes;

use Src\admin\SPP_Manu;
use Src\admin\SPP_SectionField;
use Src\API\AdminCallback;
use Src\includes\SPP_Loader;
use Src\public\SPP_GoogleMap;

class SPP_Main {

    protected $loader;
    protected $admin_menu;
    protected $admin_setting;
    protected $public_setting;
    function __construct()
    {
        $this->loadDependencis();
        $this->loadAdminHook();
        $this->loadPublicHook();
    }

    function loadDependencis () {
        $this->loader         = new SPP_Loader();
        $this->admin_menu     = new SPP_Manu();
        $this->admin_setting  = new SPP_SectionField();
        $this->public_setting = new SPP_GoogleMap();
    }

    function loadAdminHook () {
        $this->loader->addAction( 'admin_menu', $this->admin_menu, 'addMenuPage' );
        $this->loader->addAction( 'admin_init', $this->admin_setting, 'registerCustomFields');
    }

    function loadPublicHook () {
        add_shortcode( 'show_google_map', array($this->public_setting, 'shortCode') );
		$this->loader->addAction( 'wp_enqueue_style', $this->public_setting, 'enqueueStyle' );
		$this->loader->addAction( 'wp_enqueue_scripts', $this->public_setting, 'enqueueScript' );

    }

    function getLoader () {
        return $this->loader;
    }


    function run () {
        
        return $this->loader->run();
    }



}