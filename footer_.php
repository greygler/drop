 <div  id="footer">
  <div class="col-lg-3 col-md-3 col-sm-3">
   <center><small><?= ADDRESS ?></small></center>
   </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
   <center><small><a data-toggle="modal" data-target="#polit" href="#">Политика конфиденциальности</a></small></center>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3 text-right">
   <span>&copy; 2015-<?= date("Y")?> Igor Sayutin</span>
   </div>
  </div>
  
<?= systems::politics(); ?>
<?= systems::rules(); ?>

<script src="/js/jquery.min.js"></script> 
  <!--<script src="//code.jquery.com/jquery-3.1.1.min.js"></script> -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 
<script src="/js/jquery.maskedinput.js"></script>
<script type="text/javascript"> jQuery(function($){$(".phone").mask("<?= MASK_PHONE ?>");}); </script>
<script type="text/javascript"> jQuery(function($){$(".sms").mask("\ 999-99-999");}); </script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/control-modal.js"></script>
<script src="/js/gnmenu.php"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script>$("[name='checkbox']").bootstrapSwitch();</script>
	
		
<? if (((!autoring::filling_profile($_SESSION)) OR  (!autoring::is_verify_profile($profile))) AND (!isset($_SESSION['info_profile']))) 
	echo systems::attention();
?>

<? if (($_SESSION['balance']<0) AND ($_SESSION['info_balance']!="1")) echo systems::info_balance(); ?>
<? 	if ($geobase=='yes') { ?><script>var ip='<?= func::GetRealIp() ?>'</script><script src="/js/geobase.php"></script><? } ?>
  </body>
</html>