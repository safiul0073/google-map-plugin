<?php

namespace Src\admin;

use Src\API\AdminCallback;
use Src\includes\BaseController;

class SPP_Manu extends BaseController {

    protected $callbacks;
    protected $page;
    function __construct()
    {
        $this->callbacks = new AdminCallback();
        $this->page       = array(
                        "page_title"    => 'SPP page',
                        "menu_title"    => 'SPP',
                        "capability"    => 'manage_options',
                        "menu_slug"     => "spp_custom_page",
                        "callback"      => array($this->callbacks, 'adminDashboard'),
                        "icon_url"      => 'dashicons-welcome-widgets-menus',
                        "position"      => 90
                    );
    }

    public function addMenuPage () {

        add_menu_page(
            $this->page['page_title'], 
            $this->page['menu_title'], 
            $this->page['capability'], 
            $this->page['menu_slug'], 
            $this->page['callback'], 
            $this->page['icon_url'], 
            $this->page['position']
        );
    }

    
}