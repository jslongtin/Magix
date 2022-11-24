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
const modifierDeck = () => {
	// counter++;
	// if (counter % 2 == 1) {
		console.log("allo");
	document.querySelector("#myChart").style.display = "none";
	document.querySelector("#deckAPI").style.display = "block";
	// }
	// else {
	// 	console.log("fdsfds");
	// 	document.querySelector("#deckAPI").setAttribute("display", "none");
	// 	document.querySelector("#myChart").setAttribute("display", "block");
	// }
}
const toggleChat = () => {
	counter++;
	if (counter % 2 == 1) {
		console.log("allo");
	document.querySelector("#chatGame").style.display = "block";
	
	}
	else {
		document.querySelector("#chatGame").style.display = "none";
	}
}
if (window.location.href.match("StatsDeck.php") != null){
window.addEventListener("load", () => {
	graphiqueP();
});
}
const graphiqueP =  () => {
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
			
			if(data.length == 0){
				 xValues.push("Aucune carte");
				 yValues.push(0);
			}
			else{
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
			})}
		

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
}

