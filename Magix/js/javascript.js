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
	
}

