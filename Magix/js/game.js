const state = () => {
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
           
            console.log(data); // contient les cartes/état du jeu.
            let node = document.querySelector("#message");
            node.innerHTML = data;

            //affiche la vie
            let healthbar = document.querySelector("#vies").innerHTML = data.hp;
            let timer = document.querySelector("#timer").innerHTML = data.remainingTurnTime;
            let mana = document.querySelector("#mana").innerHTML = data.mp;
            let turn = document.querySelector("#turn").innerHTML = data.yourTurn == true ? "Your turn" :  "Enemy turn";
            let remainingCards = document.querySelector("#remaining").innerHTML = data.remainingCardsCount;
            
            
            let hand = document.querySelector("#card-container");
            hand.innerHTML = null;
            let opponent = document.querySelector("#enemy");
            enemy.innerHTML = null;
            let board = document.querySelector("#boardCardContainer");
           
          
            let main = null;
            main = data.hand;
            let boardCards = null;
            boardCards = data.board;
            let opponentHand = null;
            opponentHand = data.opponent.board;
            // console.log(main);
            if (data != "WAITING") {
                main.forEach(element => {
                    let img = document.createElement("img");
                    img.alt = "carte";
                    img.style = "width:100%";
                    img.src = "img/Cartes/1664932350_837161.png";
                    let carte = document.createElement("div");
                    carte.classList.add("card")
                    let container = document.createElement("div");
                    container.classList.add("container");
                    let name = document.createElement("h4");
                    let textName = element.id;
                    let bold = document.createElement("b");
                    let info = document.createElement("p");
                    let textTnfo = element.mechanics;
                    let hp = element.hp;
                    let atk = element.atk;
                    let cost = element.cost;
                    let baseHP = element.baseHP;
                    info.append(textTnfo);
                    bold.append(textName);
                    name.append(bold);
                    container.append(name);
                    container.append(info);
                    container.append(hp);
                    container.append(atk);
                    container.append(cost);
                    container.append(baseHP);
                    carte.append(img);
                    carte.append(container);
                    carte.onclick = () => {
                        // play
                        board.append(carte);
                        let formData = new FormData();
                        formData.append("type", "PLAY");
                        formData.append("uid", element.uid);
                        fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
                            method: "POST",
                            body: formData       // l’API (games/state)
                        })
                            .then(response => response.json())
                            .then(data => {
                            });
                    };
                    hand.append(carte);
                })
                opponentHand.forEach(element => {
                    let img = document.createElement("img");
                    img.alt = "carte";
                    img.style = "width:100%";
                    img.src = "img/Cartes/1664932350_837161.png";
                    let carte = document.createElement("div");
                    carte.classList.add("card")
                    let container = document.createElement("div");
                    container.classList.add("container");
                    let name = document.createElement("h4");
                    let textName = element.id;
                    let bold = document.createElement("b");
                    let info = document.createElement("p");
                    let textTnfo = element.mechanics;
                    let hp = element.hp;
                    let atk = element.atk;
                    let cost = element.cost;
                    let baseHP = element.baseHP;
                    info.append(textTnfo);
                    bold.append(textName);
                    name.append(bold);
                    container.append(name);
                    container.append(info);
                    container.append(hp);
                    container.append(atk);
                    container.append(cost);
                    container.append(baseHP);
                    carte.append(img);
                    carte.append(container);
                    
                    opponent.append(carte);
                })
                
            };

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

const heroPower = () => {
    let formData = new FormData();
    formData.append("type", "HERO_POWER");
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST",
        body: formData       // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}
const endTurn = () => {
    let formData = new FormData();

    formData.append("type", "END_TURN");
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST",
        body: formData       // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}
const surrender = () => {
    let formData = new FormData();
    formData.append("type", "SURRENDER");
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST",
        body: formData       // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}
const quitGame = () => {
    window.location.href = "Lobby.php";
}

window.addEventListener("load", () => {
    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)
});


