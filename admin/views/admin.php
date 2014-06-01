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

$checked="checked='checked'";


if( $_POST['hiddenConfirmPost'] == 'Y' ) { //save posted fields

update_option( "redditjs_width", $_POST[ "redditjs_width" ] );
update_option( "redditjs_height", $_POST[ "redditjs_height" ] );
update_option( "postSortOrder", $_POST[ "postSortOrder" ] );


if($_POST[ "showSubmit" ]=='on')
{
update_option( "showSubmit", 'true' );
}else {
update_option( "showSubmit", 'false' );
}

update_option( "cssTheme", $_POST[ "cssTheme" ] );
}//end _POST




$postSortOrder = get_option('postSortOrder', 'mostUpvoted');
$sortOptionNewestStr='';
$sortOptionHighestStr='';
$sortOptionMostCommentsStr='';
if($postSortOrder=='mostUpvoted')
{
$sortOptionHighestStr = $checked;
}else if($postSortOrder=='newest'){
$sortOptionNewestStr = $checked;
}else if($postSortOrder=='mostComments'){
$sortOptionMostCommentsStr= $checked;
}

$showSubmit =get_option('showSubmit', 'true');
$showSubmitStr="";
if($showSubmit=='true')
{
	$showSubmitStr=$checked;
}


//cssTheme
$cssTheme = get_option('cssTheme', 'light');
$cssThemeDarkStr='';
$cssThemeLightStr='';

if($cssTheme=='dark')
{
$cssThemeDarkStr = $checked;
}else if($cssTheme=='light'){
$cssThemeLightStr = $checked;
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
   Height: <input name="redditjs_height" value="<?php echo get_option('redditjs_height', 450); ?>" type="text" placeholder="350" class="input-mini">
    <p class="help-block">How wide should the embedded reddit post be? </p>
  </div>
</div>


<!-- sort  -->
<div class="control-group">
  <label class="control-label" for="postSortOrder">Show newest or highest upvoted post?</label>
  <div class="controls">
    <label class="radio" for="postSortOrder-0">
      <input type="radio" name="postSortOrder" id="postSortOrder-0" value="mostUpvoted" <?php echo $sortOptionHighestStr; ?> >
      highest score
    </label>
    <label class="radio" for="postSortOrder-1">
      <input type="radio" name="postSortOrder" id="postSortOrder-1" value="newest" <?php echo $sortOptionNewestStr; ?> >
      newest
    </label>
    <label class="radio" for="postSortOrder-2">
      <input type="radio" name="postSortOrder" id="postSortOrder-2" value="mostComments" <?php echo $sortOptionMostCommentsStr; ?> >
      most comments
    </label>
  </div>
</div>

<!-- show submit checkbox -->
<div class="control-group">
  <label class="control-label" for="showSubmit">Show submit button</label>
  <div class="controls">
   <input name="showSubmit" <?php echo $showSubmitStr; ?> type="checkbox" class="input-mini">
 
    <p class="help-block">If we find no post on reddit for your page URL, should we show a subit button? </p>
  </div>
</div>


<!-- cssTheme -->
<div class="control-group">
  <label class="control-label" for="cssTheme">Choose Theme</label>
  <div class="controls">
    <label class="radio" for="cssTheme-0">
      <input type="radio" name="cssTheme" id="cssTheme-0" value="light" <?php echo $cssThemeLightStr; ?> >
      light
    </label>
    <label class="radio" for="cssTheme-1">
      <input type="radio" name="cssTheme" id="cssTheme-1" value="dark" <?php echo $cssThemeDarkStr; ?> >
      dark
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
