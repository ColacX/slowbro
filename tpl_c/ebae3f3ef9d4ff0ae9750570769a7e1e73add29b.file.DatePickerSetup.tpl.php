<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 04:05:08
         compiled from "D:\home\site\wwwroot\tpl\Controls\DatePickerSetup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41065901d064ac7c72-05697585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebae3f3ef9d4ff0ae9750570769a7e1e73add29b' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\Controls\\DatePickerSetup.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41065901d064ac7c72-05697585',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ControlId' => 0,
    'HasTimepicker' => 0,
    'NumberOfMonths' => 0,
    'ShowButtonPanel' => 0,
    'OnSelect' => 0,
    'DayNames' => 0,
    'DayNamesShort' => 0,
    'DayNamesMin' => 0,
    'DateFormat' => 0,
    'FirstDay' => 0,
    'MonthNames' => 0,
    'MonthNamesShort' => 0,
    'TimeFormat' => 0,
    'AltId' => 0,
    'AltFormat' => 0,
    'DefaultDate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5901d0650ae172_14123760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901d0650ae172_14123760')) {function content_5901d0650ae172_14123760($_smarty_tpl) {?>
<script type="text/javascript">
$(function(){
  $("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").<?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>datetimepicker<?php } else { ?>datepicker<?php }?>({
		 numberOfMonths: <?php echo $_smarty_tpl->tpl_vars['NumberOfMonths']->value;?>
,
		 showButtonPanel: <?php echo $_smarty_tpl->tpl_vars['ShowButtonPanel']->value;?>
,
		 onSelect: <?php echo $_smarty_tpl->tpl_vars['OnSelect']->value;?>
,
		 dayNames: <?php echo $_smarty_tpl->tpl_vars['DayNames']->value;?>
,
		 dayNamesShort: <?php echo $_smarty_tpl->tpl_vars['DayNamesShort']->value;?>
,
		 dayNamesMin: <?php echo $_smarty_tpl->tpl_vars['DayNamesMin']->value;?>
,
		 dateFormat: '<?php echo $_smarty_tpl->tpl_vars['DateFormat']->value;?>
',
		 <?php if ($_smarty_tpl->tpl_vars['FirstDay']->value>=0&&$_smarty_tpl->tpl_vars['FirstDay']->value<=6) {?>
	  		firstDay: <?php echo $_smarty_tpl->tpl_vars['FirstDay']->value;?>
,
		 <?php }?>
		 monthNames: <?php echo $_smarty_tpl->tpl_vars['MonthNames']->value;?>
,
		 monthNamesShort: <?php echo $_smarty_tpl->tpl_vars['MonthNamesShort']->value;?>
,
		 currentText: "<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo strtr($_tmp4, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
",
		 timeFormat: "<?php echo $_smarty_tpl->tpl_vars['TimeFormat']->value;?>
",
	  	 altFieldTimeOnly: false,
	  	 controlType: 'select'
	  	 <?php if ($_smarty_tpl->tpl_vars['AltId']->value!='') {?>
		   ,
	  		altField: "#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
",
	  	 	altFormat: '<?php echo $_smarty_tpl->tpl_vars['AltFormat']->value;?>
'
		  <?php }?>
		  <?php if ($_smarty_tpl->tpl_vars['DefaultDate']->value) {?>
			,
	  		defaultDate: new Date('<?php echo $_smarty_tpl->tpl_vars['DefaultDate']->value->Format('Y-m-d');?>
')
		<?php }?>
  });

  <?php if ($_smarty_tpl->tpl_vars['AltId']->value!='') {?>
	$("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").change(function() {
 		if ($(this).val() == '') {
			$("#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
").val('');
		}
		else{
			var dateVal = $("#<?php echo $_smarty_tpl->tpl_vars['ControlId']->value;?>
").<?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>datetimepicker<?php } else { ?>datepicker<?php }?>('getDate');
			var dateString = dateVal.getFullYear() + '-' + ('0' + (dateVal.getMonth()+1)).slice(-2) + '-' + ('0' + dateVal.getDate()).slice(-2);
			<?php if ($_smarty_tpl->tpl_vars['HasTimepicker']->value) {?>
				dateString = dateString + ' ' + dateVal.getHours() + ':' + dateVal.getMinutes();
			<?php }?>
			$("#<?php echo $_smarty_tpl->tpl_vars['AltId']->value;?>
").val(dateString);
		}
  	});
  <?php }?>

});
</script><?php }} ?>
