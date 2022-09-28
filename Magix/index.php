<?php
	require_once("action/Action.php");

	$action = new Action();
	$data = $action->execute();

	require_once("partial/header.php");
?>

<?php
	require_once("partial/footer.php");