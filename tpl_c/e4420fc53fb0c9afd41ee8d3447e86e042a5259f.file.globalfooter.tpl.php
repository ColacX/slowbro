<?php /* Smarty version Smarty-3.1.16, created on 2017-04-28 09:48:43
         compiled from "/Applications/MAMP/htdocs/slowbro/tpl/globalfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9030503005902f3dbc9e7d7-00860101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4420fc53fb0c9afd41ee8d3447e86e042a5259f' => 
    array (
      0 => '/Applications/MAMP/htdocs/slowbro/tpl/globalfooter.tpl',
      1 => 1493363513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9030503005902f3dbc9e7d7-00860101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Version' => 0,
    'GoogleAnalyticsTrackingId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5902f3dc1893e9_44467104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5902f3dc1893e9_44467104')) {function content_5902f3dc1893e9_44467104($_smarty_tpl) {?>

	</div><!-- close main-->

	<footer class="footer navbar">
		&copy; 2017 <a href="http://www.twinkletoessoftware.com">Twinkle Toes Software</a> <br/><a href="http://www.bookedscheduler.com">Booked Scheduler v<?php echo $_smarty_tpl->tpl_vars['Version']->value;?>
</a>
	</footer>

	<script type="text/javascript">
		init();
		$.blockUI.defaults.css.border = 'none';
		$.blockUI.defaults.css.top = '25%';
	</script>

	<?php if (!empty($_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value)) {?>
		
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  
			  ga('create', '<?php echo $_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value;?>
', 'auto');
			  ga('send', 'pageview');
			</script>
	<?php }?>
	</body>
</html><?php }} ?>
