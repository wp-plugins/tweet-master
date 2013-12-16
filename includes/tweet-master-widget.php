<?php
//Hook Widget
add_action( 'widgets_init', 'tweet_master_widget' );
//Register Widget
function tweet_master_widget() {
register_widget( 'tweet_master_widget' );
}

class tweet_master_widget extends WP_Widget {
	function tweet_master_widget() {
	$widget_ops = array( 'classname' => 'Tweet Master', 'description' => __('With Tweet Master plugin you can display your latest tweets, favorite twitter lists and tweet button inside any widget position of your wordpress template. ', 'tweet_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tweet_master_widget' );
	$this->WP_Widget( 'tweet_master_widget', __('Tweet Master', 'tweet_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Tweet Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$tweetspacer ="'";
		$show_tweetbutton = isset( $instance['show_tweetbutton'] ) ? $instance['show_tweetbutton'] :false;
		$twitteruser = $instance['twitteruser'];
		echo $before_widget;
		
		// Display the widget title
	if ( $title )
		echo $before_title . $name . $after_title;
	//Display Latest Tweets

	//Display Tweet Button
	if ( $show_tweetbutton )
			echo '<br/><a href="https://twitter.com/share" class="twitter-share-button" data-via="'.$twitteruser.'" data-related="'.$twitteruser.'" data-hashtags="'.$twitteruser.'">Tweet</a>' .
				'<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'.$tweetspacer.'http'.$tweetspacer.':'.$tweetspacer.'https'.$tweetspacer.';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'.$tweetspacer.'://platform.twitter.com/widgets.js'.$tweetspacer.';fjs.parentNode.insertBefore(js,fjs);}}(document, '.$tweetspacer.'script'.$tweetspacer.', '.$tweetspacer.'twitter-wjs'.$tweetspacer.');</script>';
		//Display Twitter Lists

	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_tweetbutton'] = $new_instance['show_tweetbutton'];
		$instance['twitteruser'] = $new_instance['twitteruser'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Tweet Master', 'tweet_master'), 'title' => true, 'show_tweetbutton' => false, 'twitteruser' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'tweet_master'); ?></b></label></br>
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_tweetbutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_tweetbutton' ); ?>" name="<?php echo $this->get_field_name( 'show_tweetbutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_tweetbutton' ); ?>"><b><?php _e('Tweet Share Button', 'tweet_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'twitteruser' ); ?>"><?php _e('insert your Twitter Username:', 'tweet_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'twitteruser' ); ?>" name="<?php echo $this->get_field_name( 'twitteruser' ); ?>" value="<?php echo $instance['twitteruser']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<b>Display Latest Tweets</b>
	</p>
	<div class="description">Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<b>Display Twitter List</b>
	</p>
	<div class="description">Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Shortcode Framework</b>
	</p>
	<div class="description">The shortcode framework allows you to insert Tweet Master inside Pages & Posts without the need of extra plugins or gimmicks. Fast page load times and top SEO. Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Tweet Master Website</b>
		</p>
		<p><a class="button-secondary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="Tweet Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/tweet-master-documentation/" target="_blank" title="Tweet Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/tweet-master/" target="_blank" title="Tweet Master">Adv. Version</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Advanced Version Updater:</b>
		</p>
		<div class="description">The advanced version updater allows to automatically update your advanced plugin. Only available in advanced version.</div>
		<br>
	<?php
	}
 }
?>