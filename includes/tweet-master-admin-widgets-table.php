<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class tweet_master_admin_widgets_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
?>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="300"><legend><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'tweet_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'tweet_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-columnname" scope="col" width="300"><a class="button-primary" href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" title="To Widgets Page" style="float:left;">To Widgets Page</a></p></th>
			<th class="manage-column column-columnname" scope="col"><a class="button-primary" href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" title="To Widgets Page" style="float:right;">To Widgets Page</a></p></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-buttons.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Buttons Widget</h3><p>"Use it if you love your wordpress website" Fast Loading Widget to display Tweet, Follow, Hashtag and Mention Button. Beefed-up with Via Twitter User, Hashtag and Recommend. Option to display buttons bubble count and username are included for professional max "viral" effectiveness.</p><p>The free version of the plugin includes this widget unrestricted, if you need to display Twitter viral buttons and love your wordpress, use this widget. Works great when published under any of the below widgets.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-tweets.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Tweets Widget</h3><p>"Supreme" This Widget displays your Tweets by encapsulating and cleaning the twitter script even when twitter servers are responding slow. We achieved Incredible Fast Page Load Times and clean code for Perfect Google SEO, a must for professional wordpress websites.</p><p>Check Add-ons page.</p></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-lists.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Twitter Lists Widget</h3><p>Now you can show off your Twitter Lists without slowing down your website, once again we encapsulated and cleaned the twitter script for optimal wordpress page load times and great google seo.</p><p>Show as many lists as you want by publishing more Tweet Master Twitter Lists Widgets without being afraid of bringing down your website.</p><p>Check Add-ons page.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-embed-video.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Video Content Widget</h3><p>The widget that brings the best of Video Content on Twitter.</p><p>Check Add-ons page.</p></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-embed-tweet.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Tweet Content Widget</h3><p>The widget that brings the best of Tweets Content on Twitter.</p><p>Check Add-ons page.</p></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-tweetmaster-admin-widget-search.png', __FILE__); ?>" alt="<?php echo get_option('tweet_master_name'); ?>" align="left" width="300px" height="135px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Tweet Master Search Content Widget</h3><p>The widget that brings the best of Twitter Content Searches.</p><p>Check Add-ons page.</p></td>
		</tr>
	</tbody>
</table>
<?php
		}
}