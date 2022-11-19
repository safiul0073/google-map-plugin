<?php

namespace Src\includes;

use Src\admin\SPP_Manu;
use Src\API\AdminCallback;
use Src\includes\SPP_Loader;
class SPP_Main {

    protected $loader;
    protected $menu;
    protected $admin_callback;
    function __construct()
    {
        $this->loadDependencis();
    }

    function loadDependencis () {
        $this->loader         = new SPP_Loader();
        $this->admin_callback = new AdminCallback();
        $this->menu           = new SPP_Manu();
    }

    function loadAdminHook () {
        $this->loader->addAction( 'admin_menu', $this->admin_callback, 'adminDashboard' );
    }

    function getLoader () {
        return $this->loader;
    }


    function run () {
        
        return $this->loader->run();
    }



}