<?php
/*
Plugin Name: SC Popup Subscriber
Version: 1.2
Description: Popup Subscriber form of Feedburner 
Author: Anas Mir
Author URI: http://sharp-coders.com/author/anasmir
Plugin URI: http://sharp-coders.com/plugins/wp-plugins/sc-popup-subscriber-form-wordpress-plugin
*/

/*Check Version*/
global $wp_version;
$exit_msg="WP Requires Latest version, Your version is old";
if(version_compare($wp_version, "3.0", "<"))
{
	exit($exit_msg);
}
if(!class_exists(SCPopupSubscriber)):
	class SCPopupSubscriber{
		function sc_popup_subscriber_form()
		{
			$settings = $this->get_sc_subscriber_form_options();
			?><div id="sc-modelbox-subscriber-bg"></div>
	<div id="mailing-list" class="sc-model-box wrapper"><div class="inside blue">
		<span class="sc-model-close black"><span>Close</span></span>
		<img src="<?php echo plugins_url( 'images/envelope.png' , __FILE__ ); ?>" />
		<div class="sc-model-heading"><?php echo stripslashes($settings["heading"]); ?></div>
		<p class="sc-model-detail"><?php echo stripslashes($settings["detail"]); ?></p><br />
		<form onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $settings["feedurl"]; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target='popupwindow' method='post' action='http://feedburner.google.com/fb/a/mailverify'>
		<input type='hidden' name='uri' value='<?php echo $settings["feedurl"]; ?>'><input type='hidden' value='en_US' name='loc'>
			<input type="text" name="email" value="yourname@email.com" onblur="if (this.value == ''){this.value = 'yourname@email.com';}" onfocus="if (this.value == 'yourname@email.com') {this.value = '';}" />
			<input type="submit" class="submit" value="Sign Up" />
		</form>
		<?php if($settings["credit"] == "yes"){?>
		<a class="sc-model-credit" href="http://sharp-coders.com/" target="_blank">by Sharp Coders</a>
		<?php } ?>
	</div>
	</div>
	<?php
	
		}

		function handle_sc_subscriber_form_options()
		{
			$settings = $this->get_sc_subscriber_form_options();
			if (isset($_POST['submitted']))
			{
				//check security
				check_admin_referer('sc-popup-subscriber-by-sharp-coders');
				
				$settings['enable'] = isset($_POST['enable'])? "yes" : "no" ;
				$settings['xday'] = isset($_POST['xday'])? intval($_POST['xday']) : 0 ;
				$settings['feedurl'] = isset($_POST['feedurl'])? htmlspecialchars($_POST['feedurl']) : "" ;
				$settings['heading'] = isset($_POST['heading'])? htmlspecialchars($_POST['heading']) : "" ;
				$settings['detail'] = isset($_POST['detail'])? htmlspecialchars($_POST['detail']) : "" ;
				$settings['credit'] = isset($_POST['credit'])? "yes" : "no" ;
				update_option("sc_popup_subscriber_form_options", serialize($settings));
				echo '<div class="updated fade"><p><strong>Setting Updated!</strong></p></div>';
			}
			$action_url = $_SERVER['REQUEST_URI'];
			include 'sc-popup-subscriber-options.php';
		}
		
		function sc_popup_subscriber_script() {
			wp_enqueue_script( 'jquery' );
		}
		function sc_popup_subscriber_HeadAction()
		{
			$settings = $this->get_sc_subscriber_form_options();
			if(strtolower($settings['enable']) == "yes"){
			?>
			<script type="text/javascript">
					jQuery(document).ready( function(){
							var xdays = <?php echo isset($settings['xday'])? $settings['xday']:0; ?>;
							if(readCookie("SCPopUpForm") == 0){
								jQuery("#sc-modelbox-subscriber-bg").css("display", "block");
								jQuery("div.sc-model-box").show();
							}else if(readCookie("SCPopUpForm") == 1 && xdays > 0){
								jQuery("#sc-modelbox-subscriber-bg").css("display", "none");
								jQuery("div.sc-model-box").hide();
							}else{
								jQuery("#sc-modelbox-subscriber-bg").css("display", "block");
								jQuery("div.sc-model-box").show();
							}
							jQuery("span.sc-model-close").click(function() {
								jQuery(this).parents("div.sc-model-box").fadeOut("slow");
								jQuery("#sc-modelbox-subscriber-bg").css("display", "none");
								createCookie("SCPopUpForm", "1", xdays);
							});
					});
					function createCookie(name,value,days) {
						if (days) {
							var date = new Date();
							date.setTime(date.getTime()+(days*24*60*60*1000));
							var expires = "; expires="+date.toGMTString();
						}
						else var expires = "";
						document.cookie = name+"="+value+expires+"; path=/";
					}

					function readCookie(name) {
						var nameEQ = name + "=";
						var ca = document.cookie.split(';');
						for(var i=0;i < ca.length;i++) {
							var c = ca[i];
							while (c.charAt(0)==' ') c = c.substring(1,c.length);
							if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
						}
						return null;
					}
				</script>
				<?php
				}
		}

		/**
		 * Enqueue plugin style-file
		 */
		function sc_popup_subscriber_stylesheet() {
			$settings = $this->get_sc_subscriber_form_options();
			if($settings['enable'] == "yes"){
				wp_register_style( 'sc-subscriber-form-style', plugins_url('sc-popup-subscriber-form.css', __FILE__) );
				wp_enqueue_style( 'sc-subscriber-form-style');
			}
		}
		
		function get_sc_subscriber_form_options()
		{
			$options = unserialize(get_option("sc_popup_subscriber_form_options"));
			return $options;
		}
		function sc_popup_subscriber_form_install()
		{
			$options = array(
				'enable' => 'yes',
				'xday' => '0',
				'feedurl' => 'sharp-coders',
				'heading' => 'Get our Newsletters',
				'detail' => "Receive The Latest Posts Directly To Your Email - It's Free!!",
				'credit' => 'yes'
			);
			add_option("sc_popup_subscriber_form_options", serialize($options));
		}
		function sc_popup_subscriber_form_admin_menu()
		{
			add_options_page('SC Popup Subscriber', 'SC Popup Subscriber', 8, basename(__FILE__), array(&$this, 'handle_sc_subscriber_form_options'));
		}
	}
else:
	exit('SCPopupSubscriber Already Exists');
endif;

$SCPopupSubscriber = new SCPopupSubscriber();
if(isset($SCPopupSubscriber)){
	register_activation_hook(__FILE__, array(&$SCPopupSubscriber, 'sc_popup_subscriber_form_install'));
	add_action( 'wp_enqueue_scripts', array(&$SCPopupSubscriber, 'sc_popup_subscriber_script') );
	add_filter('wp_head', array(&$SCPopupSubscriber, 'sc_popup_subscriber_HeadAction'));
	add_action('admin_menu', array(&$SCPopupSubscriber, 'sc_popup_subscriber_form_admin_menu'));
	add_action( 'wp_enqueue_scripts', array(&$SCPopupSubscriber, 'sc_popup_subscriber_stylesheet') );
	add_action('wp_footer', array(&$SCPopupSubscriber, 'sc_popup_subscriber_form'));
}


?>