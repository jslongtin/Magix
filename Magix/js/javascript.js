let counter = 0;
const applyStyles = iframe => {
	let styles = {
		fontColor: "#FFFFFF",
		backgroundColor: "rgba(67, 72, 76, 0.7)",
		fontGoogleName: "Bebas Neue",
		fontSize: "20px",
		hideIcons: false,
		inputBackgroundColor: "#218ffe",
		inputFontColor: "#FFFFFF",
		height: "562px",
		memberListFontColor: "#000000",
		memberListBackgroundColor: "white"
	}

	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");
	}, 100);
}
const modifierDeck = () => {
	counter++;
	if (counter % 2 == 1) {
		document.querySelector("#deckAPI").removeAttribute("visibility");
	}
	else {

		document.querySelector("#deckAPI").setAttribute("hidden", "hidden");
	}
}
const graphiqueP =  () => {
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
							xValues.push("Carte"+ JSON.stringify(element.idcarte));
							total += element.count;
						}
					});
					data.forEach(e  => {
						if (e.count != 0) {
							let pourcent = Math.floor(e.count*100/total) ;
						yValues.push(pourcent);
					}
					})
				});
			console.log(xValues);
			console.log(yValues);

			let  barColors = [];

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
			console.log( barColors);
			new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Popularitée des cartes en Pourcentage"
    }
  }
});
}

