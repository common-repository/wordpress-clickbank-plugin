<?php add_action('widgets_init', 'ClickBank_load_advertisement_widgets');
function ClickBank_load_advertisement_widgets() { register_widget('WPCBPluginTextAds');}
class WPCBPluginTextAds extends WP_Widget {
function WPCBPluginTextAds() {
$widget_ops = array('classname' => 'ClickBank', 'description' => __('With this Wordpress ClickBank Plugin Widget, you can display ClickBank contextual Ads. For details, visit: WPCBPlugin.com', 'ClickBank'));
$control_ops = array('width' => 200);
$this->WP_Widget('ClickBank-widget', __('WP ClickBank Plugin Ads', 'ClickBank'), $widget_ops, $control_ops);}
function widget($args, $instance) {
extract($args);
$title = apply_filters('widget_title', $instance['title']);
$user = $instance['name'];
$height = $instance['height'];
$width = $instance['width'];
$keywords = $instance ['keywords'];
$rows = (($height * $width) / 100) * 3 / 400;
echo $before_widget; if ($title) echo $before_title . $title . $after_title; if (empty($user)) {$user = thomasall;}; ?>
<div style="width:70%;margin:15px 0 -3px"><a style="color:#3300ff;font-size:8pt;font-weight:bold;text-decoration:underline" href="http://<?php echo $user; ?>.thomasall.hop.clickbank.net" rel="nofollow" target="new">WP ClickBank Plugin PRO</a><br /><font style="font-family:Arial,Verdana,Sans Serif;font-size:8pt;color:000000">Make money from your blog with the Wordpress ClickBank Plugin. Works for you 24/7/365 on Auto-Pilot!</font></div>
<div style="padding:0 6px">
<script type="text/javascript">
hopfeed_template='';
hopfeed_align='left';
hopfeed_type='IFRAME';
hopfeed_affiliate_tid='';
hopfeed_affiliate='<?php echo $user; ?>';
hopfeed_fill_slots='true';
hopfeed_height='<?php echo $height ?>';
hopfeed_width='<?php echo $width ?>';
hopfeed_cellpadding='1';
hopfeed_rows='<?php echo $rows ?>';
hopfeed_cols='1';
hopfeed_font='Arial,Verdana,Sans Serif';
hopfeed_font_size='8pt';
hopfeed_font_color='000000';
hopfeed_border_color='FFFFFF';
hopfeed_link_font_color='3300FF';
hopfeed_link_font_hover_color='3300FF';
hopfeed_background_color='FFFFFF';
hopfeed_keywords='<?php echo $keywords ?>';
hopfeed_path='http://<?php echo $user; ?>.hopfeed.com';
hopfeed_link_target='new';
</script>
<script type="text/javascript" src='http://<?php echo $user; ?>.hopfeed.com/script/hopfeed.js'></script>
</div>
<?php echo $after_widget; }
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['name'] = strip_tags($new_instance['name']);
$instance['height'] = strip_tags($new_instance['height']);
$instance['width'] = strip_tags($new_instance['width']);
$instance['keywords'] = strip_tags($new_instance['keywords']);
return $instance; }
function form($instance) {
$defaults = array('title' => __('Ads by ClickBank', 'ClickBank'), 'name' => __('thomasall', 'ClickBank'), 'height' => __('200', 'ClickBank'), 'width' => __('200', 'ClickBank'));
$instance = wp_parse_args((array) $instance, $defaults); ?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'hybrid'); ?></label>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Your ClickBank ID:', 'ClickBank'); ?></label>
<input id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Widget height:', 'ClickBank'); ?></label>
<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $instance['height']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Widget width:', 'ClickBank'); ?></label>
<input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $instance['width']; ?>" style="width:100%;" /></p>
<p><label for="<?php echo $this->get_field_id('keywords'); ?>"><?php _e('Keywords (Comma seperated):', 'ClickBank'); ?></label>
<input id="<?php echo $this->get_field_id('keywords'); ?>" name="<?php echo $this->get_field_name('keywords'); ?>" value="<?php echo $instance['keywords']; ?>" style="width:100%;" /></p>
<?php }} ?>