<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<div id="lobby">
	<div id="chat">
		<iframe style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
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
	<div class="heroSelectionGallery">

		<div id="heroes">
			<div class="tanks">
				<div class="row1">
					<div class="hero dva"></div>
					<div class="hero doomfist"></div>
					<div class="hero junkerqueen"></div>
					<div class="hero orisa"></div>
					<div class="hero reinhardt"></div>
				</div>
				<div class="row2">
					<div class="hero roadhog"></div>
					<div class="hero sigma"></div>
					<div class="hero winston"></div>
					<div class="hero hammond"></div>
					<div class="hero zarya"></div>
				</div>
			</div>

			<div class="dps">
				<div class="row1">
					<div class="hero ashe"></div>
					<div class="hero bastion"></div>

					<div class="hero mccree"></div>
					<div class="hero echo"></div>
					<div class="hero genji"></div>
					<div class="hero hanzo"></div>
					<div class="hero junkrat"></div>
					<div class="hero mei"></div>
					<div class="hero pharah"></div>
				</div>
				<div class="row2">
					<div class="hero reaper"></div>
					<div class="hero sojourn"></div>
					<div class="hero soldier-76"></div>
					<div class="hero sombra"></div>
					<div class="hero symmetra"></div>
					<div class="hero torbjorn"></div>
					<div class="hero tracer"></div>
					<div class="hero widowmaker"></div>

				</div>
			</div>
			<div class="support">
				<div class="row1">
					<div class="hero ana"></div>
					<div class="hero baptiste"></div>
					<div class="hero brigitte"></div>
					<div class="hero kiriko"></div>

				</div>
				<div class="row2">
					<div class="hero lucio"></div>
					<div class="hero mercy"></div>
					<div class="hero moira"></div>
					<div class="hero zenyatta"></div>

				</div>
			</div>
		</div>
		<div class="select">
			<button>Select</button>
		</div>

	</div>

</div>

</div>
<?php
require_once("partial/footer.php");
