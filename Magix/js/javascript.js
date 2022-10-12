let counter = 0;
const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(201, 176, 167, 0.45)",
		fontGoogleName : "Kreon",
		fontSize : "20px",
		hideIcons : false ,
		inputBackgroundColor : "blanchedalmond",
		inputFontColor : "blue",
		height : "562px",
		memberListFontColor : "#ff00dd",
		memberListBackgroundColor : "white"
	}
	
	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}, 100);
}
const modifierDeck = () => {
	counter++;
	if (counter % 2 == 1) { 
	document.querySelector("#deckAPI").setAttribute("hidden","hidden");
	}
	else{
		console.log("allo");
		document.querySelector("#deckAPI").removeAttribute("hidden");
	}
}
