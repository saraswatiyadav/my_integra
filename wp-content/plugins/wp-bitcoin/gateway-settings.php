<?php
class WP_Bitcoin_Settings_Page 
{
	function __construct() {
		add_action( 'admin_menu', array( &$this, 'add_options_menu' ) );
	}
        
        function add_options_menu()
        {
            if(is_admin())
            {
                add_options_page('WP Bitcoin Settings', 'WP Bitcoin', 'manage_options', 'wp-bitcoin-settings', array(&$this, 'settings_page'));
            }
        }
        /*
	 * Plugin Options page rendering goes here, checks
	 * for active tab and replaces key with the related
	 * settings key. Uses the plugin_options_tabs method
	 * to render the tabs.
	 */
	function settings_page() {
		$wpbc_plugin_tabs = array(
                    'wp-bitcoin-settings' => 'General Settings',
                );
                echo '<div class="wrap">'.screen_icon( ).'<h2>WordPress Bitcoin v'.WP_BITCOIN_ADDON_VERSION.'</h2>';
                $current = "";
                if(isset($_GET['page'])){
                    $current = $_GET['page'];
                    if(isset($_GET['action'])){
                        $current .= "&action=".$_GET['action'];
                    }
                }
                $content = '';
                $content .= '<h2 class="nav-tab-wrapper">';
                foreach($wpbc_plugin_tabs as $location => $tabname)
                {
                    if($current == $location){
                        $class = ' nav-tab-active';
                    } else{
                        $class = '';    
                    }
                    $content .= '<a class="nav-tab'.$class.'" href="?page='.$location.'">'.$tabname.'</a>';
                }
                $content .= '</h2>';
                echo $content;     
                echo '<div id="poststuff"><div id="post-body">';
                if($_GET['page']=="wp-bitcoin-settings"){
                    include_once('general-settings.php');
                    wp_bitcoin_display_general_settings_menu();				
                }
		echo '</div></div>';			
		echo '</div>';
	}
} //end class