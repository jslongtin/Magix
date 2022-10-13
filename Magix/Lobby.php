<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<div id="lobby">
    <iframe  style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
    </iframe>

    <div class="logout">
		<form action="" method="post">
			<?php
			if ($data["deconnectionError"] or $data["KeyError"]) {
			?>
				<div class="error-message">
					<strong>INVALID_KEY</strong>
				</div>
			<?php
			}
			?>
			<?php
			if ($data["TypeError"]) {
			?>
				<div class="error-message">
					<strong>INVALID_GAME_TYPE</strong>
				</div>
			<?php
			}
			?>
			<?php
			if ($data["DeckError"]) {
			?>
				<div class="error-message">
					<strong>"DECK_INCOMPLETE</strong>
				</div>
			<?php
			}
			?>


			<button class="jouer" type="submit" name="jouer">Jouer</button>
			<button class="pratique" type="submit" name="pratique">Pratique</button>
			<button class="deck" type="submit" name="deck">Deck/statistiques</button>
			<button class="deconnexion" type="submit" name="deconnexion">Quitter</button>
			
		</form>
    </div>

</div>
<?php
require_once("partial/footer.php");
