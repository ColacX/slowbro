<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:55
         compiled from "D:\home\site\wwwroot\tpl\Calendar\calendar.subscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194595901d09366f851-02716060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c36f7e3087922aec334d0b730919186c26f05a28' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Calendar\\calendar.subscription.tpl',
      1 => 1491464810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194595901d09366f851-02716060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IsSubscriptionAllowed' => 0,
    'IsSubscriptionEnabled' => 0,
    'SubscriptionUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d0937937d8_84852404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d0937937d8_84852404')) {function content_5901d0937937d8_84852404($_smarty_tpl) {?><div id="calendarSubscription" class="calendar-subscription">
    <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionAllowed']->value&&$_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a id="subscribeToCalendar"
           href="<?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"calendar-share.png"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SubscribeToCalendar'),$_smarty_tpl);?>
</a>
        <br/>
        URL:
        <span class="note"><?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
</span>
    <?php }?>
</div>

<?php }} ?>
