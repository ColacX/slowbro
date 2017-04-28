<?php /* Smarty version Smarty-3.1.16, created on 2017-04-28 09:49:15
         compiled from "/Applications/MAMP/htdocs/slowbro/tpl/Dashboard/announcements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1797362825902f3fb657593-45999863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e785ae4deac449c5a7bc0ce158ef3fc4b908a9c' => 
    array (
      0 => '/Applications/MAMP/htdocs/slowbro/tpl/Dashboard/announcements.tpl',
      1 => 1493363524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1797362825902f3fb657593-45999863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Announcements' => 0,
    'each' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5902f3fc836635_72778697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902f3fc836635_72778697')) {function content_5902f3fc836635_72778697($_smarty_tpl) {?>
<div class="dashboard" id="announcementsDashboard">
	<div class="dashboardHeader">
		<div class="pull-left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Announcements"),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['Announcements']->value);?>
</span></div>
		<div class="pull-right">
			<a href="#" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHide'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Announcements"),$_smarty_tpl);?>
">
				<i class="glyphicon"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="dashboardContents">
		<ul>
			<?php  $_smarty_tpl->tpl_vars['each'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['each']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Announcements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['each']->key => $_smarty_tpl->tpl_vars['each']->value) {
$_smarty_tpl->tpl_vars['each']->_loop = true;
?>
				<li><?php echo nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['url2link'][0][0]->CreateUrl(html_entity_decode($_smarty_tpl->tpl_vars['each']->value->Text())));?>
</li>
				<?php }
if (!$_smarty_tpl->tpl_vars['each']->_loop) {
?>
				<div class="noresults"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"NoAnnouncements"),$_smarty_tpl);?>
</div>
			<?php } ?>
		</ul>
	</div>
</div>
<?php }} ?>
