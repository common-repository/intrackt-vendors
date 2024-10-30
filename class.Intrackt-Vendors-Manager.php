<?php
namespace Intrackt\Vendors;

/*
 * load the source for any required classes or files
 */
require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-PageMain.php' );
require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-PageLog.php' );
require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-Actions.php' );
require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-Common.php' );


/*
 * The Manager class controls the Vendors
 */
class Manager {

    /*
     * Have we instantiated the class-- this is a singleton and does not produce children
     */
	private static $initiated = false;

    /**
     * Init Manager class
     */
	public static function init() {
            
            if ( ! self::$initiated ) {

                self::$initiated = true;

            $role=\get_role('administrator');
            $role->add_cap('intrackt_vendors');
            $role->add_cap('intrackt_common');

            }
        
        /*
         * setup options
         */
        PageMain::optionsDefine();
        
	}

    /*
     * add left column links on the plugin page for this plugin
     */
    public static function actionLinksLeft($links) {
        
        $links['settings']="<a href='/wp-admin/admin.php?page=intracktvendors-main'>Settings</a>";
        $links['license']="<a href='https://intrackt.com/plugins-vendors/#license' target='_blank'>License</a>";
        
        //PageLog::updateTestObjectLog('Left: $links',$links);
        
        return $links;
    
    }

    /*
     * add right column links on the plugin page for this plugin
     */
    public static function actionLinksRight($links,$file) {
        
        /*
         * skip if not me
         */
        //PageLog::updateTestLog("Right: contect='{$context}'");
        if (strpos($file,'Intrackt-Vendors')===false) return $links;
        
        foreach($links as $key=>$link) $links[$key]=str_replace('<a',"<a target='_blank'",$link);
        
        $links[]="<a target='_blank' href='https://intrackt.com/plugins-vendors/'>Details</a>";
        $links[]="<a target='_blank' href='https://intrackt.com/plugins-vendors/#faq'>FAQ</a>";
        $links[]="<a target='_blank' href='https://intrackt.com/plugins-vendors/#support'>Support</a>";
            
        return $links;
    
    }

    /*
     * activate the plugin
     */
    public static function activate() {
    
        /*
         * Fail if the WP version is too old, else acticate a timed event to
         * permit showing the main Vendors page ONCE at activation
         */
		if ( version_compare( $GLOBALS['wp_version'], INTRACKT_VENDORS_MINIMUM_WP_VERSION, '<' ) ) {
			self::alertLog("Manager: WP too old to activate");
            return;
		}

        /*
         * let administrator use this plugin
         */
        $role=\get_role('administrator');
        $role->add_cap('intrackt_vendors');
        $role->add_cap('intrackt_common');

        /*
         * let vendors manage offers
         */
        $role=\get_role('yith_vendor');
        if (is_object($role)) {
            $role->add_cap('manage_woocommerce');
            $role->add_cap('edit_woocommerce_offer');
            $role->add_cap('read_woocommerce_offer');
            $role->add_cap('delete_woocommerce_offer');
            $role->add_cap('edit_woocommerce_offers');
            $role->add_cap('edit_others_woocommerce_offers');
            $role->add_cap('publish_woocommerce_offers');
            $role->add_cap('read_private_woocommerce_offers');
            $role->add_cap('delete_woocommerce_offers');
            $role->add_cap('delete_private_woocommerce_offers');
            $role->add_cap('delete_published_woocommerce_offers');
            $role->add_cap('delete_others_woocommerce_offers');
            $role->add_cap('edit_private_woocommerce_offers');
            $role->add_cap('edit_published_woocommerce_offers');
            $role->add_cap('edit_published_woocommerce_offers');
            $role->add_cap('intrackt_vendors_offers');
            $role->add_cap('edit_others_shop_orders');
            $role->add_cap('edit_private_shop_orders');
            $role->add_cap('edit_published_shop_orders');
            $role->add_cap('edit_shop_order');
            $role->add_cap('edit_shop_orders');
            $role->add_cap('publish_shop_orders');
            $role->add_cap('read_shop_order');
            
        }

        /*
         * Also clear the log
         */
        PageLog::resetLog();
        
        //$roles=\get_option('wp_user_roles');
        //PageLog::updateTestObjectLog("\$roles['yith_vendor']", $roles['yith_vendor']);
        
        /*
         * Go to Weldome page after startup
         */
        set_transient( '_intrackt_vendors_menu_create', true, 30 );
        
	}

    /*
     * Let the main page to also act as a welcome page when the Vendors is activated
     */
    public static function welcome() {
        
        /*
         * Bail if no activation redirect
         */
        if ( ! get_transient( '_intrackt_vendors_menu_create' ) ) {
            return;
        }

        /*
         * Delete the redirect transient
         */
        delete_transient( '_intrackt_vendors_menu_create' );

        /*
         * Bail if activating from network, or bulk
         */
        if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
            return;
        }

        /*
         * perform the redirect
         */
        wp_safe_redirect( add_query_arg( array( 'page' => 'intracktvendors-main' ), admin_url( 'admin.php' ) ) );

    }
    
    /*
     * create the main menu and all submenus
     */
    public static function menuCreate() {
        
        /*
         * do this menu item only once
         */
        global $intractCommonMenu;
        if ($intractCommonMenu!=1) {
            $intractCommonMenu=1;
            
            add_menu_page(
                'Intrackt',
                'Intrackt',
                'intrackt_common',
                'intrackt-common',
                array( '\Intrackt\Vendors\Common','displayPage')
            );
        }
        add_submenu_page(
            'intrackt-common',
            'Intrackt Vendors',
            'Vendors',
            'intrackt_vendors',
            'intracktvendors-main',
            array( '\Intrackt\Vendors\PageMain','displayPage')
        );
        add_submenu_page(
            'intrackt-vendors-settings',
            'Intrackt Vendors Log',
            '--Log',
            'intrackt_vendors',
            'intracktvendors-log',
            array( '\Intrackt\Vendors\PageLog','displayPage')
        );
        
        /*
         * add page to manage vendor offers if offers for woocommerce installed
         */
        if (\is_plugin_active('offers-for-woocommerce/offers-for-woocommerce.php')) {
            add_menu_page(
                'OFFERS',
                'OFFERS',
                'intrackt_vendors_offers',
                'intrackt-vendor-offers',
                array( '\Intrackt\Vendors\Actions','listOffers')
            );
        }
        
    }

    /*
    * deactivate Vendors plugin
    */
    public static function deactivate( ) {

        /*
         * Remove the menu when it is deactivated
         */
        add_action( 'admin_head', '\Intrackt\Vendors\menuDelete' );

    }
   
    /*
     * Deactivate the Vendors menu
     */
    public static function menuDelete() {
        remove_submenu_page( 'index.php', 'vendors-main' );
    }
    
    /*
     * Bail out with error message
     */
    private static function alertLog( $message) {
        trigger_error($message,E_USER_ERROR);
    }
}
