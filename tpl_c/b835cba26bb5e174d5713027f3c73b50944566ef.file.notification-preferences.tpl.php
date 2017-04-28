<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:31
         compiled from "D:\home\site\wwwroot\tpl\MyAccount\notification-preferences.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6985901d07bb7ccf7-60208183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b835cba26bb5e174d5713027f3c73b50944566ef' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\MyAccount\\notification-preferences.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6985901d07bb7ccf7-60208183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PreferencesUpdated' => 0,
    'EmailEnabled' => 0,
    'Created' => 0,
    'Updated' => 0,
    'Deleted' => 0,
    'Approved' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d07be398e1_52811434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d07be398e1_52811434')) {function content_5901d07be398e1_52811434($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('globalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cssFiles'=>"my-account.css"), 0);?>


<div class="page-notification-preferences">

	<?php if ($_smarty_tpl->tpl_vars['PreferencesUpdated']->value) {?>
		<div class="success alert alert-success col-xs-12 col-sm-8 col-sm-offset-2">
			<span class="glyphicon glyphicon-ok-sign"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'YourSettingsWereUpdated'),$_smarty_tpl);?>

		</div>
	<?php }?>

	<?php if (!$_smarty_tpl->tpl_vars['EmailEnabled']->value) {?>
		<div class="error"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EmailDisabled'),$_smarty_tpl);?>
</div>
	<?php } else { ?>
		<div id="notification-preferences-box" class="default-box col-xs-12 col-sm-8 col-sm-offset-2">
			<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NotificationPreferences'),$_smarty_tpl);?>
</h1>

			<form id="notification-preferences-form" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
">
				<div>
					<div class="notification-row">
						<div class="notification-type">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationCreatedPreference'),$_smarty_tpl);?>

						</div>

						<div class="btn-group form-group" data-toggle="buttons">
							<label class="btn btn-default btn-xs <?php if ($_smarty_tpl->tpl_vars['Created']->value) {?>active<?php }?>">
								<input id="createdYes" type="radio" name="<?php echo ReservationEvent::Created;?>
" value="1"
									   <?php if ($_smarty_tpl->tpl_vars['Created']->value) {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceSendEmail'),$_smarty_tpl);?>

							</label>
							<label class="btn btn-default btn-xs <?php if (!$_smarty_tpl->tpl_vars['Created']->value) {?>active<?php }?>">
								<input id="createdNo" type="radio" name="<?php echo ReservationEvent::Created;?>
" value="0"
									   <?php if (!$_smarty_tpl->tpl_vars['Created']->value) {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceNoEmail'),$_smarty_tpl);?>
</label>
						</div>
					</div>

					<div class="notification-row">
						<div class="notification-type">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationUpdatedPreference'),$_smarty_tpl);?>

						</div>

						<div class="btn-group form-group" data-toggle="buttons">
							<label class="btn btn-default btn-xs <?php if ($_smarty_tpl->tpl_vars['Updated']->value) {?>active<?php }?>">
								<input id="updatedYes" type="radio" name="<?php echo ReservationEvent::Updated;?>
" value="1"
									   <?php if ($_smarty_tpl->tpl_vars['Updated']->value) {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceSendEmail'),$_smarty_tpl);?>

							</label>
							<label class="btn btn-default btn-xs <?php if (!$_smarty_tpl->tpl_vars['Updated']->value) {?>active<?php }?>">
								<input id="updatedNo" type="radio" name="<?php echo ReservationEvent::Updated;?>
" value="0"
									   <?php if (!$_smarty_tpl->tpl_vars['Updated']->value) {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceNoEmail'),$_smarty_tpl);?>
</label>
						</div>
					</div>

					<div class="notification-row">
						<div class="notification-type">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationDeletedPreference'),$_smarty_tpl);?>

						</div>

						<div class="btn-group form-group" data-toggle="buttons">
							<label class="btn btn-default btn-xs <?php if ($_smarty_tpl->tpl_vars['Deleted']->value) {?>active<?php }?>">
								<input id="deletedYes" type="radio" name="<?php echo ReservationEvent::Deleted;?>
" value="1"
									   <?php if ($_smarty_tpl->tpl_vars['Deleted']->value) {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceSendEmail'),$_smarty_tpl);?>

							</label>
							<label class="btn btn-default btn-xs <?php if (!$_smarty_tpl->tpl_vars['Deleted']->value) {?>active<?php }?>">
								<input id="deletedNo" type="radio" name="<?php echo ReservationEvent::Deleted;?>
" value="0"
									   <?php if (!$_smarty_tpl->tpl_vars['Deleted']->value) {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceNoEmail'),$_smarty_tpl);?>
</label>
						</div>
					</div>

					<div class="notification-row alt">
						<div class="notification-type">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationApprovalPreference'),$_smarty_tpl);?>

						</div>

						<div class="btn-group form-group" data-toggle="buttons">
							<label class="btn btn-default btn-xs <?php if ($_smarty_tpl->tpl_vars['Approved']->value) {?>active<?php }?>">
								<input id="approvedYes" type="radio" name="<?php echo ReservationEvent::Approved;?>
" value="1"
									   <?php if ($_smarty_tpl->tpl_vars['Approved']->value) {?>checked="checked"<?php }?>/> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceSendEmail'),$_smarty_tpl);?>

							</label>
							<label class="btn btn-default btn-xs <?php if (!$_smarty_tpl->tpl_vars['Approved']->value) {?>active<?php }?>">
								<input id="approvedNo" type="radio" name="<?php echo ReservationEvent::Approved;?>
" value="0"
									   <?php if (!$_smarty_tpl->tpl_vars['Approved']->value) {?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PreferenceNoEmail'),$_smarty_tpl);?>
</label>
						</div>

						
						
						
						
						
						
						
						
						
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary update prompt" name="<?php echo Actions::SAVE;?>
">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>

					</button>
				</div>
			</form>
		</div>
	<?php }?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('globalfooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
