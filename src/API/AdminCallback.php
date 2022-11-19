<?php

namespace Src\API;

use Src\includes\BaseController;

class AdminCallback  extends BaseController{
    
    public function adminDashboard () {
        return require_once $this->getPluginPath() . 'tamplates/admin.php';
    }


}