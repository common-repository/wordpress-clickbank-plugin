<div id="wpbody-content" style="overflow-x: hidden; overflow-y: hidden; ">
<div class="wrap">
<a href="http://wpcbplugin.com/"><div style="background:transparent url(<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/wpcbplugin-cp.gif) no-repeat;" class="icon32"><br></div></a>
<h2>Wordpress ClickBank Plugin</h2>
<div class="postbox-container" style="width:70%;">
<div class="metabox-holder">	
<div class="meta-box-sortables ui-sortable">
<?php if (isset($updated) && $updated)
echo '<div class="updated settings-error"><p><strong>Your Wordpress ClickBank Plugin settings were successfully saved.</strong></p></div>';
?>
<div class="postbox">
<h3 class="hndle"><span>General Settings</span></h3>

<div class="inside">
<div style="padding:15px 15px">
<p>This is the settings page for the Wordpress ClickBank plugin. Yes, simple isn't it!</p>
<p>If you <strong>don't have a ClickBank account</strong>, you can <a target="_blank" href="https://www.clickbank.com/affiliateAccountSignup.htm">register at ClickBank here</a>. It's FREE!.</p>
<p>If you already have a ClickBank account, continue and fill out the below configuration settings.</p>
</div>

<form method="post">
<table style="background:#fbfbfb" class="form-table">
<tr valign="top">
<th scope="row"><label for="cb_keyword"><strong>Keyword or Phrase</strong> <span style="font-size:9px;display:block;padding-top:5px">Keep it short</span></label></th>
<td><input name="cb_keyword" type="text" id="blogname" class="regular-text" value="<?=get_option('clickbank_keyword');?>" />
<div style="color:#444;margin:20px 5px;width:80%"><p style="font-size:11px">Enter a keyword or a short phrase that you would like to target. If you have a blog related to making money online, you could type in <em><strong>making money</strong></em>.</p><p style="font-size:11px">Default trigger sentence in your posts then shows as: Learn more about <strong>making money</strong> here &raquo;</p></div>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="cb_id"><strong>ClickBank ID</strong></label></th>
<td><input name="cb_id" type="text" id="blogname" class="regular-text" value="<?=get_option('clickbank_id');?>" />
<div style="color:#444;margin:20px 5px;width:80%"><p style="font-size:11px">Type in your ClickBank ID/username. If you do not have a ClickBank ID, you can <a target="_blank" href="https://www.clickbank.com/affiliateAccountSignup.htm?key=">register for free here</a>.</p></div>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="cb_id"><strong>Gravity Greater Than</strong></label></th>
<td colspan="2"><input name="clickbank_gravity" type="text" class="regular-text" value="<?=get_option('clickbank_gravity');?>" />
<div style="color:#444;margin:20px 5px;width:80%"><p style="font-size:11px">Gravity is a score that Clickbank assigns to each affiliate product according to their secret formula. It has to do with how many sales and how recently those sales have occurred.</p>
<p style="font-size:11px">Suffice to say that high gravity means that affiliates are making a lot of commissions on sales. Low gravity means that the product or service is new or that there simply has not been many sales at all. So the gravity is an important measure of how successful a product is.</p>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="cb_id"><strong>Tracking ID</strong> (optional)</label></th>
<td><input name="cb_tid" type="text" id="blogname" class="regular-text" value="<?=get_option('clickbank_tid');?>" />
<div style="color:#444;margin:20px 5px;width:80%"><p style="font-size:11px">The ClickBank Tracking ID is an excellent tool, it allows you to track which affiliate campaigns of your's are working and which ones are not.</p>
<p style="font-size:11px">For example, let's say you're promoting ClickBank products on a blog, in a forum post, and on Twitter. Since you'll be posting the same HopLink in all of these places, ClickBank's reporting will just show you how many clicks your HopLink received, along with any sales you created. However, you won't be able to tell exactly which source accounted for these sales. This is where Tracking IDs <em>(also called TIDs)</em> come in. A Good example for a Tracking ID could be: MyBlog</p>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="mainCategoryId"><strong>Search in this Category:</strong></label></th>
<td colspan="2">
<select id="mainCategoryId" name="clickbank_category" style="width:300px;">
<option value="">- All categories -</option>
<?php $category = get_option('clickbank_category');foreach($this->categories as $one) { ?>
<option value="<?=$one['id'];?>"<?=(($one['id'] == $category) ? ' selected="selected"' : '');?>><?=$one['name'];?></option>
<?php } ?>
</select>
</td>
</tr>

<tr valign="top" id="SubCatTable"<?=($category ? '' : ' style="display:none;"');?>>
<th scope="row"><label for="subCategoryId"><strong>Search in this Subcategory:</strong></label></th>
<td colspan="2">
<select id="subCategoryIdSource" style="display:none;">
<option value="">- All subcategories -</option>
<?php
foreach($this->subCategories as $one)
{
?>
<option value="<?=$one['id'];?>" parent="<?=$one['parent'];?>" path="<?=$one['path'];?>"><?=$one['name'];?></option>
<?php
}
?>
</select>
<select id="subCategoryId" name="clickbank_subcategory" style="width:300px;">
<option value="">- All subcategories -</option>
<?php
if($category)
{
$subCategory = get_option('clickbank_subcategory');

foreach($this->subCategories as $one)
{
if($one['parent'] == $category)
{
?>
<option value="<?=$one['id'];?>"<?=(($one['id'] == $subCategory) ? ' selected="selected"' : '');?>><?=$one['name'];?></option>
<?php
}
}
}
?>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="cb_id"><strong>Select one of the images.</strong></label></th>
<td><?php $current_cb_bg = get_option('clickbank_bg'); ?>
<p>
<input type="radio" name="cb_bg" value="blue" <?php if(blue == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgblue.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="green" <?php if(green == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imggreen.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="dark" <?php if(dark == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgdark.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="orange" <?php if(orange == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgorange.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="bluer1" <?php if(bluer1 == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgbluer1.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="imggreen1" <?php if(imggreen1 == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imggreen1.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="dark1" <?php if(dark1 == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgdark1.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="orange1" <?php if(orange1 == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgorange1.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="redbox" <?php if(redbox == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgredbox.png" align="middle" width="250px" />
</p>

<p>
<input type="radio" name="cb_bg" value="finger" <?php if(finger == $current_cb_bg){echo 'checked="checked"';} ?> />
<img src="<?php echo plugins_url(); ?>/<?php echo basename(dirname(__FILE__)); ?>/images/imgfinger.png" align="middle" width="250px" />
</p>

</td>
</tr>
</table>

<p style="padding-left:20px" class="submit">
<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
</p>
</form>
<p style="padding:25px 20px 0 20px"><span class="description"><strong>Suggestion:</strong> Now that you've clicked "Save changes" above, the Wordpress ClickBank Plugin is now working for you 24/7/365, and you should add your blog address to the <a target="_blank" href="http://www.claritysearch.com/">Submit Link Web Directory</a>.</span></p>
<p style="padding:0 20px 20px" ><span class="description">It's free and great for SEO. Check it out at <a target="_blank" href="http://www.claritysearch.com/">ClaritySearch.com</a></span></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="postbox-container" style="width:20%;">
<div class="metabox-holder">
<div class="meta-box-sortables ui-sortable">
<div class="postbox">
<h3 class="hndle"><span>Wanna Go PRO?</span></h3>
<div class="inside"><a target="_blank" href="http://wpcbplugin.net/"><img border="0px" style="padding:5px 0 0 3px" src="http://wpcbplugin.com/images/upgrade.png" /></a>
<p style="padding-left:10px">The PRO version has more features and shows your affiliate link 100% of the time, it is open source and includes FREE upgrades for life.<p>
<p style="padding-left:10px"><strong>BONUS:</strong> You also get a <strong>FREE Featured Directory</strong> listing in the <a target="_blank" href="http://claritysearch.com/">Clarity Search Web Directory</a>. That has a value of $49.95 USD</p>
<p style="padding-left:10px">Ready to go PRO? <a target="_blank" href="http://wpcbplugin.net/">Click here</a>.</p>
</div>
</div>
<div class="postbox">
<h3 class="hndle"><span>Make Money - 63% Commission</span></h3>
<div class="inside"><a target="_blank" href="http://wpcbplugin.net/affiliates.html"><img border="0px" style="padding:5px 0 0 3px" src="http://wpcbplugin.net/images/affiliate-program.png" /></a></div>
</div>
<div id="donate" class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span><strong class="red">Make a Donation!</strong></span></h3>
<div style="padding-left:10px" class="inside">
<p>This plugin has taken me countless hours of work, if you use it, please donate a token of your appreciation!</p><br>
<form style="padding:0 0 20px 35px" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="W6GW4QRV2R9L2">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</div>
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br></div>
<h3 class="hndle"><span>Need support?</span></h3>
<div class="inside">
<ul style="padding:10px">
<li><a target="_blank" href="http://www.facebook.com/MakeMoneyHelper">Like Me on Facebook</li>
<li><a target="_blank" href="http://wordpress.org/tags/wordpress-clickbank-plugin">Support Forums</li>
<li><a target="_blank" href="http://wpcbplugin.com/">Contact</a></li>
</ul>
</div>
</div>
<div class="postbox">
<h3 class="hndle"><span>BONUS! Promote Your Blog</span></h3>
<div class="inside">
<ul style="padding:10px">
<li><a target="_blank" href="http://claritysearch.com/">Submit Link - Web Directory</a></li>
<li><a target="_blank" href="http://makemoneyhelper.com/classifieds/">Free Business Classifieds</a></li>
<li><a target="_blank" href="http://makemoneyhelper.com/">Make Money Helper</a></li>
</ul></div>
</div>
</div>
<br><br><br>
</div>
</div>
<div class="clear"></div>