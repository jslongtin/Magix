<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<div id="lobby">
	<div id="chat">
    <iframe  style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
    </iframe>
	</div>

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

			<div id="buttonsLobby">
			<button class="jouer" type="submit" name="jouer">Jouer</button>
			<button class="pratique" type="submit" name="pratique">Pratique</button>
			<input type="text" name="PrivateKey" id="PrivateKey" placeholder="PrivateKey">
			<button class="JouerCoop" type="submit" name="JouerCoop">Jouer COOP</button>
			<button class="PratiqueCoop" type="submit" name="PratiqueCoop">Pratique COOP</button>
			<button class="deck" type="submit" name="deck">Deck/statistiques</button>
			<button class="deconnexion" type="submit" name="deconnexion">Quitter</button>
			</div>
		</form>
    </div>

</div>
<?php
require_once("partial/footer.php");
