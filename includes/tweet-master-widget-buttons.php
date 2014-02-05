<?php
//Hook Widget
add_action( 'widgets_init', 'tweet_master_widget_buttons' );
//Register Widget
function tweet_master_widget_buttons() {
register_widget( 'tweet_master_widget_buttons' );
}

class tweet_master_widget_buttons extends WP_Widget {
	function tweet_master_widget_buttons() {
	$widget_ops = array( 'classname' => 'Tweet Master Buttons', 'description' => __('Fast Loading Widget to display Tweet and Follow Button (includes Via, Hashtag and Recommend) inside any widget position of your wordpress template. ', 'tweet_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tweet_master_widget_buttons' );
	$this->WP_Widget( 'tweet_master_widget_buttons', __('Tweet Master Buttons', 'tweet_master'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$tweet_title = isset( $instance['tweet_title'] ) ? $instance['tweet_title'] :false;
		$tweet_title_new = isset( $instance['tweet_title_new'] ) ? $instance['tweet_title_new'] :false;
		$tweetspacer ="'";
		$show_tweetbutton = isset( $instance['show_tweetbutton'] ) ? $instance['show_tweetbutton'] :false;
		$twitteruser = $instance['twitteruser'];
		$show_tweetbutton_count = isset( $instance['show_tweetbutton_count'] ) ? $instance['show_tweetbutton_count'] :false;
		$show_tweetbutton_via = isset( $instance['show_tweetbutton_via'] ) ? $instance['show_tweetbutton_via'] :false;
		$show_tweetbutton_hashtag = isset( $instance['show_tweetbutton_hashtag'] ) ? $instance['show_tweetbutton_hashtag'] :false;
		$show_tweetbutton_recommend = isset( $instance['show_tweetbutton_recommend'] ) ? $instance['show_tweetbutton_recommend'] :false;
		$show_followbutton = isset( $instance['show_followbutton'] ) ? $instance['show_followbutton'] :false;
		$show_followbutton_count = isset( $instance['show_followbutton_count'] ) ? $instance['show_followbutton_count'] :false;
		$show_followbutton_user = isset( $instance['show_followbutton_user'] ) ? $instance['show_followbutton_user'] :false;
		$tweets_code = $instance['tweets_code'];
		$show_tweetlist = isset( $instance['show_tweetlist'] ) ? $instance['show_tweetlist'] :false;
		$tweetlist_code = $instance['tweetlist_code'];
		echo $before_widget;
		
		// Display the widget title
	if ( $tweet_title ){
		if (empty ($tweet_title_new)){
		$tweet_title_new = get_option('tweet_master_name');
		}
		echo $before_title . $tweet_title_new . $after_title;
	}
	else{
	}
	//Prepare Follow Button Username
	if ( $show_followbutton_user ){
	$show_followbutton_user_create = "Follow @".$twitteruser;
	}
	else{
	$show_followbutton_user_create = 'data-show-screen-name="false"';
	}
	//Prepare Follow Button Count
	if ( $show_followbutton_count ){
	$show_followbutton_count_create = 'data-show-count="true"';
	}
	else{
	$show_followbutton_count_create = 'data-show-count="false"';
	}
	//Display Follow Button
	if ( $show_followbutton ){
		echo '<a href="https://twitter.com/'.$twitteruser.'" class="twitter-follow-button" '.$show_followbutton_count_create.' '.$show_followbutton_user_create.'></a>' .
				'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'.$tweetspacer.'http'.$tweetspacer.':'.$tweetspacer.'https'.$tweetspacer.';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'.$tweetspacer.'://platform.twitter.com/widgets.js'.$tweetspacer.';fjs.parentNode.insertBefore(js,fjs);}}(document, '.$tweetspacer.'script'.$tweetspacer.', '.$tweetspacer.'twitter-wjs'.$tweetspacer.');</script>';
	}
	else{
	}
	//Prepare Tweet Button Count
	if ( $show_tweetbutton_count){
	$show_tweetbutton_count_create = '';
	}
	else{
	$show_tweetbutton_count_create = 'data-count="none"';
	}
	//Display Tweet Button
	if ( $show_tweetbutton ){
			echo '&nbsp;<a href="https://twitter.com/share" class="twitter-share-button" data-via="'.$twitteruser.'" data-related="'.$twitteruser.'" data-hashtags="'.$twitteruser.'" '.$show_tweetbutton_count_create.'>Tweet</a>' .
				'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'.$tweetspacer.'http'.$tweetspacer.':'.$tweetspacer.'https'.$tweetspacer.';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'.$tweetspacer.'://platform.twitter.com/widgets.js'.$tweetspacer.';fjs.parentNode.insertBefore(js,fjs);}}(document, '.$tweetspacer.'script'.$tweetspacer.', '.$tweetspacer.'twitter-wjs'.$tweetspacer.');</script>';
	}
	else{
	}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['tweet_title'] = strip_tags( $new_instance['tweet_title'] );
		$instance['tweet_title_new'] = $new_instance['tweet_title_new'];
		$instance['twitteruser'] = $new_instance['twitteruser'];
		$instance['show_tweetbutton'] = $new_instance['show_tweetbutton'];
		$instance['show_tweetbutton_count'] = $new_instance['show_tweetbutton_count'];
		$instance['show_tweetbutton_via'] = $new_instance['show_tweetbutton_via'];
		$instance['show_tweetbutton_hashtag'] = $new_instance['show_tweetbutton_hashtag'];
		$instance['show_tweetbutton_recommend'] = $new_instance['show_tweetbutton_recommend'];
		$instance['show_followbutton'] = $new_instance['show_followbutton'];
		$instance['show_followbutton_user'] = $new_instance['show_followbutton_user'];
		$instance['show_followbutton_count'] = $new_instance['show_followbutton_count'];
		$instance['tweets_code'] = $new_instance['tweets_code'];
		$instance['show_tweetlist'] = $new_instance['show_tweetlist'];
		$instance['tweetlist_code'] = $new_instance['tweetlist_code'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'tweet_title_new' => __('Tweet Master', 'tweet_master'), 'tweet_title' => true, 'tweet_title_new' => false, 'twitteruser' => false, 'show_tweetbutton' => true, 'show_tweetbutton_count' => true, 'show_tweetbutton_via' => true, 'show_tweetbutton_hashtag' => true, 'show_tweetbutton_recommend' => true, 'show_followbutton' => true, 'show_followbutton_user' => true, 'show_followbutton_count' => true );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['tweet_title'], true ); ?> id="<?php echo $this->get_field_id( 'tweet_title' ); ?>" name="<?php echo $this->get_field_name( 'tweet_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'tweet_title' ); ?>"><b><?php _e('Display Widget Title', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'tweet_title_new' ); ?>"><?php _e('Change Title:', 'tweet_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'tweet_title_new' ); ?>" name="<?php echo $this->get_field_name( 'tweet_title_new' ); ?>" value="<?php echo $instance['tweet_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<label for="<?php echo $this->get_field_id( 'twitteruser' ); ?>"><b><?php _e('Twitter Username:', 'tweet_master'); ?></b></label></br>
	<input id="<?php echo $this->get_field_id( 'twitteruser' ); ?>" name="<?php echo $this->get_field_name( 'twitteruser' ); ?>" value="<?php echo $instance['twitteruser']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton' ); ?>"><b><?php _e('Tweet Share Button', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton_count'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton_count' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton_count' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton_count' ); ?>"><b><?php _e('Display Bubble Count', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton_via'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton_via' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton_via' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton_via' ); ?>"><b><?php _e('Activate Via', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton_hashtag'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton_hashtag' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton_hashtag' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton_hashtag' ); ?>"><b><?php _e('Activate Hashtag', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton_recommend'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton_recommend' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton_recommend' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton_recommend' ); ?>"><b><?php _e('Activate Recommend', 'tweet_master'); ?></b></label></br>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_followbutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_followbutton' ); ?>" name="<?php echo $this->get_field_name( 'show_followbutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_followbutton' ); ?>"><b><?php _e('Twitter Follow Button', 'tweet_master'); ?></b></label>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_followbutton_user'], true ); ?> id="<?php echo $this->get_field_id( 'show_followbutton_user' ); ?>" name="<?php echo $this->get_field_name( 'show_followbutton_user' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_followbutton_user' ); ?>"><b><?php _e('Display Username', 'tweet_master'); ?></b></label>
	</p>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_followbutton_count'], true ); ?> id="<?php echo $this->get_field_id( 'show_followbutton_count' ); ?>" name="<?php echo $this->get_field_name( 'show_followbutton_count' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_followbutton_count' ); ?>"><b><?php _e('Display Bubble Count', 'tweet_master'); ?></b></label>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Tweet Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="<?php echo get_option('tweet_master_name'); ?> Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/tweet-master-documentation/" target="_blank" title="<?php echo get_option('tweet_master_name'); ?> Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="Visit Website">Get Add-ons</a></p>
	<?php
	}
 }
?>