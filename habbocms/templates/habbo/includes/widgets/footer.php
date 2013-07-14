<!--[if lt IE 7]>
<script type="text/javascript">
Pngfix.doPngImageFix();
</script>
<![endif]-->

<script type="text/javascript">
if (typeof HabboView != "undefined") {
	HabboView.run();
}
</script>

<div id="footer">
	<p class="footer-links"><?php echo implode(' l ', $skin->buildFooter()); ?></p>
	<p class="copyright">{$lang->general.footer}</p>
</div></div>

</div>
</body>
</html>

<?php
  //echo $sql->result("SELECT username FROM users WHERE id = '1'");
  if(!$sql->connection) {
    echo 'Created page without mysql!';
  }
?>  