<style type="text/css">
.cblearn-container label
{
display:inline-block;
padding:0 0 3px;
width:175px;
}
</style>

<div class="meta-box-sortables ui-sortable">
<div id="postexcerpt" class="postbox">
<div class="handlediv" title="Click to toggle">
<br/>
</div>
<h3 class="hndle">
<span>WP ClickBank Plugin Keywords Settings</span>
</h3>
<div class="inside cblearn-container">
<p>Enter a one or two word phrase that describes the topic of this blog post. Wp ClickBank Plugin will then choose a relevant ClickBank product for you.</p>
<p>
<label for="cb_keyword_post">Keywords:</label>
<input type="text" class="code" id="cb_keyword_post" name="cb_keyword_post" value="<?=(empty($custom_cb_value) ? get_option('clickbank_keyword') : $custom_cb_value);?>" /><br />
</p>

<p>
<label for="mainCategoryId">Search in this Category:</label>
<select id="mainCategoryId" name="clickbank_category" style="width:300px;">
<option value="0">- Use Blog Defaults -</option>
<option value="">- All categories -</option>
<?php
foreach($this->categories as $one)
{
?>
<option value="<?=$one['id'];?>"<?=(($one['id'] == $customCategory) ? ' selected="selected"' : '');?>><?=$one['name'];?></option>
<?php
}
?>
</select>
</p>

<p valign="top" id="SubCatTable"<?=($customCategory ? '' : ' style="display:none;"');?>>
<label for="subCategoryId">Search in this Subcategory:</label>
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
if($customCategory)
{
foreach($this->subCategories as $one)
{
if($one['parent'] == $customCategory)
{
?>
<option value="<?=$one['id'];?>"<?=(($one['id'] == $customSubcategory) ? ' selected="selected"' : '');?>><?=$one['name'];?></option>
<?php
}
}
}
?>
</select>
</p>

<p>
<label for="cb_id">Gravity Greater Than</label>
<td colspan="2"><input name="clickbank_gravity" type="text" class="regular-text" value="<?=$customGravity;?>" /></td>
</p>

</div>
</div>
</div>