<?php 

namespace Src\public;

use Src\includes\BaseController;

class SPP_GoogleMap extends BaseController{
    
    public function enqueueStyle () {
        wp_enqueue_style( $this->pluginName(), $this->getPluginUrl(). 'css/google-map.css', array(), $this->version(), 'all' );
    }

    public function enqueueScript () {
        $api_key = esc_attr(get_option( 'google_map_api_key' ));

        wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key='.$api_key.'&v=weekly' , array(), '', true);
        wp_enqueue_script( $this->pluginName(), $this->getPluginUrl() . 'js/google.map.js', array( 'jquery', 'googlemaps' ), $this->version(), true );
    }

    function shortCode( ) {
        return require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/spp-google-map.php';
    }
}