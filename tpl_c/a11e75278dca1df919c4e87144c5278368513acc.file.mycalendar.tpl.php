<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:26
         compiled from "D:\home\site\wwwroot\tpl\Calendar\mycalendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65885901d0764b7db6-34554009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a11e75278dca1df919c4e87144c5278368513acc' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Calendar\\mycalendar.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65885901d0764b7db6-34554009',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d07668cfb7_99115652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d07668cfb7_99115652')) {function content_5901d07668cfb7_99115652($_smarty_tpl) {?>

<?php ob_start();?><?php echo Pages::MY_CALENDAR;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['pageUrl'] = new Smarty_variable($_tmp1, null, 0);?>
<?php $_smarty_tpl->tpl_vars['pageIdSuffix'] = new Smarty_variable("my-calendar", null, 0);?>
<?php $_smarty_tpl->tpl_vars['subscriptionTpl'] = new Smarty_variable("mycalendar.subscription.tpl", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
