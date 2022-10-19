const state = () => {
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
 method : "POST"        // l’API (games/state)
    })
.then(response => response.json())
.then(data => {
    console.log(data); // contient les cartes/état du jeu.
    let node = document.querySelector("#message");
    node.innerHTML = data;

    //affiche la vie
    let healthbar = document.querySelector("#vies").innerHTML = data.hp;
    let timer = document.querySelector("#timer").innerHTML =  data.remainingTurnTime;


    // //changer la value d'une healthbar
    // let health = document.getElementById("health")
    // health.value -= 10;

    //tout les attrubuit du jeu
    // data.remainingTurnTime
    // data.heroPowerAlreadyUsed
    // data.yourTurn"yourTurn": true,
    // data.maxHp
    // data.heroClass
    // data.talent
    // data.mp
    // data.maxMp
    // data.hand[]
    //     {"id":4,"cost":2,"hp":3,"atk":2,"mechanics":[], "uid":3,"baseHP":3},
// {"id":22,"cost":7,"hp":7,"atk":7,"mechanics":[],"uid":5,"baseHP":7},
// {"id":10,"cost":3,"hp":3,"atk":3,"mechanics":["taunt", "charge"],"uid":6,"baseHP":3}

        
    // data.board[],{"id":2,"cost":1,"hp":1,"atk":2,"mechanics":[],"uid":7,"baseHP":1,"state":"SLEEP"}
    // data.remainingCardsCount
    // data.welcomeText
    // data.opponent[]
    //  {
    //     "username": "Hybrid-AI",
    //     "heroClass": "Warlock",
    //     "talent": "ExtraCard",
    //     "trophyCount": 0,
    //     "winCount": 0,
    //     "lossCount": 1,
    //     "hp": 30,
    //     "maxHp": 30,
    //     "mp": 0,
    //     "maxMp": 1,
    //     "board": [],
    //     "handSize": 5,
    //     "remainingCardsCount": 25,
    //     "welcomeText": "Agility is the key"
    // },
    // data.latestActions []
    setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel
    })
}

window.addEventListener("load", () => {
setTimeout(state, 1000); // Appel initial (attendre 1 seconde)
});


