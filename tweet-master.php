<?php
/**
Plugin Name: Tweet Master
Plugin URI: http://wordpress.techgasp.com/tweet-master/
Version: 4.3
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: tweet-master
Description: With Tweet Master plugin you can display your latest tweets, favourite twitter lists and tweet button.
License: GPL2 or later
*/
/*
Copyright 2013 TechGasp  (email : info@techgasp.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('tweet_master')) :
///////DEFINE ID//////
define('TWEET_MASTER_ID', 'tweet-master');
///////DEFINE VERSION///////
define( 'tweet_master_VERSION', '4.3' );
global $tweet_master_version, $tweet_master_name;
$tweet_master_version = "4.3"; //for other pages
$tweet_master_name = "Tweet Master"; //pretty name
if( is_multisite() ) {
update_site_option( 'tweet_master_installed_version', $tweet_master_version );
update_site_option( 'tweet_master_name', $tweet_master_name );
}
else{
update_option( 'tweet_master_installed_version', $tweet_master_version );
update_option( 'tweet_master_name', $tweet_master_name );
}
// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/tweet-master-admin.php');
// HOOK ADMIN IN & UN SHORTCODE
require_once( dirname( __FILE__ ) . '/includes/tweet-master-admin-shortcodes.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/tweet-master-admin-widgets.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/tweet-master-admin-addons.php');
// HOOK ADMIN UPDATER
require_once( dirname( __FILE__ ) . '/includes/tweet-master-admin-updater.php');
// HOOK WIDGET BUTTONS
require_once( dirname( __FILE__ ) . '/includes/tweet-master-widget-buttons.php');

class tweet_master{
//REGISTER PLUGIN
public static function tweet_master_register(){
register_setting(TWEET_MASTER_ID, 'tsm_quote');
}
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function tweet_master_links( $links, $file ) {
	if ( $file == plugin_basename( dirname(__FILE__).'/tweet-master.php' ) ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=tweet-master' ) . '">'.__( 'Settings' ).'</a>';
	}

	return $links;
}

public static function tweet_master_updater_version_check(){
global $tweet_master_version;
//CHECK NEW VERSION
$tweet_master_slug = basename(dirname(__FILE__));
$current = get_site_transient( 'update_plugins' );
$tweet_plugin_slug = $tweet_master_slug.'/'.$tweet_master_slug.'.php';
@$r = $current->response[ $tweet_plugin_slug ];
if (empty($r)){
$r = false;
$tweet_plugin_slug = false;
if( is_multisite() ) {
update_site_option( 'tweet_master_newest_version', $tweet_master_version );
}
else{
update_option( 'tweet_master_newest_version', $tweet_master_version );
}
}
if (!empty($r)){
$tweet_plugin_slug = $tweet_master_slug.'/'.$tweet_master_slug.'.php';
@$r = $current->response[ $tweet_plugin_slug ];
if( is_multisite() ) {
update_site_option( 'tweet_master_newest_version', $r->new_version );
}
else{
update_option( 'tweet_master_newest_version', $r->new_version );
}
}
}
		// Advanced Updater

//END CLASS
}
if ( is_admin() ){
	add_action('admin_init', array('tweet_master', 'tweet_master_register'));
	add_action('init', array('tweet_master', 'tweet_master_updater_version_check'));
}
add_filter('the_content', array('tweet_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('tweet_master', 'tweet_master_links'), 10, 2 );
endif;