<?php
require_once("action/DeckAction.php");

$action = new DeckAction();
$data = $action->execute();

require_once("partial/header.php");
?>


<div id="deck">

	<div class="actionBar">
		<button name="deck" onclick="modifierDeck()">Modifier son deck</button>
		<button name="graph" onload="graphiqueP()">graph</button>
		

		<form action="" method="post">
			<button name="retour" type="submit">Retour</button>
			<button name="clear" type="submit">Clear</button>
		</form>
	</div>
<!-- <iframe  id="deckAPI"  src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"] ?>"> -->
		<!-- </iframe> -->

		
	<div id="graphiques">
		<canvas id="myChart"  width="600" height="400"></canvas>
		<script>
			let xValues = [];
			let yValues = [];
			let total = 0;
			let formData = new FormData();
			formData.append("type", "BD");
			fetch("ajax-state.php", {
					method: "POST",
					body: formData
				})
				.then(response => response.json())
				.then(data => {
				
					data.forEach(element => {

						if (element.idcarte != null) {
							xValues.push("Carte" + JSON.stringify(element.idcarte));
							total += element.count;
						}
					});
					data.forEach(e => {
						if (e.count != 0) {
							let pourcent = Math.floor(e.count * 100 / total);
							yValues.push(pourcent);
						}
					})
				
			console.log(xValues);
			console.log(yValues);

			let barColors = [];

			// genere des  barColors aleatoires pour chaque id
			let letters = "0123456789ABCDEF";
			let color = "#";
			for (let i = 0; i < 10; i++) {
				for (let i = 0; i < 6; i++) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				barColors.push(color);
				color = "#";
			}
			console.log(barColors);


			let piedata = { labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
}
let chartid = document.getElementById("myChart");
let chart = new Chart(chartid, {
  type: "pie",
  data: piedata,
  
  options: {
    title: {
      display: true,
      text: "Popularité des cartes en Pourcentage"
    }
  }
});
});
</script>
	</div>
</div>
<?php
require_once("partial/footer.php");
