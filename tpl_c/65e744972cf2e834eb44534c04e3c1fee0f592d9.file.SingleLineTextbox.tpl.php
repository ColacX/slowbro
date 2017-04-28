<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:08
         compiled from "D:\home\site\wwwroot\tpl\Controls\Attributes\SingleLineTextbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:230625901d064043941-95850463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65e744972cf2e834eb44534c04e3c1fee0f592d9' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Controls\\Attributes\\SingleLineTextbox.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230625901d064043941-95850463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'searchmode' => 0,
    'attribute' => 0,
    'class' => 0,
    'attributeId' => 0,
    'readonly' => 0,
    'attributeName' => 0,
    'inputClass' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d0642b4944_79753962',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d0642b4944_79753962')) {function content_5901d0642b4944_79753962($_smarty_tpl) {?>
<div class="form-group <?php if (!$_smarty_tpl->tpl_vars['searchmode']->value&&$_smarty_tpl->tpl_vars['attribute']->value->Required()) {?>has-feedback<?php }?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
	<label class="customAttribute" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</label>
	<?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>
		<span class="attributeValue <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Value();?>
</span>
	<?php } else { ?>
		<input type="text" id="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['attributeName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Value();?>
"
			   class="customAttribute form-control <?php echo $_smarty_tpl->tpl_vars['inputClass']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['attribute']->value->Required()&&!$_smarty_tpl->tpl_vars['searchmode']->value) {?>required<?php }?>/>
		<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Required()&&!$_smarty_tpl->tpl_vars['searchmode']->value) {?>
		<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"></i>
		<?php }?>
	<?php }?>
</div><?php }} ?>
