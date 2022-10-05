
const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(201, 176, 167, 0.45)",
		fontGoogleName : "Kreon",
		fontSize : "20px",
		hideIcons : false ,
		inputBackgroundColor : "blanchedalmond",
		inputFontColor : "blue",
		height : "700px",
		memberListFontColor : "#ff00dd",
		memberListBackgroundColor : "white"
	}
	
	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}, 100);
}
