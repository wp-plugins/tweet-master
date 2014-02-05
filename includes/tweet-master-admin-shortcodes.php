<?php
if( is_multisite() ) {
	function menu_multi_tweet_admin_shortcodes(){
	// Create menu
	add_submenu_page( 'tweet-master', 'Shortcodes', 'Shortcodes', 'manage_options', 'tweet-master-admin-shortcodes', 'tweet_master_admin_shortcodes' );
	}
}
else {
	// Create menu
	function menu_single_tweet_admin_shortcodes(){
		if ( is_admin() )
		add_submenu_page( 'tweet-master', 'Shortcodes', 'Shortcodes', 'manage_options', 'tweet-master-admin-shortcodes', 'tweet_master_admin_shortcodes' );
	}
}

function tweet_master_admin_shortcodes(){
?>
<div class="wrap">
<div style="width:40px; vertical-align:middle; float:left;"><img src="<?php echo plugins_url('../images/techgasp-minilogo.png', __FILE__); ?>" alt="' . esc_attr__( 'TechGasp Plugins') . '" /><br /></div>
<h2><b>&nbsp;Shortcodes</b></h2>
<?php
if(!class_exists('tweet_master_admin_shortcodes_table_in')){
	require_once( dirname( __FILE__ ) . '/tweet-master-admin-shortcodes-table-in.php');
}
//Prepare Table of elements
$wp_list_table = new tweet_master_admin_shortcodes_table_in();
//Table of elements
$wp_list_table->display();

?>
</br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
</br>
<?php
if(!class_exists('tweet_master_admin_shortcodes_table_un')){
	require_once( dirname( __FILE__ ) . '/tweet-master-admin-shortcodes-table-un.php');
}
//Prepare Table of elements
$wp_list_table = new tweet_master_admin_shortcodes_table_un();
//Table of elements
$wp_list_table->display();
?>
<br>

<p>
<a class="button-secondary" href="http://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="http://wordpress.techgasp.com/support/" target="_blank" title="Facebook Page">TechGasp Support</a>
<a class="button-primary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="Visit Website"><?php echo get_option('tweet_master_name'); ?> Info</a>
<a class="button-primary" href="http://wordpress.techgasp.com/tweet-master-documentation/" target="_blank" title="Visit Website"><?php echo get_option('tweet_master_name'); ?> Documentation</a>
<a class="button-primary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="Visit Website">Get Add-ons</a>
</p>
<?php
}

if( is_multisite() ) {
add_action( 'network_admin_menu', 'menu_multi_tweet_admin_shortcodes' );
}
else {
add_action( 'admin_menu', 'menu_single_tweet_admin_shortcodes' );
}
?>