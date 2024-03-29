<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<div id="lobby">

	<div id="chat">
		<iframe style="width:700px;height:100%;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
		</iframe>
	</div>

	<div class="actionButtonsLobby">
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
				<!-- <input type="text" name="PrivateKey" id="PrivateKey" placeholder="PrivateKey"> -->
				<!-- <button class="JouerCoop" type="submit" name="JouerCoop">Jouer COOP</button> -->
				<!-- <button class="PratiqueCoop" type="submit" name="PratiqueCoop">Pratique COOP</button> -->
				<button class="deck" type="submit" name="deck">Deck/statistiques</button>
				<button class="deconnexion" type="submit" name="deconnexion">Quitter</button>
			</div>
		</form>
	</div>
	<div class="heroSelectionGallery">
		<h2 id="name">SELECT YOUR HERO</h2>
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
					<div class="hero" id="ashe"></div>
					<div class="hero" id="bastion"></div>
					<div class="hero " id="cassidy"></div>
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
					<div class="hero " id="symetra"></div>
					<div class="hero " id="torbjorn"></div>
					<div class="hero " id="tracer"></div>
					<div class="hero " id="widowmaker"></div>

				</div>
			</div>
			<div class="support">
				<div class="row1">
					<div class="hero" id="ana"></div>
					<div class="hero" id="baptiste"></div>
					<div class="hero" id="brigitte"></div>
					<div class="hero" id="kiriko"></div>

				</div>
				<div class="row2">
					<div class="hero" id="lucio"></div>
					<div class="hero " id="mercy"></div>
					<div class="hero" id="moira"></div>
					<div class="hero " id="zenyatta"></div>

				</div>
			</div>
		</div>
		<div class="select">
			<form action="" method="post">
				<button name="select" id="heroChoisi" type="submit">Select</button>
			</form>
		</div>


	</div>
	<script>
		let heros = document.querySelectorAll(".hero");
		heros.forEach(e => {
			e.onclick = () => {
				let heroChoisi = e.id;
				document.querySelector("#heroChoisi").value = heroChoisi;
				e.classList.add("Selected");
			}
		});
	</script>
</div>

</div>
<?php
require_once("partial/footer.php");
