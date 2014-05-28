<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   wp-redditjs
 * @author    Benjamin Adams <ben@benadams.co>
 * @license   GPL-2.0+
 * @link      http://redditjs.com
 * @copyright 2014 Benjamin Adams
 */
?>

<?php

if( $_POST['hiddenConfirmPost'] == 'Y' ) { //save posted fields

update_option( "redditjs_width", $_POST[ "redditjs_width" ] );
update_option( "redditjs_height", $_POST[ "redditjs_height" ] );
update_option( "postSortOrder", $_POST[ "postSortOrder" ] );

var $sortOptionHighest= get_option('postSortOrder', 1);
var $sortOptionNewest = get_option('postSortOrder', 0);
}



?>



<div class="wrap">


<form class="form-horizontal redditjs_form" method="post" action="<?php echo admin_url( 'options-general.php?page=' . $this->plugin_slug ) ?>">
<fieldset>
<!-- Form Name -->
<legend><h1><?php echo esc_html( get_admin_page_title() ); ?></h1></legend>
<input type="hidden" name="hiddenConfirmPost" value="Y">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="redditjs_width">Embeded Reddit Size</label>
  <div class="controls">
   Width: <input name="redditjs_width" value="<?php echo get_option('redditjs_width', 500); ?>" type="text" placeholder="500" class="input-mini">
   Height: <input name="redditjs_height" value="<?php echo get_option('redditjs_height', 350); ?>" type="text" placeholder="350" class="input-mini">
    <p class="help-block">How wide should the embedded reddit post be? </p>
  </div>
</div>


<!-- Multiple Radios -->
<div class="control-group">
  <label class="control-label" for="postSortOrder">Show newest or highest upvoted post?</label>
  <div class="controls">
    <label class="radio" for="postSortOrder-0">
      <input type="radio" name="postSortOrder" id="postSortOrder-0" value="1" checked="checked">
      highest score
    </label>
    <label class="radio" for="postSortOrder-1">
      <input type="radio" name="postSortOrder" id="postSortOrder-1" value="0">
      newest
    </label>
  </div>
</div>




<!-- Button -->
<div class="control-group">
  <label class="control-label" for="saveForm"></label>
  <div class="controls">
    <button id="saveForm" name="saveForm" class="btn btn-primary">Save</button>
  </div>
</div>

</fieldset>






</form>





</div>
