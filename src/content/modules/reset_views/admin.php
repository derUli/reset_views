<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "reset_views" ) );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "reset_views" );
function reset_views_admin() {
	if (isset ( $_POST ["submit"] )) {
		Database::query ( "update {prefix}content set `views` = 0", true );
	}	
	?>
<?php

	if (isset ( $_POST ["submit"] )) {
		?>
<p><?php translate("ALL_VIEWS_RESETTED");?></p>
<?php }?>

<form id="cform" action="<?php echo getModuleAdminSelfPath()?>"
	method="post"
	data-question="<?php translate("ask_for_reset_views");?>"
	onsubmit="return resetViewsSubmit();">
<?php
	
	csrf_token_html ();
	?>
<input type="submit" name="submit"
		value="<?php translate("reset_views");?>" />
</form>
<script type="text/javascript"
	src="<?php echo getModulePath("reset_views");?>js/admin.min.js"></script>
<?php
}

?>
