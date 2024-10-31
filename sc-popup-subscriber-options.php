<style type="text/css">
a.company{
	text-decoration: none;
	font: 600 16px sens-sarif, arial, verdana;
	color: #ff2f2f;
}
select{
	padding: 3px;
	min-width: 70px;
}
input[type="text"]{
	width: 220px;
}
input,
textarea{
	outline: none;
}
.wp-social-box{
	float: left;
	width: 550px;
	background-color: whiteSmoke;
	background-image: -ms-linear-gradient(top,#F9F9F9,whiteSmoke);
	background-image: -moz-linear-gradient(top,#F9F9F9,whiteSmoke);
	background-image: -o-linear-gradient(top,#F9F9F9,whiteSmoke);
	background-image: -webkit-gradient(linear,left top,left bottom,from(#F9F9F9),to(whiteSmoke));
	background-image: -webkit-linear-gradient(top,#F9F9F9,whiteSmoke);
	background-image: linear-gradient(top,#F9F9F9,whiteSmoke);
	border-color: #DFDFDF;
	-moz-box-shadow: inset 0 1px 0 #fff;
	-webkit-box-shadow: inset 0 1px 0 white;
	box-shadow: inset 0 1px 0 white;
	-webkit-border-radius: 3px;
	webkit-border-radius: 3px;
	border-radius: 3px;
	border-width: 1px;
	border-style: solid;
	position: relative;
	margin-bottom: 20px;
	padding: 0;
	border-width: 1px;
	border-style: solid;
	line-height: 1;
	margin-left: 10px;
}
.wp-social-box h3 {
	font-size: 15px;
	font-weight: normal;
	padding: 7px 10px;
	margin: 0;
	line-height: 1;
	font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif;
	cursor: move;
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	color: #464646;
	border-bottom-color: #DFDFDF;
	text-shadow: white 0 1px 0;
	-moz-box-shadow: 0 1px 0 #fff;
	-webkit-box-shadow: 0 1px 0 white;
	box-shadow: 0 1px 0 white;
	background-color: #F1F1F1;
	background-image: -ms-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -moz-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -o-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: -webkit-gradient(linear,left top,left bottom,from(#F9F9F9),to(#ECECEC));
	background-image: -webkit-linear-gradient(top,#F9F9F9,#ECECEC);
	background-image: linear-gradient(top,#F9F9F9,#ECECEC);
	margin-top: 1px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	cursor: move;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
}
input[type="submit"]{
	cursor: pointer;
}
</style>
<div class="wrap" style="margin-top: 30px;margin-left: 10px;max-width:800px !important;">
<div style="width: 570px;float:left;">
<form action="<?php echo $action_url ?>" method="post">
		<input type="hidden" name="submitted" value="1" />
		<?php wp_nonce_field('sc-popup-subscriber-by-sharp-coders'); ?>
	
<div class="wp-social-box">
	<h3>Configuration</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" style="width: 100px;">Enable</th>
					<td>
						<fieldset>
							<legend class="hidden">Enable</legend>
							<label for="enable">
								<input type="checkbox" name="enable" value="yes" <?php echo $settings['enable']=="yes"? 'checked="checked"': '' ; ?>  />
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 100px;">Show Every X Day(s)</th>
					<td>
						<fieldset>
							<label for="xday"><input type="text" name="xday" style="width: 70px;"  value="<?php echo $settings['xday']!=""? intval($settings['xday']): 0; ?>"  /></label> set 0 on Every Page Load
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 100px;">FeedURi</th>
					<td>
						<fieldset>
							<label for="feedurl"><input type="text" name="feedurl"  value="<?php echo $settings['feedurl']!=""? stripslashes($settings['feedurl']): ''; ?>"  /></label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 100px;">Heading</th>
					<td>
						<fieldset>
							<label for="heading"><input type="text" name="heading"  value="<?php echo $settings['heading']!=""? stripslashes($settings['heading']): 'Subscribe Mailing List'; ?>"  /></label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 100px;">Detail</th>
					<td>
						<fieldset>
							<legend class="hidden">Detail</legend>
							<label for="detail"><textarea id="detail" name="detail" style="width: 400px;height: 140px;"><?php echo $settings['detail']!=""? stripslashes($settings['detail']): ''; ?></textarea></label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width: 100px;">Give Credit to Developer</th>
					<td>
						<fieldset>
							<legend class="hidden">Give Credit to Developer</legend>
							<label for="credit">
								<input type="checkbox" name="credit" value="yes" <?php echo $settings['credit']=="yes"? 'checked="checked"': '' ; ?>  />
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- End Block -->

	
	
	<div class="submit" style="float: left; display: block; width: 100%;"><input type="submit" name="Submit" value=" Update " style="min-width: 100px;min-height: 30px;font-size: 14px;" /></div>
		</form>
	<div class="submit" style="float: left; display: block; width: 100%;">
		
		
	</div>
</div>
<div style="float:right;">
<!-- Start Plugin Information -->
	<div class="wp-social-box" style="width: 200px;">
	<h3>Plugin Information</h3>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<td>
						This Plugin is Developed By <a href="http://sharp-coders.com" target="_blank" class="company">Sharp Coders</a>.<br />
						Visit <a href="http://sharp-coders.com/plugins/wp-plugins/" target="_blank">sharp-coders.com</a> for more plugins.<br />
						<strong>Author: </strong> <a href="https://www.facebook.com/anas.mir" target="_blank">Anas Mir</a>
						<br />
						<strong>Support: </strong> <a href="http://sharp-coders.com/plugins/wp-plugins/sc-popup-subscriber-form-wordpress-plugin" target="_blank">Open Support Page</a>
						<br /><br />
						<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fsharpcoders&amp;send=false&amp;layout=standard&amp;width=180&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:35px;" allowTransparency="true"></iframe>
						<br />
						<strong>Twitter: </strong>&nbsp;&nbsp;<a href="http://twitter.com/sharpcoderz" target="_blank">@SharpCoderz</a>
						
						<hr style="max-width: 180px;" />
						<a href="http://secure.hostgator.com/~affiliat/cgi-bin/affiliates/clickthru.cgi?id=sharpcoders" target="_blank"><img src="http://tracking.hostgator.com/img/Shared/125x125.gif" border="0"></a>
						<br /><br />
						<strong>Other Plugins</strong><br />
						<a href="http://sharp-coders.com/plugins/wp-plugins/wp-social-share" target="_blank">WP Social Share</a>
						<br />
						<a href="http://sharp-coders.com/plugins/wp-plugins/wp-subscriber_form" target="_blank">WP Subscriber Form</a>
						<br />
						<a href="http://sharp-coders.com/plugins/wp-plugins/wp-ads-within-contents-wordpress-plugin" target="_blank">WP Ads Within Contents</a>
						<hr style="max-width: 180px;" />
						<strong>Friends</strong><br />
						<a href="http://apnagoogle.com" target="_blank">http://apnagoogle.com</a>
						<br />
						<a href="http://www.dosellit.com" target="_blank">http://www.DoSelliT.com</a>
						
						<br /><br />
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
	<!-- End Information -->
</div>
</div>