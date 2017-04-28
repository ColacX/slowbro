<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:55
         compiled from "D:\home\site\wwwroot\tpl\Calendar\calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:278315901d09334b555-41484633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc957dd22fc9fd575f5d4a2cc2d5dbc2164f7f98' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Calendar\\calendar.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278315901d09334b555-41484633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d093528fb2_14763728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d093528fb2_14763728')) {function content_5901d093528fb2_14763728($_smarty_tpl) {?>

<?php ob_start();?><?php echo Pages::CALENDAR;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['pageUrl'] = new Smarty_variable($_tmp1, null, 0);?>
<?php $_smarty_tpl->tpl_vars['pageIdSuffix'] = new Smarty_variable("calendar", null, 0);?>
<?php $_smarty_tpl->tpl_vars['subscriptionTpl'] = new Smarty_variable("calendar.subscription.tpl", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
