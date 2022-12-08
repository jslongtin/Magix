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
		height: "500px",
		memberListFontColor: "#000000",
		memberListBackgroundColor: "white"
	}
	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");
	}, 100);
}
// onload events
if (window.location.href.match("StatsDeck.php") != null) {
	window.addEventListener("load", () => {
		graphiqueP();
		mostPlayed();
	});

}
else if (window.location.href.match("Lobby.php") != null) {
	window.addEventListener("load", () => {
		getName();
	});
}
// local storage
const localStorage = () => {
	let username = document.querySelector("#Username").value;
	window.localStorage.setItem("Name", username);
}
const getName = () => {
	let titre = "SELECT YOUR HERO, " + window.localStorage.getItem("Name");
	document.getElementById("name").innerHTML = titre;
}

const toggleChat = () => {
	counter++;
	if (counter % 2 == 1) {
		document.querySelector("#chatGame").style.display = "block";
	}
	else {
		document.querySelector("#chatGame").style.display = "none";
	}
}
const toggleLegend = () => {
	counter++;
	if (counter % 2 == 1) {
		document.querySelector("#legend").style.display = "block";
	}
	else {
		document.querySelector("#legend").style.display = "none";
	}
}
// stats/deck
const modifierDeck = () => {
	document.querySelector("#myChart").style.display = "none";
	document.querySelector("#deckAPI").style.display = "block";
}
const mostPlayed = () => {

	let formData = new FormData();
	formData.append("type", "MostPlayed");
	fetch("ajax-state.php", {
		method: "POST",
		body: formData
	})
		.then(response => response.json())
		.then(data => {

	document.querySelector("#mostPlayed").innerHTML = "Most played : carte " + data.idcarte+ ", nombre de fois jouée: " + data.count ;
});
}
const graphiqueP = () => {
	document.querySelector("#deckAPI").style.display = "none";
	document.querySelector("#myChart").style.display = "block";

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

			if (data.length == 0) {
				xValues.push("Aucune carte");
				yValues.push(0);
			}
			else {
				data.forEach(element => {

					if (element.idcarte != null) {
						xValues.push("CarteId " + JSON.stringify(element.idcarte));
						total += element.count;
					}
				});
				data.forEach(e => {
					if (e.count != 0) {
						let pourcent = Math.floor(e.count * 100 / total);
						yValues.push(pourcent);
					}
				})
			}
			
			
			let barColors = [];
			// genere des  barColors aleatoires pour chaque id
			let letters = "0123456789ABCDEF";
			let color = "#";
			for (let i = 0; i <= yValues.length; i++) {
				for (let i = 0; i < 6; i++) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				barColors.push(color);
				color = "#";
			}

			let piedata = {
				labels: xValues,
				datasets: [{
					backgroundColor: barColors,
					data: yValues,
					color: "#000000"
				}]
			}
			let chartid = document.getElementById("myChart");
			let chart = new Chart(chartid, {
				type: "pie",
				data: piedata,
				options: {
					legend: {
						labels: {
							fontColor: '#000000',
							fontSize: 16
						}
					},
					responsive: true,
					maintainAspectRatio: true,
					tooltips: {
						callbacks: {
							label: function (tooltipItem, data) {
								return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
							}
						}
					},
					title: {
						display: true,
						text: "Popularité des cartes",
						fontColor: '#000000',
						fontSize: 20
					}

				}
			});
		});
}

