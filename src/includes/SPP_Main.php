<?php

namespace Src\includes;

use Src\admin\SPP_Manu;
use Src\admin\SPP_SectionField;
use Src\API\AdminCallback;
use Src\includes\SPP_Loader;
class SPP_Main {

    protected $loader;
    protected $admin_menu;
    protected $admin_setting;
    function __construct()
    {
        $this->loadDependencis();
        $this->loadAdminHook();
    }

    function loadDependencis () {
        $this->loader         = new SPP_Loader();
        $this->admin_menu     = new SPP_Manu();
        $this->admin_setting  = new SPP_SectionField();
    }

    function loadAdminHook () {
        $this->loader->addAction( 'admin_menu', $this->admin_menu, 'addMenuPage' );
        $this->loader->addAction( 'admin_init', $this->admin_setting, 'registerCustomFields');
    }

    function getLoader () {
        return $this->loader;
    }


    function run () {
        
        return $this->loader->run();
    }



}