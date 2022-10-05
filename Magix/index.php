<?php
	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$data = $action->execute();

	require_once("partial/header.php");
?>
<div class="ConnexionBox">
	<span></span>
	<div class="username"></div>
	<div class="password"></div>
	<button class="connexion"></button>
</div>
<?php
	require_once("partial/footer.php");