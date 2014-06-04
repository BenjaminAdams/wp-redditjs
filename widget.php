<?php
//used http://www.wpexplorer.com/create-widget-plugin-wordpress/ as boilerplate
class redditjs_sidebar extends WP_Widget {

	// constructor
	function redditjs_sidebar() {
		parent::WP_Widget(false, $name = __('RedditJS subreddit', 'redditjs_sidebar') );

	}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
	$title = esc_attr($instance['title']);
	$width = esc_attr($instance['width']);
	$height = esc_attr($instance['height']);
	$theme = esc_attr($instance['theme']);
	$sort = esc_attr($instance['sort']);
	$timeframe = esc_attr($instance['timeframe']);
	$subreddit = esc_attr($instance['subreddit']);
	$gridDisplayMode = esc_attr($instance['gridDisplayMode']);
	$domain = esc_attr($instance['domain']); 
	 
	 
} else {
	$title='';
	$width = '300px';
	$height = '400px';
	$theme = 'light';
	$sort = 'hot';
	$timeframe = 'month';
	$subreddit = 'front';
	$gridDisplayMode = 'normal';
	$domain = ''; 
	 
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', 'redditjs_sidebar'); ?></label>
<input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" style='width:65px;' placeholder="300px" value="<?php echo $width; ?>" />px
</p>

<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height', 'redditjs_sidebar'); ?></label>
<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" style='width:65px;' placeholder="400px" value="<?php echo $height; ?>" />px
</p>

<div style='border:1px dashed gray; padding:8px;'>
Either enter a domain or subreddit to embed, leave domain blank if you want to embed a subreddit
<p>
<label for="<?php echo $this->get_field_id('subreddit'); ?>"><?php _e('Subreddit', 'redditjs_sidebar'); ?></label>
<input id="<?php echo $this->get_field_id('subreddit'); ?>" name="<?php echo $this->get_field_name('subreddit'); ?>" type="text" placeholder="ex: funny,pics,adviceanimals" value="<?php echo $subreddit; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('domain'); ?>"><?php _e('domain', 'redditjs_sidebar'); ?></label>
<input id="<?php echo $this->get_field_id('domain'); ?>" name="<?php echo $this->get_field_name('domain'); ?>" type="text" placeholder="imgur.com" value="<?php echo $domain; ?>" />
</p>
</div>

		<p>
			<label for="<?php echo $this->get_field_id( 'sort' ); ?>">Sort order</label> 
			<select id="<?php echo $this->get_field_id( 'sort' ); ?>" name="<?php echo $this->get_field_name( 'sort' ); ?>" >
				<option <?php if ( 'hot' == $instance['sort'] ) echo 'selected="selected"'; ?>>hot</option>
				<option <?php if ( 'new' == $instance['sort'] ) echo 'selected="selected"'; ?>>new</option>
				<option <?php if ( 'top' == $instance['sort'] ) echo 'selected="selected"'; ?>>top</option>
				<option <?php if ( 'controversial' == $instance['sort'] ) echo 'selected="selected"'; ?>>controversial</option>
				<option <?php if ( 'rising' == $instance['sort'] ) echo 'selected="selected"'; ?>>rising</option>
				<option <?php if ( 'top' == $instance['sort'] ) echo 'selected="selected"'; ?>>top</option>
			</select>
		</p>
 
 		<p>
			<label for="<?php echo $this->get_field_id( 'timeframe' ); ?>">timeframe</label> 
			<select id="<?php echo $this->get_field_id( 'timeframe' ); ?>" name="<?php echo $this->get_field_name( 'timeframe' ); ?>" >
				<option <?php if ( 'hour' == $instance['timeframe'] ) echo 'selected="selected"'; ?>>hour</option>
				<option <?php if ( 'day' == $instance['timeframe'] ) echo 'selected="selected"'; ?>>day</option>
				<option <?php if ( 'week' == $instance['timeframe'] ) echo 'selected="selected"'; ?>>week</option>
				<option <?php if ( 'month' == $instance['timeframe'] ) echo 'selected="selected"'; ?>>month</option>
				<option <?php if ( 'year' == $instance['timeframe'] ) echo 'selected="selected"'; ?>>year</option>
			</select>
		</p>
 
 
 		<p>
			<label for="<?php echo $this->get_field_id( 'theme' ); ?>">theme</label> 
			<select id="<?php echo $this->get_field_id( 'theme' ); ?>" name="<?php echo $this->get_field_name( 'theme' ); ?>" >
				<option <?php if ( 'light' == $instance['theme'] ) echo 'selected="selected"'; ?>>light</option>
				<option <?php if ( 'dark' == $instance['theme'] ) echo 'selected="selected"'; ?>>dark</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'gridDisplayMode' ); ?>">Subreddit display mode</label> 
			<select id="<?php echo $this->get_field_id( 'gridDisplayMode' ); ?>" name="<?php echo $this->get_field_name( 'gridDisplayMode' ); ?>" >
				<option <?php if ( 'normal' == $instance['gridDisplayMode'] ) echo 'selected="selected"'; ?>>normal</option>
				<option <?php if ( 'small' == $instance['gridDisplayMode'] ) echo 'selected="selected"'; ?>>small</option>
				<option <?php if ( 'grid' == $instance['gridDisplayMode'] ) echo 'selected="selected"'; ?>>grid</option>
				<option <?php if ( 'large' == $instance['gridDisplayMode'] ) echo 'selected="selected"'; ?>>full</option>
			</select>
		</p> 

<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
	  $instance['title'] = strip_tags($new_instance['title']);
	  
      $instance['width'] = strip_tags($new_instance['width']);
      $instance['height'] = strip_tags($new_instance['height']);
      $instance['sort'] = strip_tags($new_instance['sort']);
	  $instance['timeframe'] = strip_tags($new_instance['timeframe']);
	  $instance['subreddit'] = strip_tags($new_instance['subreddit']);
	  $instance['domain'] = strip_tags($new_instance['domain']);
	  $instance['theme'] = strip_tags($new_instance['theme']);
	  
      $instance['gridDisplayMode'] = strip_tags($new_instance['gridDisplayMode']);	  
	  
	  	  
     return $instance;
}



// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $text = $instance['text'];
   $textarea = $instance['textarea'];
   
   	$width = $instance['width'];
	$height = $instance['height'];
	$theme = $instance['theme'];
	$sort = $instance['sort'];
	$timeframe = $instance['timeframe'];
	$subreddit = $instance['subreddit'];
	$gridDisplayMode = $instance['gridDisplayMode'];
	$domain = $instance['domain']; 
	if (strpos($domain,'.') === false) {  //validate domain by making it have at least a period in it
		$domain = '';
	}
   
   
   echo $before_widget;
   // Display the widget
   echo '<div class="widget-text redditjs_sidebar_box">';

   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }

   echo "<div><script src='//redditjs.com/subreddit.js' data-subreddit='$subreddit' data-domain='$domain' data-height='$height' data-width='$width' data-sort='$sort' data-timeframe='$timeframe' data-theme='$theme' data-subreddit-mode='$gridDisplayMode' ></script></div>";
   
   echo '</div>';
   echo $after_widget;
}






}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("redditjs_sidebar");'));