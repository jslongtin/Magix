<?php
require_once("action/DeckAction.php");

$action = new DeckAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<div id="deck">
	<div id="actionBar">
		<button name="deck" onclick="modifierDeck()" type="submit">Modifier son deck</button>
		<button name="graph" onclick="graphiqueP()" type="submit">graph</button>
		<form action="" method="post">
			<button name="clear" type="submit">Clear</button>
			<button name="retour" type="submit">Retour</button>
		</form>
	</div>
	<div id="graphiques">
		<iframe id="deckAPI" src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"] ?>"></iframe>
		<canvas id="myChart"></canvas>
		<div id="most_played"></div>
	</div>

</div>
<?php
require_once("partial/footer.php");
