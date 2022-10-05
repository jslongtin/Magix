<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<script>
	document.body.style.backgroundImage = "url('img/hanamura.jpg')";
	document.body.style.backgroundSize = "cover";
</script>

	<div class="ConnexionBox">
		<h1> CONNEXION </h1>

		<div class="formLabel"><label for="Username"> Username : </label></div>
		<div class="formInput"><input type="text" name="Username" id="Username" /></div>
		<div class="formSeparator"></div>
		<div class="formLabel"><label for="Password"> Password : </label></div>
		<div class="formInput"><input type="text" name="Password" id="Password" /></div>
		<div class="formSeparator"></div>
		<button class="connexion">Connexion</button>
	</div>

<?php
require_once("partial/footer.php");
