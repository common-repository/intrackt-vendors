<?php
/**
 * @package Intrackt-Vendors
 */
/*
Plugin Name: Intrackt Vendors
Plugin URI: http://Intrackt.com/plugins/
Description: Enhance Yith Multi-Vendor with new features
Version: 1.0.1
Author: Intrackt
Author URI: https://Intrackt.com
License: GPLv2 or later
Text Domain: Intrackt
*/

/*
Warranty and license

Copyright 2017 Intrackt
*/

/*
 * Define useful constants
 */
define( 'INTRACKT_PLUGIN_NAME_VENDORS', 'Vendors' );
define( 'INTRACKT_VENDORS_VERSION', '1.0.1' );
define( 'INTRACKT_VENDORS_MINIMUM_WP_VERSION', '4.8.1' );
define( 'INTRACKT_VENDORS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'INTRACKT_VENDORS_TESTMODE', false );

/*
 * common for all plugins
 */
{
    /*
     * Common test to bail out if not eecuted from with WP
     */
    if (!function_exists( 'add_action' ) ) {
            echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
            exit;
    }

    /*
     * load the source for any required classes or files
     */
    require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-Manager.php' );
    require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-Common.php' );

    /*
     * add links to the plugin on the plugin page
     */
    add_filter('plugin_action_links_'.plugin_basename(__FILE__),array('Intrackt\Vendors\Manager','actionLinksLeft'));
    add_filter('plugin_row_meta',array('Intrackt\Vendors\Manager','actionLinksRight'),10,2);

    /*
     * activate the Manager singleton
     */
    add_action( 'init', array( 'Intrackt\Vendors\Manager', 'init' ) );

    /*
     * set the location of the code that activates the Vendors plugin
     */
    register_activation_hook( __FILE__, array( '\Intrackt\Vendors\Manager', 'activate' ) );

    /*
     * set up the process to automatically go to the main Vendors page as the activation welcome page
     */
    add_action( 'admin_init', array( '\Intrackt\Vendors\Manager', 'welcome' ) );

    /*
     * Add the logic to create the menu if the Comics Vendors is activated
     */
    add_action('admin_menu', array( '\Intrackt\Vendors\Manager', 'menuCreate' ));

    /*
     * add filter to add content to the intrackt common menu page
     */
    add_filter('intract_commonpage_body', array( '\Intrackt\Vendors\Common', 'displayBody' ));

    /*
     * set the location of the code that deactivates the Vendors plugin
     */
    register_deactivation_hook( __FILE__, array( '\Intrackt\Vendors\Manager', 'deactivate' ) );
}

/*
 * For this plugin
 */
{
     
    /*
     * load the source for any required classes or files
     */
    require_once( INTRACKT_VENDORS_PLUGIN_DIR . 'class.Intrackt-Vendors-Actions.php' );

    global $intracktVendorsOptions;
    Intrackt\Vendors\Actions::intracktVendorsOptions(); 
    if (is_array($intracktVendorsOptions)) {
        
        /*
        * Add filters and actions to make changes to the store front product display page
        */
        add_filter('the_content',array( '\Intrackt\Vendors\Actions', 'contentFilter' ),PHP_INT_MAX);

        /*
         * Add filters and actions to make changes to the admin product edit page
         */
        add_action( 'admin_footer',array( '\Intrackt\Vendors\Actions', 'adminFooter' ),PHP_INT_MAX);

        /*
         * add action to do on loading of My Account Dashboard
         */
        add_action( 'woocommerce_account_dashboard', array( '\Intrackt\Vendors\Actions', 'vendorDashboard' ),1000 );

        /*
         * Add action to handle changes to my account account details page
         */
        add_action( 'woocommerce_account_edit-account_endpoint', array( '\Intrackt\Vendors\Actions', 'myAccountDetails' ),5);

        /*
         * Add action to control My Account Navigation
         */
        add_action( 'woocommerce_account_navigation', array( '\Intrackt\Vendors\Actions', 'myAccountNavigation' ),50);

        /*
         * Add action when any post is saved or inserted
         */
        add_action( 'wp_insert_post', array( '\Intrackt\Vendors\Actions', 'updatedOrInsertedPost' ),9,3);

        /*
         * handle vendor admin restricting products to the specific vendor that owns the product
         */
        add_filter('query',array('\Intrackt\Vendors\Actions','filterProductQuerys'));

        /*
         * handle vendor admin restricting product offers to the specific vendor that owns the product
         */
        add_filter('query',array('\Intrackt\Vendors\Actions','filterProductOfferQuerys'));

        /*
         * Add the logic to hide menu and submenu items based on the settings
         */
        add_action('admin_menu', array( '\Intrackt\Vendors\Actions', 'menuModify' ),99);

        /*
         * intercept a new post so that fields can be prefilled
         */
        add_action('new_to_auto-draft',array('\Intrackt\Vendors\Actions','prefillNewPost'));
        add_action('default_content',array('\Intrackt\Vendors\Actions','prefillNewPostContent'));
        add_action('default_excerpt',array('\Intrackt\Vendors\Actions','prefillNewPostExcerpt'));

        /*
         * hide vendor name in orders
         */
        add_filter('yith_wcmv_sold_by_string_frontend',array('\Intrackt\Vendors\Actions', 'filterVendorNameOnOrdersPart1' ));
        add_filter('woocommerce_cart_item_name',array('\Intrackt\Vendors\Actions', 'filterVendorNameOnOrdersPart2' ),20,3);
        add_filter('woocommerce_order_item_name',array('\Intrackt\Vendors\Actions', 'filterVendorNameOnOrdersPart2' ),20,3);

        /*
         * filters for Offers for Woocommerce
         */
        {
            /*
             * handle restricting multi-vendor offers to the specific vendor that added the product
             */
            add_filter('query',array('\Intrackt\Vendors\Actions', 'filterOfferQuerys' ));
            add_filter("posts_join",array('\Intrackt\Vendors\Actions', 'filterOfferQueryJoin' ),10000);

            /*
             * handle adjusting email to address for vendor emails
             */
            add_filter('aeofwc_seller_email_address',array('\Intrackt\Vendors\Actions', 'filterSellerEmailAddress' ),10,2);

            /*
             * Make sure "offers" menu item is always visible, especially if multi-vendor support is installed
             */
            add_action('admin_menu', array( '\Intrackt\Vendors\Actions', 'adjustAdminMenu' ),99999);
            add_filter('yith_wpv_vendor_menu_items',array( '\Intrackt\Vendors\Actions', 'enableOffersMenuItem' ));

        }
    }
}
