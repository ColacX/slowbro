<?php /* Smarty version Smarty-3.1.16, created on 2017-04-27 02:05:01
         compiled from "D:\home\site\wwwroot\tpl\globalfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130055901b43d8e30c3-86210155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ee37c97c190cf397af7ccaa4cf61f492cf6749b' => 
    array (
      0 => 'D:\\home\\site\\wwwroot\\tpl\\globalfooter.tpl',
      1 => 1491464812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130055901b43d8e30c3-86210155',
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
  'unifunc' => 'content_5901b43d90d7f1_92832206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901b43d90d7f1_92832206')) {function content_5901b43d90d7f1_92832206($_smarty_tpl) {?>

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
