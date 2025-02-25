<?php
/*
This file is part of Easy Testimonials.

Easy Testimonials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Easy Testimonials is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with The Easy Testimonials.  If not, see <http://www.gnu.org/licenses/>.
*/

class easyTestimonialOptions
{
	var $textdomain = '';
	
	function __construct(){
		//may be running in non WP mode (for example from a notification)
		if(function_exists('add_action')){
			//add a menu item
			add_action('admin_menu', array($this, 'add_admin_menu_item'));
			add_action('admin_init', 'hello_t_nag_ignore');
				
		}
	}
	
	function add_admin_menu_item(){
		$title = "Easy Testimonials Settings";
		$page_title = "Easy Testimonials Settings";
		$top_level_slug = "easy-testimonials-settings";
		
		//create new top-level menu
		add_menu_page($page_title, $title, 'administrator', $top_level_slug , array($this, 'basic_settings_page'));
		add_submenu_page($top_level_slug , 'Basic Options', 'Basic Options', 'administrator', $top_level_slug, array($this, 'basic_settings_page'));
		add_submenu_page($top_level_slug , 'Style & Theming Options', 'Style & Theming Options', 'administrator', 'easy-testimonials-style-settings', array($this, 'style_settings_page'));
		add_submenu_page($top_level_slug , 'Submission Form Options', 'Submission Form Options', 'administrator', 'easy-testimonials-submission-settings', array($this, 'submission_settings_page'));
		add_submenu_page($top_level_slug , 'Shortcode Generator', 'Shortcode Generator', 'administrator', 'easy-testimonials-shortcode-generator', array($this, 'shortcode_generator_page'));
		add_submenu_page($top_level_slug , 'Import & Export Testimonials', 'Import & Export Testimonials', 'administrator', 'easy-testimonials-import-export', array($this, 'import_export_settings_page'));
		add_submenu_page($top_level_slug , 'Help & Instructions', 'Help & Instructions', 'administrator', 'easy-testimonials-help', array($this, 'help_settings_page'));
		
		//call register settings function
		add_action( 'admin_init', array($this, 'register_settings'));	
	}


	function register_settings(){
		//register our settings
		register_setting( 'easy-testimonials-settings-group', 'testimonials_link' );
		register_setting( 'easy-testimonials-settings-group', 'testimonials_image' );
		register_setting( 'easy-testimonials-settings-group', 'meta_data_position' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_custom_css' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_disable_cycle2' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_use_cycle_fix' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_apply_content_filter' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_mystery_man' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_image_size' );
		register_setting( 'easy-testimonials-settings-group', 'ezt_testimonials_shortcode' );
		register_setting( 'easy-testimonials-settings-group', 'ezt_single_testimonial_shortcode' );
		register_setting( 'easy-testimonials-settings-group', 'ezt_submit_testimonial_shortcode' );
		register_setting( 'easy-testimonials-settings-group', 'ezt_cycle_testimonial_shortcode_shortcode' );
		register_setting( 'easy-testimonials-settings-group', 'ezt_random_testimonial_shortcode' );
		
		register_setting( 'easy-testimonials-settings-group', 'easy_t_registered_name' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_registered_first_name' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_registered_last_name' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_registered_url' );
		register_setting( 'easy-testimonials-settings-group', 'easy_t_registered_key' );
		
		register_setting( 'easy-testimonials-style-settings-group', 'testimonials_style' );
		
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_title_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_title_field_description' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_name_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_name_field_description' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_position_web_other_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_position_web_other_field_description' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_body_content_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_body_content_field_description' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_submit_button_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_submit_success_message' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_submit_notification_address' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_hide_position_web_other_field' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_hide_name_field' );		
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_use_captcha' );	
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_image_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_image_field_description' );	
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_use_image_field' );	
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_captcha_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_captcha_field_description' );	
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_rating_field_label' );
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_rating_field_description' );	
		register_setting( 'easy-testimonials-submission_form_options-settings-group', 'easy_t_use_rating_field' );	
		
		register_setting( 'easy-testimonials-import-export-settings-group', 'easy_t_hello_t_json_url' );		
		register_setting( 'easy-testimonials-import-export-settings-group', 'easy_t_hello_t_enable_cron' );	
		
		register_setting( 'easy-testimonials-private-settings-group', 'easy_t_hello_t_last_time' );
	}
	
	//function to produce tabs on admin screen
	function easy_t_admin_tabs($current = 'homepage' ) {
	
		$tabs = array( 	'easy-testimonials-settings' => __('Basic Options', $this->textdomain), 
						'easy-testimonials-style-settings' => __('Style & Theming Options', $this->textdomain),
						'easy-testimonials-submission-settings' => __('Submission Form Options', $this->textdomain),
						'easy-testimonials-shortcode-generator' => __('Shortcode Generator', $this->textdomain),
						'easy-testimonials-import-export' => __('Import & Export Testimonials', $this->textdomain),
						'easy-testimonials-help' => __('Help & Instructions', $this->textdomain)
					);
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
			foreach( $tabs as $tab => $name ){
				$class = ( $tab == $current ) ? ' nav-tab-active' : '';
				echo "<a class='nav-tab$class' href='?page=$tab'>$name</a>";
			}
		echo '</h2>';
	}
	
	function settings_page_top(){
		$title = "Easy Testimonials Settings";
		$message = "Easy Testimonials Settings Updated.";
		
		global $pagenow;
	?>
	<?php if(isValidKey()): ?>	
	<div class="wrap easy_testimonials_admin_wrap">
	<?php else: ?>
	<div class="wrap easy_testimonials_admin_wrap not-pro">			
	<?php endif; ?>
		<h2><?php echo $title; ?></h2>
		<style type="text/css">			
			fieldset {
				border: 1px solid #ccc !important;
				display: block;
				margin: 20px 0 !important;
				padding: 0 20px !important;
			}
			
			fieldset legend{
				font-size: 18px;
				font-weight: bold;
			}
		</style>
		<?php if(!isValidKey()): ?>		
			<?php 
				echo '<div class="updated" style="padding-top:10px;">'; 
					printf('<h3><strong>Do you need more Testimonials? Try Hello Testimonials Now!</strong></h3>
						<p>Hello Testimonials is a new product from the makers of this plugin that helps you collect new testimonials automatically from each of your new customers.</p><p>Of course, it integrates seamlessly with Easy Testimonials, so as you collect new testimonials they\'ll automatically appear on your website.</p><p><a class="smallBlueButton" href="http://hellotestimonials.com/p/welcome-easy-testimonials-users/" title="Click Here Start Your 14-Day Free Trial!">Click Here Start Your 14-Day Free Trial!</a></p><br/>');
				echo "</div>";
			?>
				<div id="signup_wrapper">
					<div id="mc_embed_signup">
						<form action="http://illuminatikarate.us2.list-manage.com/subscribe/post?u=403e206455845b3b4bd0c08dc&amp;id=a70177def0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<p class="special-offer green_bg">Special Offer:</p>
							<h3>Save 20% on Easy Testimonials PRO</h3>
							<p class="explain">Submit your name and email and we'll send you a coupon for 20% off your upgrade to the PRO version.</p>
							<label for="mce-EMAIL">Your Email:</label>
							<input type="email" id="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your Email" required>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;"><input type="text" name="b_403e206455845b3b4bd0c08dc_6ad78db648" tabindex="-1" id=""></div>
							<div class="clear"><input type="submit" value="Send Me The Coupon" name="subscribe" id="mc-embedded-subscribe" class="button"></div>	
							<p class="respect">
								<em>We respect your privacy.</em>		
							</p>
							<div class="customer_testimonial">
								<div class="stars">
									<span class="dashicons dashicons-star-filled"></span>
									<span class="dashicons dashicons-star-filled"></span>
									<span class="dashicons dashicons-star-filled"></span>
									<span class="dashicons dashicons-star-filled"></span>
									<span class="dashicons dashicons-star-filled"></span>
								</div>
								“Tried and is great. This is light and has all the features I need and more! Awesome!”
								<p class="author">&mdash; davidwalt  <a href="https://wordpress.org/support/topic/excellent-plugin-941" target="_blank">via WordPress.org</a></p>
							</div>
						</form>
					</div>
					<p class="u_to_p"><a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=themes">Upgrade to Easy Testimonials Pro now</a> to remove banners like this one.</p>
				</div>
		<?php endif; ?>
		
		<?php if (isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true') : ?>
		<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
		<?php endif;
		
		$this->get_and_output_current_tab($pagenow);
	}
	
	function get_and_output_current_tab($pagenow){
		$tab = $_GET['page'];
		
		$this->easy_t_admin_tabs($tab); 
				
		return $tab;
	}
	
	function basic_settings_page(){	
		$this->settings_page_top();
		
		?><form method="post" action="options.php"><?php
		
		settings_fields( 'easy-testimonials-settings-group' ); ?>			
			
			<h3>Basic Options</h3>
			
			<p>Use the below options to control various bits of output.</p>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label>Testimonials Style</a></th>
					<td><p class="description">Our Theme Options have moved!  <a href="?page=easy-testimonials-style-settings">Click here to view the new tab</a>.</p></td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_custom_css">Custom CSS</a></th>
					<td><textarea name="easy_t_custom_css" id="easy_t_custom_css" style="width: 250px; height: 250px;"><?php echo get_option('easy_t_custom_css'); ?></textarea>
					<p class="description">Input any Custom CSS you want to use here.  The plugin will work without you placing anything here - this is useful in case you need to edit any styles for it to work with your theme, though.<br/> For a list of available classes, click <a href="http://goldplugins.com/documentation/easy-testimonials-documentation/html-css-information-for-easy-testimonials/" target="_blank">here</a>.</p></td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="testimonials_link">Testimonials View More Link</label></th>
					<td><input type="text" name="testimonials_link" id="testimonials_link" value="<?php echo get_option('testimonials_link'); ?>"  style="width: 250px" />
					<p class="description">This is the URL of the 'View More' Link.  If not set, no View More Link is output.  If set, View More Link will be output next to testimonial that will go to this page.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="testimonials_image">Show Testimonial Image</label></th>
					<td><input type="checkbox" name="testimonials_image" id="testimonials_image" value="1" <?php if(get_option('testimonials_image')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, the Image will be shown next to the Testimonial.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_image_size">Testimonial Image Size</a></th>
					<td>
						<select name="easy_t_image_size" id="easy_t_image_size">	
							<?php easy_t_output_image_options(); ?>
						</select>
						<p class="description">Select which size image to display with your Testimonials.  Defaults to 50px X 50px.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_mystery_man">Use Mystery Man</label></th>
					<td><input type="checkbox" name="easy_t_mystery_man" id="easy_t_mystery_man" value="1" <?php if(get_option('easy_t_mystery_man')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, we and you are displaying Testimonial Images, the Mystery Man avatar will be used for any missing images.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="meta_data_position">Show Testimonial Info Above Testimonial</label></th>
					<td><input type="checkbox" name="meta_data_position" id="meta_data_position" value="1" <?php if(get_option('meta_data_position')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, the Testimonial Custom Fields will be displayed Above the Testimonial.  Defaults to Displaying Below the Testimonial.  Note: the Testimonial Image will be displayed to the left of this information.  NOTE: Checking this may have adverse affects on certain Styles.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_disable_cycle2">Disable Cycle2 Output</label></th>
					<td><input type="checkbox" name="easy_t_disable_cycle2" id="easy_t_disable_cycle2" value="1" <?php if(get_option('easy_t_disable_cycle2')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, we won't include the Cycle2 JavaScript file.  If you suspect you are having JavaScript compatibility issues with our plugin, please try checking this box.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_use_cycle_fix">Use Cycle Fix</label></th>
					<td><input type="checkbox" name="easy_t_use_cycle_fix" id="easy_t_use_cycle_fix" value="1" <?php if(get_option('easy_t_use_cycle_fix')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, we will try and trigger Cycle2 a different way.  If you suspect you are having JavaScript compatibility issues with our plugin, please try checking this box.  NOTE: If you have Disable Cycle2 Output checked, this box will have no effect.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_apply_content_filter">Apply The Content Filter</label></th>
					<td><input type="checkbox" name="easy_t_apply_content_filter" id="easy_t_apply_content_filter" value="1" <?php if(get_option('easy_t_apply_content_filter')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, we will apply the content filter to Testimonial content.  Use this if you are experiencing problems with other plugins applying their shortcodes, etc, to your Testimonial content.</p>
					</td>
				</tr>
			</table>

			<h3>Shortcode Options</h3>
			<p class="description">Use these fields to control our registered shortcodes.  If you are experiencing issues where our shortcodes do not display at all, you can try changing them here.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="ezt_random_testimonial_shortcode">Random Testimonial Shortcode</label></th>
					<td><input type="text" name="ezt_random_testimonial_shortcode" id="ezt_random_testimonial_shortcode" value="<?php echo get_option('ezt_random_testimonial_shortcode', 'random_testimonial'); ?>"  style="width: 250px" />
					<p class="description">This is the shortcode for displaying random testimonials.  If you suspect you are having compatibility issues with shortcodes already registered by your theme or other plugins, try changing this value and any corresponding shortcodes you are using on your site.</p>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="ezt_single_testimonial_shortcode">Single Testimonial Shortcode</label></th>
					<td><input type="text" name="ezt_single_testimonial_shortcode" id="ezt_single_testimonial_shortcode" value="<?php echo get_option('ezt_single_testimonial_shortcode', 'single_testimonial'); ?>"  style="width: 250px" />
					<p class="description">This is the shortcode for displaying a single testimonial.  If you suspect you are having compatibility issues with shortcodes already registered by your theme or other plugins, try changing this value and any corresponding shortcodes you are using on your site.</p>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="ezt_testimonials_shortcode">Testimonials List Shortcode</label></th>
					<td><input type="text" name="ezt_testimonials_shortcode" id="ezt_testimonials_shortcode" value="<?php echo get_option('ezt_testimonials_shortcode', 'testimonials'); ?>"  style="width: 250px" />
					<p class="description">This is the shortcode for displaying a list of testimonials.  If you suspect you are having compatibility issues with shortcodes already registered by your theme or other plugins, try changing this value and any corresponding shortcodes you are using on your site.</p>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="ezt_cycle_testimonial_shortcode">Testimonials Cycle Shortcode</label></th>
					<td><input type="text" name="ezt_cycle_testimonial_shortcode" id="ezt_cycle_testimonial_shortcode" value="<?php echo get_option('ezt_cycle_testimonial_shortcode', 'testimonials_cycle'); ?>"  style="width: 250px" />
					<p class="description">This is the shortcode for displaying cycled testimonials.  If you suspect you are having compatibility issues with shortcodes already registered by your theme or other plugins, try changing this value and any corresponding shortcodes you are using on your site.</p>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="ezt_submit_testimonial_shortcode">Testimonial Submission Form Shortcode</label></th>
					<td><input type="text" name="ezt_submit_testimonial_shortcode" id="ezt_submit_testimonial_shortcode" value="<?php echo get_option('ezt_submit_testimonial_shortcode', 'submit_testimonial'); ?>"  style="width: 250px" />
					<p class="description">This is the shortcode for displaying the testimonial submission form.  If you suspect you are having compatibility issues with shortcodes already registered by your theme or other plugins, try changing this value and any corresponding shortcodes you are using on your site.</p>
					</td>
				</tr>
			</table>
			
			<?php include('registration_options.php'); ?>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		</div><?php 
	}
		
	function style_settings_page(){
		$this->settings_page_top();
		?><form method="post" action="options.php"><?php
		
		if(!isValidKey()): ?>
			<p><a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=themes"><?php _e('Upgrade to Easy Testimonials Pro now');?></a> <?php _e('and get access to new features and settings.');?> </p>
		<?php endif; ?>
				
		<?php settings_fields( 'easy-testimonials-style-settings-group' ); ?>	
		
		<h3>Style &amp; Theme Options</h3>
		
		<p class="description">Select which style you want to use.  If 'No Style' is selected, only your Theme's CSS, and any Custom CSS you've added, will be used.</p>
				
		<table class="form-table easy_t_options">
			<tr valign="top">
				<td>
					<h4>Standard Themes</h4>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="default_style" value="default_style" <?php if(get_option('testimonials_style') == "default_style"): echo 'checked="CHECKED"'; endif; ?>><label for="default_style">Default Style<br/><img src="<?php echo plugins_url('img/easy-t-default-style.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="dark_style" value="dark_style" <?php if(get_option('testimonials_style') == "dark_style"): echo 'checked="CHECKED"'; endif; ?>><label for="dark_style">Dark Style<br/><img src="<?php echo plugins_url('img/easy-t-dark-style.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="light_style" value="light_style" <?php if(get_option('testimonials_style') == "light_style"): echo 'checked="CHECKED"'; endif; ?>><label for="light_style">Light Style<br/><img src="<?php echo plugins_url('img/easy-t-light-style.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="clean_style" value="clean_style" <?php if(get_option('testimonials_style') == "clean_style"): echo 'checked="CHECKED"'; endif; ?>><label for="clean_style">Clean Style<br/><img src="<?php echo plugins_url('img/easy-t-clean-style.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="no_style" value="no_style" <?php if(get_option('testimonials_style') == "no_style"): echo 'checked="CHECKED"'; endif; ?>><label for="no_style">No Style<br/><img src="<?php echo plugins_url('img/easy-t-no-style.png', __FILE__); ?>"/></label></p>
				</td>
			</tr>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
		
		<h3>Pro Themes</h3>
		<?php if(!isValidKey()): ?><p class="plugin_is_not_registered">✘ Your plugin is not registered and activated. You will not be able to use the PRO features until you upgrade. <a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=themes" target="_blank">Click here</a> to upgrade today!</p><?php endif; ?>
				
		<table class="form-table easy_t_options">
			<tr valign="top">
				<td>
					<h4>Card Theme</h4>
					<p class="ezt_theme_description">This theme is designed to look best with Testimonial Image Size set to 150x150, Use Mystery Man enabled, Publication Date being shown, and Ratings displayed as Stars.  For example, <code>[random_testimonial show_thumbs='1' show_rating='stars' show_date='1']</code>.</p>
					<!-- card style with avatar on the left -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="card_style" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="card_style" <?php if(get_option('testimonials_style') == "card_style"): echo 'checked="CHECKED"'; endif; ?>><label for="card_style">Card Theme - Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-card-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="card_style-salmon" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="card_style-salmon" <?php if(get_option('testimonials_style') == "card_style-salmon"): echo 'checked="CHECKED"'; endif; ?>><label for="card_style-salmon">Card Theme - Salmon<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-card-salmon.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="card_style-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="card_style-orange" <?php if(get_option('testimonials_style') == "card_style-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="card_style-orange">Card Theme - Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-card-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="card_style-purple" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="card_style-purple" <?php if(get_option('testimonials_style') == "card_style-purple"): echo 'checked="CHECKED"'; endif; ?>><label for="card_style-purple">Card Theme - Purple<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-card-purple.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="card_style-slate" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="card_style-slate" <?php if(get_option('testimonials_style') == "card_style-slate"): echo 'checked="CHECKED"'; endif; ?>><label for="card_style-slate">Card Theme - Slate<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-card-slate.png', __FILE__); ?>"/></label></p>
					<h4>Elegant Theme</h4>
					<p class="ezt_theme_description">This theme is designed to look best with Testimonial Image Size set to 150x150, Use Mystery Man enabled, Publication Date being shown, and Ratings displayed as Stars.  For example, <code>[random_testimonial show_thumbs='1' show_rating='stars' show_date='1']</code>.</p>
					<!-- elegant style with avatar in the center -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="elegant_style-graphite" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="elegant_style-graphite" <?php if(get_option('testimonials_style') == "elegant_style-graphite"): echo 'checked="CHECKED"'; endif; ?>><label for="elegant_style-graphite">Elegant Theme - Graphite<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-elegant-graphite.png', __FILE__); ?>"/></label></p>
					
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="elegant_style-salmon" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="elegant_style-salmon" <?php if(get_option('testimonials_style') == "elegant_style-salmon"): echo 'checked="CHECKED"'; endif; ?>><label for="elegant_style-salmon">Elegant Theme - Salmon<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-elegant-salmon.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="elegant_style-sky_blue" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="elegant_style-sky_blue" <?php if(get_option('testimonials_style') == "elegant_style-sky_blue"): echo 'checked="CHECKED"'; endif; ?>><label for="elegant_style-sky_blue">Elegant Theme - Sky Blue<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-elegant-sky-blue.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="elegant_style-smoke" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="elegant_style-smoke" <?php if(get_option('testimonials_style') == "elegant_style-smoke"): echo 'checked="CHECKED"'; endif; ?>><label for="elegant_style-smoke">Elegant Theme - Smoke<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-elegant-smoke.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="elegant_style-green_hills" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="elegant_style-green_hills" <?php if(get_option('testimonials_style') == "elegant_style-green_hills"): echo 'checked="CHECKED"'; endif; ?>><label for="elegant_style-green_hills">Elegant Theme - Green Hills<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-elegant-green-hills.png', __FILE__); ?>"/></label></p>
					<h4>Notepad Theme</h4>
					<p class="ezt_theme_description">This theme is designed to look best with Testimonial Image Size set to 150x150, Use Mystery Man enabled, Publication Date being shown, and Ratings displayed after the Testimonial.  For example, <code>[random_testimonial show_thumbs='1' show_rating='after' show_date='1']</code>.</p>
					<!-- notepad style with avatar on the left, partially rotated -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="notepad_style-stone" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="notepad_style-stone" <?php if(get_option('testimonials_style') == "notepad_style-stone"): echo 'checked="CHECKED"'; endif; ?>><label for="notepad_style-stone">Notepad Theme - Stone<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-notepad-grey-sky.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="notepad_style-sea_blue" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="notepad_style-sea_blue" <?php if(get_option('testimonials_style') == "notepad_style-sea_blue"): echo 'checked="CHECKED"'; endif; ?>><label for="notepad_style-sea_blue">Notepad Theme - Sea Blue<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-notepad-sea-blue.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="notepad_style-forest_green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="notepad_style-forest_green" <?php if(get_option('testimonials_style') == "notepad_style-forest_green"): echo 'checked="CHECKED"'; endif; ?>><label for="notepad_style-forest_green">Notepad Theme - Forest Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-notepad-forest-green.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="notepad_style-red_rock" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="notepad_style-red_rock" <?php if(get_option('testimonials_style') == "notepad_style-red_rock"): echo 'checked="CHECKED"'; endif; ?>><label for="notepad_style-red_rock">Notepad Theme - Red Rock<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-notepad-red-rock.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="notepad_style-purple_gems" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="notepad_style-purple_gems" <?php if(get_option('testimonials_style') == "notepad_style-purple_gems"): echo 'checked="CHECKED"'; endif; ?>><label for="notepad_style-purple_gems">Notepad Theme - Purple Gems<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-notepad-purple-gems.png', __FILE__); ?>"/></label></p>
					<h4>Business Theme</h4>
					<p class="ezt_theme_description">This theme is designed to look best with Testimonial Image Size set to 150x150, Use Mystery Man enabled, Publication Date being shown, and Ratings displayed as Stars.  For example, <code>[random_testimonial show_thumbs='1' show_rating='stars' show_date='1']</code>.</p>
					<!-- business style with avatar on the left -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="business_style-stone" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="business_style-stone" <?php if(get_option('testimonials_style') == "business_style-stone"): echo 'checked="CHECKED"'; endif; ?>><label for="business_style-stone">Business Theme - Stone<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-business-stone.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="business_style-blue" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="business_style-blue" <?php if(get_option('testimonials_style') == "business_style-blue"): echo 'checked="CHECKED"'; endif; ?>><label for="business_style-blue">Business Theme - Blue<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-business-blue.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="business_style-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="business_style-green" <?php if(get_option('testimonials_style') == "business_style-green"): echo 'checked="CHECKED"'; endif; ?>><label for="business_style-green">Business Theme - Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-business-green.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="business_style-red" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="business_style-red" <?php if(get_option('testimonials_style') == "business_style-red"): echo 'checked="CHECKED"'; endif; ?>><label for="business_style-red">Business Theme - Red<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-business-red.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="business_style-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="business_style-grey" <?php if(get_option('testimonials_style') == "business_style-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="business_style-grey">Business Theme - Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-business-grey.png', __FILE__); ?>"/></label></p>
					<h4>Modern Theme</h4>
					<p class="ezt_theme_description">This theme is designed to look best with Testimonial Image Size set to 150x150, Use Mystery Man enabled, Publication Date being shown, and Ratings displayed as Stars.  For example, <code>[random_testimonial show_thumbs='1' show_rating='stars' show_date='1']</code>.</p>
					<!-- modern style with avatar at the bottom, centered -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="modern_style-concept" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="modern_style-concept" <?php if(get_option('testimonials_style') == "modern_style-concept"): echo 'checked="CHECKED"'; endif; ?>><label for="modern_style-concept">Modern Theme - Concept<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-modern-concept.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="modern_style-money" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="modern_style-money" <?php if(get_option('testimonials_style') == "modern_style-money"): echo 'checked="CHECKED"'; endif; ?>><label for="modern_style-money">Modern Theme - Money<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-modern-money.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="modern_style-digitalism" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="modern_style-digitalism" <?php if(get_option('testimonials_style') == "modern_style-digitalism"): echo 'checked="CHECKED"'; endif; ?>><label for="modern_style-digitalism">Modern Theme - Digitalism<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-modern-digitalism.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="modern_style-power" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="modern_style-power" <?php if(get_option('testimonials_style') == "modern_style-power"): echo 'checked="CHECKED"'; endif; ?>><label for="modern_style-power">Modern Theme - Power<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-modern-power.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="modern_style-sleek" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="modern_style-sleek" <?php if(get_option('testimonials_style') == "modern_style-sleek"): echo 'checked="CHECKED"'; endif; ?>><label for="modern_style-sleek">Modern Theme - Sleek<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-modern-sleek.png', __FILE__); ?>"/></label></p>
					<h4>Bubble Theme</h4>
					<!-- bubble style -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style" <?php if(get_option('testimonials_style') == "bubble_style"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style">Bubble Theme - Regular<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style-brown" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style-brown" <?php if(get_option('testimonials_style') == "bubble_style-brown"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style-brown">Bubble Theme - Brown<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-brown.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style-pink" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style-pink" <?php if(get_option('testimonials_style') == "bubble_style-pink"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style-pink">Bubble Theme - Pink<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-pink.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style-blue-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style-blue-orange" <?php if(get_option('testimonials_style') == "bubble_style-blue-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style-blue-orange">Bubble Theme - Blue Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-blue-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style-red-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style-red-grey" <?php if(get_option('testimonials_style') == "bubble_style-red-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style-red-grey">Bubble Theme - Red Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-red-grey.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="bubble_style-purple-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="bubble_style-purple-green" <?php if(get_option('testimonials_style') == "bubble_style-purple-green"): echo 'checked="CHECKED"'; endif; ?>><label for="bubble_style-purple-green">Bubble Theme - Purple Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-bubble-purple-green.png', __FILE__); ?>"/></label></p>
					<h4>Left Avatar - 150x150</h4>
					<!-- left avatar, 150x150 -->
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style" <?php if(get_option('testimonials_style') == "avatar-left-style"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style">Avatar Left Style<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-brown" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-brown" <?php if(get_option('testimonials_style') == "avatar-left-style-brown"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-brown">Avatar Left Theme - Brown<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-brown.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-pink" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-pink" <?php if(get_option('testimonials_style') == "avatar-left-style-pink"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-pink">Avatar Left Theme - Pink<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-pink.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-blue-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-blue-orange" <?php if(get_option('testimonials_style') == "avatar-left-style-blue-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-blue-orange">Avatar Left Theme - Blue Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-blue-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-red-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-red-grey" <?php if(get_option('testimonials_style') == "avatar-left-style-red-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-red-grey">Avatar Left Theme - Red Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-red-grey.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-purple-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-purple-green" <?php if(get_option('testimonials_style') == "avatar-left-style-purple-green"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-purple-green">Avatar Left Theme - Purple Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-purple-green.png', __FILE__); ?>"/></label></p>
					<h4>Left Avatar - 50x50</h4>
					<!-- left avatar, 50x50 -->                      
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50">Avatar Left Theme - 50x50<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50-brown" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50-brown" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50-brown"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50-brown">Avatar Left Theme - 50x50 - Brown<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-brown.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50-pink" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50-pink" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50-pink"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50-pink">Avatar Left Theme - 50x50 - Pink<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-pink.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50-blue-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50-blue-orange" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50-blue-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50-blue-orange">Avatar Left Theme - 50x50 - Blue Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-blue-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50-red-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50-red-grey" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50-red-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50-red-grey">Avatar Left Theme - 50x50 - Red Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-red-grey.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-left-style-50x50-purple-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-left-style-50x50-purple-green" <?php if(get_option('testimonials_style') == "avatar-left-style-50x50-purple-green"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-left-style-50x50-purple-green">Avatar Left Theme - 50x50 - Purple Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-left-small-purple-green.png', __FILE__); ?>"/></label></p>
					<h4>Right Avatar - 150x150</h4>
					<!-- right avatar, 150x150 -->                   
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style" <?php if(get_option('testimonials_style') == "avatar-right-style"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style">Avatar Right Style<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-brown" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-brown" <?php if(get_option('testimonials_style') == "avatar-right-style-brown"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-brown">Avatar Right Theme - Brown<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-brown.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-pink" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-pink" <?php if(get_option('testimonials_style') == "avatar-right-style-pink"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-pink">Avatar Right Theme - Pink<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-pink.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-blue-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-blue-orange" <?php if(get_option('testimonials_style') == "avatar-right-style-blue-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-blue-orange">Avatar Right Theme - Blue Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-blue-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-red-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-red-grey" <?php if(get_option('testimonials_style') == "avatar-right-style-red-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-red-grey">Avatar Right Theme - Red Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-red-grey.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-purple-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-purple-green" <?php if(get_option('testimonials_style') == "avatar-right-style-purple-green"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-purple-green">Avatar Right Theme - Purple Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-purple-green.png', __FILE__); ?>"/></label></p>
					<h4>Right Avatar - 50x50</h4>
					<!-- right avatar, 50x50 -->                     
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50">Avatar Right Theme - 50x50<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-regular.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50-brown" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50-brown" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50-brown"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50-brown">Avatar Right Theme - 50x50 - Brown<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-brown.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50-pink" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50-pink" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50-pink"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50-pink">Avatar Right Theme - 50x50 - Pink<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-pink.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50-blue-orange" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50-blue-orange" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50-blue-orange"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50-blue-orange">Avatar Right Theme - 50x50 - Blue Orange<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-blue-orange.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50-red-grey" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50-red-grey" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50-red-grey"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50-red-grey">Avatar Right Theme - 50x50 - Red Grey<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-red-grey.png', __FILE__); ?>"/></label></p>
					<p class="easy-t-radio-button"><input type="radio" name="testimonials_style" id="avatar-right-style-50x50-purple-green" <?php if(!isValidKey()): ?>disabled=DISABLED <?php endif; ?>	value="avatar-right-style-50x50-purple-green" <?php if(get_option('testimonials_style') == "avatar-right-style-50x50-purple-green"): echo 'checked="CHECKED"'; endif; ?>><label for="avatar-right-style-50x50-purple-green">Avatar Right Theme - 50x50 - Purple Green<?php if(!isValidKey()): ?><br/><em>Upgrade to Enable!</em><?php endif; ?><br/><img src="<?php echo plugins_url('img/easy-t-avatar-right-small-purple-green.png', __FILE__); ?>"/></label></p>
					<div style="clear:both;"></div>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	</div><?php 
	}
	
	function shortcode_generator_page() {
		$this->settings_page_top();
		$testimonial_categories = get_terms( 'easy-testimonial-category', 'orderby=title&hide_empty=0' );
		
		//array of free themes that are available
		$free_theme_array = array(
			'default_style' => 'Default Style',
			'dark_style' => 'Dark Style',
			'light_style' => 'Light Style',
			'blue_style' => 'Blue Style',
			'clean_style' => 'Clean Style',
			'no_style' => 'No Style'
		);
		
		//array of pro themes that are available
		$pro_theme_array = array(
			'bubble_style' => 'Bubble Style',
			'bubble_style-brown' => 'Bubble Style - Brown',
			'bubble_style-pink' => 'Bubble Style - Pink',
			'bubble_style-blue-orange' => 'Bubble Style - Blue Orange',
			'bubble_style-red-grey' => 'Bubble Style - Red Grey',
			'bubble_style-purple-green' => 'Bubble Style - Purple Green',
			'avatar-left-style' => 'Avatar Left Style',
			'avatar-left-style-blue-orange' => 'Avatar Left Style - Blue Orange',
			'avatar-left-style-pink' => 'Avatar Left Style - Pink',
			'avatar-left-style-brown' => 'Avatar Left Style - Brown',
			'avatar-left-style-red-grey' => 'Avatar Left Style - Red Grey',
			'avatar-left-style-purple-green' => 'Avatar Left Style - Purple Green',
			'avatar-left-style-50x50' => 'Avatar Left 50x50 Style',
			'avatar-left-style-50x50-blue-orange' => 'Avatar Left 50x50 Style - Blue Orange',
			'avatar-left-style-50x50-brown' => 'Avatar Left 50x50 Style - Brown',
			'avatar-left-style-50x50-pink' => 'Avatar Left 50x50 Style - Pink',
			'avatar-left-style-50x50-purple-green' => 'Avatar Left 50x50 Style - Purple Green',
			'avatar-left-style-50x50-red-grey' => 'Avatar Left 50x50 Style - Red Grey',
			'avatar-right-style' => 'Avatar Right Style',
			'avatar-right-style-blue-orange' => 'Avatar Right Style - Blue Orange',
			'avatar-right-style-pink' => 'Avatar Right Style - Pink',
			'avatar-right-style-brown' => 'Avatar Right Style - Brown',
			'avatar-right-style-red-grey' => 'Avatar Right Style - Red Grey',
			'avatar-right-style-purple-green' => 'Avatar Right Style - Purple Green',
			'avatar-right-style-50x50' => 'Avatar Right 50x50 Style',
			'avatar-right-style-50x50-blue-orange' => 'Avatar Right 50x50 Style - Blue Orange',
			'avatar-right-style-50x50-brown' => 'Avatar Right 50x50 Style - Brown',
			'avatar-right-style-50x50-pink' => 'Avatar Right 50x50 Style - Pink',
			'avatar-right-style-50x50-purple-green' => 'Avatar Right 50x50 Style - Purple Green',
			'avatar-right-style-50x50-red-grey' => 'Avatar Right 50x50 Style - Red Grey',
			'card_style' => 'Card Style',
			'card_style-salmon' => 'Card Style - Salmon',
			'card_style-orange' => 'Card Style - Orange',
			'card_style-purple' => 'Card Style - Purple',
			'card_style-slate' => 'Card Style - Slate',
			'elegant_style-sky_blue' => 'Elegant Style - Sky Blue',
			'elegant_style-graphite' => 'Elegant Style - Graphite',
			'elegant_style-green_hills' => 'Elegant Style - Green Hills',
			'elegant_style-salmon' => 'Elegant Style - Salmon',
			'elegant_style-smoke' => 'Elegant Style - Smoke',
			'notepad_style-stone' => 'Notepad Style - Stone',
			'notepad_style-sea_blue' => 'Notepad Style - Sea Blue',
			'notepad_style-forest_green' => 'Notepad Style - Forest Green',
			'notepad_style-red_rock' => 'Notepad Style - Red Rock',
			'notepad_style-purple_gems' => 'Notepad Style - Purple Gems',
			'business_style-stone' => 'Business Style - Stone',
			'business_style-blue' => 'Business Style - Blue',
			'business_style-green' => 'Business Style - Green',
			'business_style-red' => 'Business Style - Red',
			'business_style-grey' => 'Business Style - Grey',
			'modern_style-concept' => 'Modern Style - Concept',
			'modern_style-money' => 'Modern Style - Money',
			'modern_style-digitalism' => 'Modern Style - Digitalism',
			'modern_style-power' => 'Modern Style - Power',
			'modern_style-sleek' => 'Modern Style - Sleek'
		);
		
		?>
		
		<h3>Shortcode Generator</h3>
		
		<p>Select the options you'd like, and then click the Generate button. You'll get a shortcode that you can copy and paste into any post or page.</p>
		<p>This generator will create a shortcode for displaying a list of testimonials or a testimonial slider.  Also available is the <code>[single_testimonial]</code> shortcode, for displaying a specific Testimonial.  <a href="http://goldplugins.com/documentation/easy-testimonials-documentation/easy-testimonials-installation-and-usage-instructions/" target="_blank">Click here</a> for more information.</p>
		
		<form id="easy_t_shortcode_generator">
			<table class="form-table">
				<tbody>						
					<tr>
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_count">Count</label>
							</div>
						</th>
						<td>
							<input type="text" class="valid_int" id="sc_gen_count" value="5" />
							<p class="description">How many testimonials would you like to show?</p>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_order_by">Order By</label>
							</div>
						</th>
						<td>
							<div class="inline-select-wrapper">
								<select id="sc_gen_order_by">
									<option value="rand">Random</option>
									<option value="id">ID</option>
									<option value="author">Author</option>
									<option value="title">Title</option>
									<option value="name">Name</option>
									<option value="date">Date</option>
									<option value="modified">Last Modified</option>
									<option value="parent">Parent ID</option>								
								</select>
							</div>
							<div class="inline-select-wrapper">
								<select id="sc_gen_order_dir">
									<option value="asc">Ascending (ASC)</option>
									<option value="desc">Descending (DESC)</option>
								</select>
							</div>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_category">Filter By Category</label>
							</div>
						</th>
						<td>
							<select id="sc_gen_category">
								<option value="all">All Categories</option>
								<?php foreach($testimonial_categories as $cat):?>
								<option value="<?=$cat->slug?>"><?=htmlentities($cat->name)?></option>
								<?php endforeach; ?>
							</select>
							<p class="description"><a href="<?php echo admin_url('edit-tags.php?taxonomy=easy-testimonial-category&post_type=testimonial'); ?>">Manage Testimonial Categories</a></p>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Title
						</th>
						<td>
							<div class="sc_gen_control_group">
								<label for="sc_gen_show_title">
									<input type="checkbox" class="checkbox" id="sc_gen_show_title" value="yes" />
									Show the titles?
								</label>
							</div>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Testimonial Length
						</th>
						<td>
							<div class="sc_gen_control_group sc_gen_control_group_radio">
								<label title="Use an excerpt for long testimonials">
									<input type="radio" value="yes" id="sc_gen_use_excerpt_yes" name="sc_gen_use_excerpt" checked="checked">
									<span>Use an excerpt for long testimonials</span>
								</label>
								<label title="Always display Testimonials at their full length">
									<input type="radio" value="no" id="sc_gen_use_excerpt_no" name="sc_gen_use_excerpt">
									<span>Always display Testimonials at their full length</span>
								</label>
							</div>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Featured Images
						</th>
						<td>							
							<div class="sc_gen_control_group">
								<label for="sc_gen_show_thumbs">
									<input type="checkbox" class="checkbox" id="sc_gen_show_thumbs" value="yes" />
									Show Featured Images?
								</label>
							</div>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Show Publication Date
						</th>
						<td>							
							<div class="sc_gen_control_group">
								<label for="sc_gen_show_date">
									<input type="checkbox" class="checkbox" id="sc_gen_show_date" value="yes" />
									Show Publication Date?
								</label>
							</div>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Ratings
						</th>
						<td>
							<div class="sc_gen_control_group sc_gen_control_group_radio">
								<label title="Hide Ratings">
									<input type="radio" value="hide" id="sc_gen_show_ratings_hide" name="sc_gen_show_ratings" checked="checked">
									<span>Hide Ratings</span>
								</label>
								<label title="Show Rating Before Testimonial">
									<input type="radio" value="before" id="sc_gen_show_ratings_before" name="sc_gen_show_ratings">
									<span>Show Rating Before The Testimonial</span>
								</label>
								<label title="Show Rating After Testimonial">
									<input type="radio" value="after" id="sc_gen_show_ratings_after" name="sc_gen_show_ratings">
									<span>Show Rating After The Testimonial</span>
								</label>
								<label title="Show Rating As Stars">
									<input type="radio" value="stars" id="sc_gen_show_ratings_stars" name="sc_gen_show_ratings">
									<span>Show Rating As Stars</span>
								</label>
							</div>
						</td>
					</tr>	

					<tr>
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_theme">Select A Theme</label>
							</div>
						</th>
						<td>
							<select id="sc_gen_theme">
								<optgroup label="Free Options">
									<?php foreach($free_theme_array as $theme_slug => $theme_name): ?>
									<option value="<?php echo $theme_slug; ?>" <?php if(get_option('testimonials_style', 'default_style') == $theme_slug){ ?> selected="selected" <?php } ?>><?php echo $theme_name; ?></option>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="PRO Options">		
									<?php foreach($pro_theme_array as $theme_slug => $theme_name): ?>
									<option <?php if(!isValidKey()): ?>disabled="disabled" <?php endif; ?>value="<?php echo $theme_slug; ?>" <?php if(get_option('testimonials_style', 'default_style') == $theme_slug){ ?> selected="selected" <?php } ?>><?php echo $theme_name; ?></option>
									<?php endforeach; ?>	
								</optgroup>
							</select>
							<?php if(!isValidKey()): ?>
							<p class="description"><a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=themes">Upgrade To Unlock All The Themes</a></p>
							<?php endif; ?>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							Pagination
						</th>
						<td>
							<div class="sc_gen_control_group">
								<label for="sc_gen_paginate">
									<input type="checkbox" class="checkbox" id="sc_gen_paginate" value="yes" />
									Paginate the Testimonials?
								</label>
							</div>
						</td>
					</tr>		
				
					<tr class="pagination_option">
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_num_per_page">Testimonials Per Page</label>
							</div>
						</th>
						<td>
							<input type="text" class="valid_int" id="sc_gen_num_per_page" value="4" />
							<p class="description">The number of Testimonials to show per page.</p>
						</td>
					</tr>	
					
					<tr>
						<th scope="row">
							Testimonial Slider
						</th>
						<td>							
							<div class="sc_gen_control_group">
								<label for="sc_gen_use_slider">
									<input type="checkbox" class="checkbox" id="sc_gen_use_slider" value="yes" />
									Output your testimonials in a slider?
								</label>
							</div>
						</td>
					</tr>					

					<tr class="slider_option">
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_transition">Select A Transition</label>
							</div>
						</th>
						<td>
							<select id="sc_gen_transition">
								<optgroup label="Standard Options">
									<option value="fade">Fade</option>
									<option value="fadeout">Fade Out</option>
									<option value="none">None</option>
								</optgroup>
								<optgroup label="PRO Options">								
									<?php if(!isValidKey()): ?>
									<option value="scrollVert" disabled="disabled">Scroll (Vertical)</option>
									<option value="scrollHorz" disabled="disabled">Scroll (Horizontal)</option>
									<option value="fadeIn" disabled="disabled">Fade In</option>
									<option value="fadeOut" disabled="disabled">Fade Out</option>
									<option value="flipHorz" disabled="disabled">Flip (Horizontal)</option>
									<option value="flipVert" disabled="disabled">Flip (Vertical)</option>
									<option value="tileSlide" disabled="disabled">Slide</option>
									<?php else: ?>
									<option value="scrollVert">Scroll (Vertical)</option>
									<option value="scrollHorz">Scroll (Horizontal)</option>
									<option value="fadeIn">Fade In</option>
									<option value="fadeOut">Fade Out</option>
									<option value="flipHorz">Flip (Horizontal)</option>
									<option value="flipVert">Flip (Vertical)</option>
									<option value="tileSlide">Slide</option>
									<?php endif; ?>
								</optgroup>
							</select>
							<?php if(!isValidKey()): ?>
							<p class="description"><a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=transitions">Upgrade To Unlock All The Transitions</a></p>
							<?php endif; ?>
						</td>
					</tr>
				
					<tr class="slider_option">
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_slider_timer">Time Between Slides</label>
							</div>
						</th>
						<td>
							<input type="text" class="valid_int" id="sc_gen_slider_timer" value="4" />
							<p class="description">The number of seconds to pause on each Testimonial</p>
						</td>
					</tr>
					
					<tr class="slider_option">
						<th scope="row">
							<div class="sc_gen_control_group">
								<label for="sc_gen_slider_testimonials_per_slide">Testimonials Per Slide</label>
							</div>
						</th>
						<td>
							<input type="text" class="valid_int" id="sc_gen_slider_testimonials_per_slide" value="1" />
							<p class="description">The number of Testimonials to show on each slide</p>
						</td>
					</tr>			
					

					<tr class="slider_option">
						<th scope="row">
							Show Pager
						</th>
						<td>							
							<div class="sc_gen_control_group">
								<label for="sc_gen_show_pager">
									<input type="checkbox" class="checkbox" id="sc_gen_show_pager" value="yes" />
									Show A Pager Below My Testimonials
								</label>
							</div>
						</td>
					</tr>
					
					<tr class="slider_option">
						<th scope="row">
							Auto Fit Container
						</th>
						<td>							
							<div class="sc_gen_control_group">
								<label for="sc_gen_auto_fit_container">
									<input type="checkbox" class="checkbox" id="sc_gen_auto_fit_container" value="yes" />
									Automatically adjust the height of the slider to fit each testimonial
								</label>
							</div>
						</td>
					</tr>
					
				</tbody>
			</table>
			<p class="submit">
				<button id="sc_generate" class="button button-primary" type="button">Build My Shortcode!</button>
			</p>
			
			<div id="sc_gen_output_wrapper">
				<textarea id="sc_gen_output" rows="4" cols="80"></textarea>
			</div>
			
		</form>
		
		
		</div><?php 
	}
		
	function submission_settings_page(){
		$this->settings_page_top();
		?><form method="post" action="options.php">
		
		<?php if(!isValidKey()): ?>
			<p><a href="http://goldplugins.com/our-plugins/easy-testimonials-details/upgrade-to-easy-testimonials-pro/?utm_source=themes"><?php _e('Upgrade to Easy Testimonials Pro now');?></a> <?php _e('and get access to new features and settings.');?> </p>
		<?php endif; ?>
		
		<?php settings_fields( 'easy-testimonials-submission_form_options-settings-group' ); ?>		
		
		<h3>Submission Form Options</h3>
		
		<p>Use the below options to control the look and feel of the testimonial submission form.</p>
		
		<fieldset>
			<legend>Title Field:</legend>			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_title_field_label">"Title" Field Label</label></th>
					<td><input type="text" name="easy_t_title_field_label" id="easy_t_title_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_title_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the first field in the form, which defaults to "Title".  Contents of this field will be passed through to the Title field inside WordPress.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_title_field_description">"Title" Field Description</label></th>
					<td><input type="text" name="easy_t_title_field_description" id="easy_t_title_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_title_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the first field in the form.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Name Field:</legend>		
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_name_field_label">"Name" Field Label</label></th>
					<td><input type="text" name="easy_t_name_field_label" id="easy_t_name_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_name_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the second field in the form, which defaults to "Name."  Contents of this field will be passed through to the Name field inside WordPress.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_name_field_description">"Name" Field Description</label></th>
					<td><input type="text" name="easy_t_name_field_description" id="easy_t_name_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_name_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the name field.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_hide_name_field">Disable "Name" Field Display</label></th>
					<td><input type="checkbox" name="easy_t_hide_name_field" id="easy_t_hide_name_field" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="1" <?php if(get_option('easy_t_hide_name_field')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, the name field will not be displayed in the form .</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Position / Web Address / Other Field:</legend>			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_position_web_other_field_label">"Position / Web Address / Other" Field Label</label></th>
					<td><input type="text" name="easy_t_position_web_other_field_label" id="easy_t_position_web_other_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_position_web_other_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the third field in the form, which defaults to "Position / Web Address / Other."  Contents of this field will be passed through to the Position / Web Address / Other field inside WordPress.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_position_web_other_field_description">"Position / Web Address / Other" Field Description</label></th>
					<td><input type="text" name="easy_t_position_web_other_field_description" id="easy_t_position_web_other_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_position_web_other_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the third field in the form.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_hide_position_web_other_field">Disable "Position / Web Address / Other" Field Display</label></th>
					<td><input type="checkbox" name="easy_t_hide_position_web_other_field" id="easy_t_hide_position_web_other_field" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="1" <?php if(get_option('easy_t_hide_position_web_other_field')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, the third field in the form will not be displayed.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Body Content Field:</legend>			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_body_content_field_label">"Body Content" Field Label</label></th>
					<td><input type="text" name="easy_t_body_content_field_label" id="easy_t_body_content_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_body_content_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the fourth field in the form, a textarea, which defaults to "Body Content."  Contents of this field will be passed through to the Body field inside WordPress.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_body_content_field_description">Body Content Field Description</label></th>
					<td><input type="text" name="easy_t_body_content_field_description" id="easy_t_body_content_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_body_content_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the fourth field in the form, a textarea.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Submission Options</legend>
					
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_submit_button_label">Submit Button Label</label></th>
					<td><input type="text" name="easy_t_submit_button_label" id="easy_t_submit_button_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_submit_button_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the submit button at the bottom of the form.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_submit_success_message">Submission Success Message</label></th>
					<td><textarea name="easy_t_submit_success_message" id="easy_t_submit_success_message" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?>><?php echo get_option('easy_t_submit_success_message'); ?></textarea>
					<p class="description">This is the text that appears after a successful submission.</p>
					</td>
				</tr>
			</table>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_submit_notification_address">Submission Success Notification E-Mail Address</label></th>
					<td><input type="text" name="easy_t_submit_notification_address" id="easy_t_submit_notification_address" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_submit_notification_address'); ?>"  style="width: 250px" />
					<p class="description">If set, we will attempt to send an e-mail notification to this address upon a succesfull submission.  If not set, submission notifications will be sent to the site's Admin E-mail address.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Testimonial Image Field:</legend>
		
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_image_field_label">Testimonial Image Field Label</label></th>
					<td><input type="text" name="easy_t_image_field_label" id="easy_t_image_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_image_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the Testimonial Image Field in the form, which defaults to "Testimonial Image Field".</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_image_field_description">Testimonial Image Field Description</label></th>
					<td><input type="text" name="easy_t_image_field_description" id="easy_t_image_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_image_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the Testimonial Image Field in the form.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_use_image_field">Enable Testimonial Image on Submission Form</label></th>
					<td><input type="checkbox" name="easy_t_use_image_field" id="easy_t_use_image_field" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="1" <?php if(get_option('easy_t_use_image_field')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, users will be allowed to upload 1 image along with their Testimonial.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Testimonial Ratings Field:</legend>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_rating_field_label">Testimonial Ratings Field Label</label></th>
					<td><input type="text" name="easy_t_rating_field_label" id="easy_t_rating_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_rating_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the Testimonial Rating Field in the form, which defaults to "Your Rating".</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_rating_field_description">Testimonial Ratings Field Description</label></th>
					<td><input type="text" name="easy_t_rating_field_description" id="easy_t_rating_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_rating_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the Testimonial Rating Field in the form.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_use_rating_field">Enable Testimonial Ratings on Submission Form</label></th>
					<td><input type="checkbox" name="easy_t_use_rating_field" id="easy_t_use_rating_field" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="1" <?php if(get_option('easy_t_use_rating_field')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, users will be allowed to add a 1 - 5 out of 5 rating along with their Testimonial.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Captcha Field:</legend>
		
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_captcha_field_label">"Captcha" Field Label</label></th>
					<td><input type="text" name="easy_t_captcha_field_label" id="easy_t_captcha_field_label" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_captcha_field_label'); ?>"  style="width: 250px" />
					<p class="description">This is the label of the Capthca field in the form, which defaults to "Captcha".  Contents of this field will be passed through to the Captcha function inside WordPress.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_captcha_field_description">"Captcha" Field Description</label></th>
					<td><input type="text" name="easy_t_captcha_field_description" id="easy_t_captcha_field_description" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="<?php echo get_option('easy_t_captcha_field_description'); ?>"  style="width: 250px" />
					<p class="description">This is the description below the Captcha field in the form.</p>
					</td>
				</tr>
			</table>
						
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="easy_t_use_captcha">Enable Captcha on Submission Form</label></th>
					<td><input type="checkbox" name="easy_t_use_captcha" id="easy_t_use_captcha" <?php if(!isValidKey()): ?>disabled="disabled"<?php endif; ?> value="1" <?php if(get_option('easy_t_use_captcha')){ ?> checked="CHECKED" <?php } ?>/>
					<p class="description">If checked, and a compatible plugin is installed (such as <a href="https://wordpress.org/plugins/really-simple-captcha/" target="_blank">Really Simple Captcha</a>) then we will output a Captcha on the Submission Form.  This is useful if you are having SPAM problems.</p>
					</td>
				</tr>
			</table>
		</fieldset>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	</div><?php 
	}
	
	function help_settings_page(){
		$this->settings_page_top();
		include('pages/help.html');
	}	
	
	function import_export_settings_page(){				
		$this->settings_page_top();
		
		?><form method="post" action="options.php">
			<?php settings_fields( 'easy-testimonials-import-export-settings-group' ); ?>					
			
			<fieldset>
				<legend>Hello Testimonials Integration</legend>
				
				<p><strong>Want to learn more about Hello Testimonials? <a href="http://hellotestimonials.com/p/welcome-easy-testimonials-users/">Click Here!</a></strong></p>
				
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="easy_t_hello_t_json_url">Hello Testimonials JSON Feed URL</label></th>
						<td><textarea name="easy_t_hello_t_json_url" id="easy_t_hello_t_json_url" rows=1 style="width: 100%"><?php echo get_option('easy_t_hello_t_json_url'); ?></textarea>
						<p class="description">This is the JSON URL you copied from the Custom Integrations page inside Hello Testimonials.</p>
						</td>
					</tr>
				</table>
				
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="easy_t_hello_t_enable_cron">Enable Hello Testimonials Integration</label></th>
						<td><input type="checkbox" name="easy_t_hello_t_enable_cron" id="easy_t_hello_t_enable_cron" value="1" <?php if(get_option('easy_t_hello_t_enable_cron')){ ?> checked="CHECKED" <?php } ?>/>
						<p class="description">If checked, new Testimonials will be loaded from your Hello Testimonials account and automatically added to your Testimonials list.</p>
						</td>
					</tr>
				</table>
				
			</fieldset>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>	
			<p class="submit" style="margin-top:0;">
				<a href="?page=easy-testimonials-import-export&run-cron-now=true" class="button-primary" title="<?php _e('Import Testimonials Now') ?>"><?php _e('Import Testimonials Now') ?></a>
			</p>		
		</form>
		
		</div><?php 
		
		//schedule cron if enabled
		if(get_option('easy_t_hello_t_enable_cron', 0)){
			//and if the cron job hasn't already been scheduled
			if(!wp_get_schedule('hello_t_subscription')){
				//schedule the cron job
				hello_t_cron_activate();
			}
			
			//if the run cron now button has been clicked
			if (isset($_GET['run-cron-now']) && $_GET['run-cron-now'] == 'true'){
				//go ahead and add the testimonials, too
				add_hello_t_testimonials();
				
				echo '<div id="message" class="updated fade"><p>Success!  Your Testimonials have been imported!</p></div>';
			}
		} else {
			//else if the cron job option has been unchecked
			//clear the scheduled job
			hello_t_cron_deactivate();
			
			//if the run cron now button has been clicked
			if (isset($_GET['run-cron-now']) && $_GET['run-cron-now'] == 'true'){				
				echo '<div id="message" class="updated fade"><p>Hello Testimonials Integration is disabled!  Please enable to Import Testimonials.</p></div>';
			}
		}
	}	
} // end class
?>