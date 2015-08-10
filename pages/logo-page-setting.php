<?php
global $wpdb;

//get options
$tls_munber_of_images= get_option('tls_munber_of_images');
$tls_controls= get_option('tls_controls');
$tls_pagination= get_option('tls_pagination');
$tls_slide_speed= get_option('tls_slide_speed');
$tls_navigation_text_next= get_option('tls_navigation_text_next');
$tls_navigation_text_prev= get_option('tls_navigation_text_prev');

//set options if options are null
if($tls_munber_of_images == ''){ $tls_munber_of_images= 5;}
if($tls_controls == ''){ $tls_controls= true;}
if($tls_pagination == ''){ $tls_pagination= true;}
if($tls_slide_speed == ''){ $tls_slide_speed= 1000;}
if($tls_navigation_text_next == ''){ $tls_navigation_text_next= '>';}
if($tls_navigation_text_prev == ''){ $tls_navigation_text_prev= '<';}

//sanitize all post values
$add_opt_submit= sanitize_text_field( $_POST['add_opt_submit'] );
if($add_opt_submit!='') { 
    
	$tls_munber_of_images= sanitize_text_field( $_POST['tls_munber_of_images'] );
	$tls_controls= sanitize_text_field( $_POST['tls_controls'] );
	$tls_pagination= sanitize_text_field( $_POST['tls_pagination'] );
	$tls_slide_speed= sanitize_text_field( $_POST['tls_slide_speed'] );
	$tls_navigation_text_next= sanitize_text_field( $_POST['tls_navigation_text_next'] );
	$tls_navigation_text_prev= sanitize_text_field( $_POST['tls_navigation_text_prev'] );
	$saved= sanitize_text_field( $_POST['saved'] );


    if(isset($tls_munber_of_images) ) {
		update_option('tls_munber_of_images', $tls_munber_of_images);
    }
	
	if(isset($tls_controls) ) {
		update_option('tls_controls', $tls_controls);
    }
	 if(isset($tls_pagination) ) {
		update_option('tls_pagination', $tls_pagination);
    }
	if(isset($tls_slide_speed) ) {
		update_option('tls_slide_speed', $tls_slide_speed);
    }
	if(isset($tls_navigation_text_next) ) {
		update_option('tls_navigation_text_next', $tls_navigation_text_next);
    }
	if(isset($tls_navigation_text_prev) ) {
		update_option('tls_navigation_text_prev', $tls_navigation_text_prev);
    }
	if($saved==true) {
		
		$message='saved';
	} 
}
  
?>
  <?php
        if ( $message == 'saved' ) {
		echo ' <div class="added-success"><p><strong>Settings Saved.</strong></p></div>';
		}
   ?>
   
    <div class="wrap netgo-facebook-post-setting">
        <form method="post" id="settingForm" action="">
		<h2><?php _e('Logo Slider Setting','');?></h2>
		<table class="form-table">
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="tls_munber_of_images"><?php _e('Number of images to show','');?></label>
			</th>
			<td><input type="text" name="tls_munber_of_images" size="10" value="<?php echo $tls_munber_of_images; ?>" />
		
			</td>
		</tr>
	
	    <tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="tls_munber_of_images"><?php _e('Controls','');?></label>
			</th>
			<td>
			<select style="width:120px" name="tls_controls" id="tls_controls">
			<option value='true' <?php if($tls_controls == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($tls_controls == 'false') { echo "selected='selected'" ; } ?>>False</option>
		   </select>
		   <br />
		   <em><?php _e('Show Left, Right arrow button.', ''); ?></em>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="tls_pagination"><?php _e('Pagination','');?></label>
			</th>
			<td>
			<select style="width:120px" name="tls_pagination" id="tls_pagination">
			<option value='true' <?php if($tls_pagination == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($tls_pagination == 'false') { echo "selected='selected'" ; } ?>>False</option>
		   </select>
		   <br />
		   <em><?php _e('Show pagination.', ''); ?></em>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="tls_slide_speed"><?php _e('Slide Speed','');?></label>
			</th>
			<td>
			<input type="text" name="tls_slide_speed" size="10" value="<?php echo $tls_slide_speed; ?>" />
		   <br />
		   <em><?php _e('Slide Speed in millisecond. (Ex: 1000)', ''); ?></em>
			</td>
		</tr>
	    <tr valign="top">
			<th scope="row" style="width: 370px;">
				<label for="tls_slide_speed"><?php _e('Navigation Text','');?></label>
			</th>
			<td>
			Prev: <input type="text" name="tls_navigation_text_prev" size="10" value="<?php echo $tls_navigation_text_prev; ?>" />
		    <br />
		   Next:  <input type="text" name="tls_navigation_text_next" size="10" value="<?php echo $tls_navigation_text_next; ?>" />
			</td>
		</tr>
		<tr>
		  <td>
		  <p class="submit">
		<input type="hidden" name="saved"  value="saved"/>
        <input type="submit" name="add_opt_submit" class="button-primary" value="Save Changes" />
		  <?php if(function_exists('wp_nonce_field')) wp_nonce_field('add_opt_submit', 'add_opt_submit'); ?>
        </p></td>
		</tr>
		</table>
		
        
       </form>
      
    </div>

