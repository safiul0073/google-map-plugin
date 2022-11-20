<?php

namespace Src\API;

use Src\includes\BaseController;

class AdminCallback  extends BaseController{
    
    public function adminDashboard () {
       
        return require_once $this->getPluginPath() . 'src/admin/template.php';
    }

    public function precticeOptionGroup ( $input ) {
        return $input;
    }

    public function precticeAdminSection () {
        echo "this admin section here";
    }

    public function precticeOptionField () {

        echo ' <input type="text" class="regular-text" name="google_map_api_key" value="' . esc_attr(get_option( 'google_map_api_key' )) .'">';
    }

}