<?php

namespace Src\includes;

class BaseController {
    
    protected function version () {
            return '1.0.0';
    }

    protected function plginBasename () {
        return plugin_basename( dirname( __FILE__ ) );
    }

    protected function getPluginPath() {
        return plugin_dir_path( dirname(__FILE__, 2) );
    }
}