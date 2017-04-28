<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:26
         compiled from "D:\home\site\wwwroot\tpl\Calendar\mycalendar.subscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208905901d076d1b554-67738750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f74934277cf226e684b5a2bc5e8b6a3a2f7defbf' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Calendar\\mycalendar.subscription.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208905901d076d1b554-67738750',
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
  'unifunc' => 'content_5901d076e88a85_91983228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d076e88a85_91983228')) {function content_5901d076e88a85_91983228($_smarty_tpl) {?>
<div id="calendarSubscription" class="calendar-subscription">
    <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionAllowed']->value&&$_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a href="#" id="turnOffSubscription"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"switch-minus.png"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOffSubscription'),$_smarty_tpl);?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
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
    <?php } elseif ($_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a href="#" id="turnOnSubscription"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"switch-plus.png"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOnSubscription'),$_smarty_tpl);?>
</a>
    <?php }?>
</div><?php }} ?>
