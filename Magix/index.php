<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<div id="index">
	<h1> MAGIX </h1>
	<div class="ConnexionBox">
		<h1> CONNEXION </h1>

		<form action="" method="post">
			<?php
			if ($data["connectionError"]) {
			?>
				<div class="error-message">
					<strong>Username et/ou Password INVALIDE</strong>
				</div>
			<?php
			}
			?>
			<div class="formLabel"><label for="Username"> Username : </label></div>
			<div class="formInput"><input type="text" name="Username" id="Username" /></div>
			<div class="formSeparator"></div>
			<div class="formLabel"><label for="Password"> Password : </label></div>
			<div class="formInput"><input type="text" name="Password" id="Password" /></div>
			<div class="formSeparator"></div>
			<button class="connexion" type="submit">Connexion</button>
		</form>
	</div>
</div>

<?php
require_once("partial/footer.php");
