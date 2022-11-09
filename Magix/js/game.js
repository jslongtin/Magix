const state = () => {
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {

            console.log(data); // contient les cartes/état du jeu.
            let node = document.querySelector("#message");
            node.innerHTML = data;

           // FAIRE healt bar
            let healthbar = document.querySelector("#vies").innerHTML = data.hp;;
            let timer = document.querySelector("#timer").innerHTML = data.remainingTurnTime;
            let mana = document.querySelector("#mana").innerHTML = data.mp;
            let turn = document.querySelector("#turn").innerHTML = data.yourTurn == true ? "Your turn" : "Enemy turn";
            let remainingCards = document.querySelector("#remaining").innerHTML = data.remainingCardsCount;


            let hand = document.querySelector("#card-container");
            hand.innerHTML = null;
            let opponent = document.querySelector("#enemy");
            enemy.innerHTML = null;
            let board = document.querySelector("#boardCardContainer");
            board.innerHTML = null;
            let boardCardOpponent = document.querySelector("#boardOpponentContainer");
            boardCardOpponent.innerHTML = null;

            let isCardSelected = null;

            // console.log(main);
            if (data != "WAITING") {
                let main = null;
                main = data.hand;
                let boardCards = null;
                boardCards = data.board;
                let boardOpponent = null;
                boardOpponent = data.opponent.board;
                let opponentHand = null;
                opponentHand = data.opponent.handSize;

                main.forEach(element => {
                    let carte = makeCard(element, element.id);
                    hand.append(carte);
                    carte.onclick = () => {
                        // play
                        // board.append(carte);
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
                })
                for (let i = 0; i < opponentHand; i++) {
                    let carte = makeCard(0, 102);
                    opponent.append(carte);
                }
                boardCards.forEach(element => {
                    let carte = makeCard(element, element.id);
                    board.append(carte);
                    carte.onclick = () => {
                        carte.classList.add("isSelected");
                        isCardSelected = element.uid;
                    };
                })
                boardOpponent.forEach(element => {
                    let carte = makeCard(element, element.id);
                    boardCardOpponent.append(carte);
                    carte.onclick = () => {
                        if (isCardSelected != null){
                           attack(isCardSelected,element.uid);
                        }
                    };
                })
            };

            setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel
        })
}
// methode de construction de carte pour eviter la repetition
const makeCard = (element, imageId ) => {
    let img = document.createElement("img");
    img.alt = "carte";
    img.style = "width:100%";
    img.src = cardImage(imageId);
    let carte = document.createElement("div");
    carte.classList.add("card");
    let container = document.createElement("div");
    if (element != 0){
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
    }
    carte.append(img);
    carte.append(container);
    return carte
}
const cardImage= (id) => {
    console.log(id);
    let image;
    if (id<=34){
     image =  "img/CartesNum/" + id.toString() +".png";
    }
    else if (id>34 && id <= 68){
        image =  "img/CartesNum/" + (id-34).toString() +".png";
    }
    else if (id> 68 && id <= 101){
        image =  "img/CartesNum/" + (id-68).toString() +".png";
    }
    else {
        image =  "img/cardback.png";
    }
    return image;
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
            // console.log(data);
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
            // console.log(data);
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
            // console.log(data);
        });
}
const quitGame = () => {
    window.location.href = "Lobby.php";
}

const attack = (uidCarteMain,uidTarget) => {
    let formData = new FormData();
    formData.append("type", "ATTACK");
    formData.append("uid", uidCarteMain);
    formData.append("targetuid", uidTarget);
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST",
        body: formData       // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}

window.addEventListener("load", () => {
    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)
});



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