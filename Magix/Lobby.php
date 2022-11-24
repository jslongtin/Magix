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
					<div class="hero" id="dva"></div>
					<div class="hero" id="doomfist"></div>
					<div class="hero " id="junkerqueen"></div>
					<div class="hero " id="orisa"></div>
					<div class="hero " id="reinhardt"></div>
				</div>
				<div class="row2">
					<div class="hero " id="roadhog"></div>
					<div class="hero " id="sigma"></div>
					<div class="hero " id="winston"></div>
					<div class="hero " id="hammond"></div>
					<div class="hero " id="zarya"></div>
				</div>
			</div>

			<div class="dps">
				<div class="row1">
					<div class="hero " id="ashe"></div>
					<div class="hero " id="bastion"></div>

					<div class="hero " id="mccree"></div>
					<div class="hero " id="echo"></div>
					<div class="hero " id="genji"></div>
					<div class="hero " id="hanzo"></div>
					<div class="hero " id="junkrat"></div>
					<div class="hero " id="mei"></div>
					<div class="hero " id="pharah"></div>
				</div>
				<div class="row2">
					<div class="hero " id="reaper"></div>
					<div class="hero " id="sojourn"></div>
					<div class="hero " id="soldier-76"></div>
					<div class="hero " id="sombra"></div>
					<div class="hero " id="symmetra"></div>
					<div class="hero " id="torbjorn"></div>
					<div class="hero " id="tracer"></div>
					<div class="hero " id="widowmaker"></div>

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
