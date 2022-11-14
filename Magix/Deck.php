<?php
    require_once("action/DeckAction.php");

    $action = new DeckAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>

<div id="deck">
    
    <div class="actionBar">
    <button name="deck" onclick="modifierDeck()">Modifier son deck</button>
    <form action="" method="post">
        <button name="retour" type="submit">Retour</button>
    </form>
    </div>
    <div class="main">
    <!-- <iframe  id="deckAPI"  src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"] ?>"> -->
    <!-- </iframe> -->
    <div id="stats"> <canvas id="chart" style="width:100%;max-width:600px"></canvas></div>
<script>
    let titres = ["patate","fd","fds"];
	let valeures = [10,11,12];

	let couleurs = [];
	// genere des couleurs aleatoires pour chaque id
	let letters = "0123456789ABCDEF";
	let color = "#";
	for (let i = 0 ;i < titres.length;i++){
		for (let i = 0 ;i < 6;i++){
		color += letters[Math.floor(Math.random()*16)];
	}
		couleurs.push(color);
		color = "#";
	}
	
	console.log(couleurs);
	new Chart("chart", {
		type: "doughnut",
		data: {
			lables: titres,
			datasets: [{
				backgroundColor: couleurs,
				data: valeures
			}]
		},
		options: {
			title: {
				display: true,
				text: "Popularitée des cartes"
			}
		}
	});
</script>    
</div>
    </div>
<?php
    require_once("partial/footer.php");