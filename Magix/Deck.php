<?php
require_once("action/DeckAction.php");

$action = new DeckAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<div id="deck">

	<div class="actionBar">
		<button name="deck" onclick="modifierDeck()">Modifier son deck</button>
		<button name="graph" onclick="graphiqueP()">graph</button>
		<form action="" method="post">
			<button name="retour" type="submit">Retour</button>
		</form>
	</div>
	<div id="graphiques">
		<!-- <iframe  id="deckAPI"  src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"] ?>"> -->
		<!-- </iframe> -->
		<div id="stats"> <canvas id="myChart" style="width:100%;max-width:600px"></canvas></div>

		
	</div>
</div>
<?php
require_once("partial/footer.php");
