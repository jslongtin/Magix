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
// document.addEventListener("load", () => {
// 	let titres = [];
// 	let valeures = [];

// 	let couleurs = [];
// 	// genere des couleurs aleatoires pour chaque id
// 	let letters = "0123456789ABCDEF";
// 	let color = "#";
// 	for (let i = 0 ;i < titres.length;i++){
// 		color+= letters[Math.floor(Math.random*16)];
// 		couleurs.append(color);
// 	}
// 	new chart("chart", {
// 		type: "doughnut",
// 		data: {
// 			lables: titres,
// 			datasets: [{
// 				backgroundColor: couleurs,
// 				data: valeures
// 			}]
// 		},
// 		options: {
// 			title: {
// 				display: true,
// 				text: "Popularitée des cartes"
// 			}
// 		}
// 	});
// })

