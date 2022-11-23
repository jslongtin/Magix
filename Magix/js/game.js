let imageOpp = document.querySelector("#opponentIcon");
    
        let imagePlay = document.querySelector("#playerIcon");
        imagePlay.innerHTML = null;
            // playerIcon.classList.add("playerIcon");
           
let opponentIcon = document.createElement("img");
    opponentIcon.src = "img/Cartes/Reaper.png";
    opponentIcon.style = "height:100px";
    imageOpp.append(opponentIcon); 
    let playerIcon = document.createElement("img");
    playerIcon.src =  "img/CartesNum/1.png";
    playerIcon.alt = "playerIcon";
    playerIcon.style = "height:100px";
    imagePlay.append(playerIcon);   

const state = () => {
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {

            // console.log(data); // contient les cartes/état du jeu.
            let node = document.querySelector("#message");
            node.innerHTML = data;

            // FAIRE healt bar
            let healthbar = document.querySelector("#vies").innerHTML = data.hp;;
            let timer = document.querySelector("#timer").innerHTML = data.remainingTurnTime;
            let mana = document.querySelector("#mana").innerHTML = data.mp;
            let turn = document.querySelector("#turn").innerHTML = data.yourTurn == true ? "Your turn" : "Enemy turn";
            let remainingCards = document.querySelector("#remaining").innerHTML = data.remainingCardsCount;




            // let opponentHand = document.querySelector("#opponentHand");
            // // opponentHand.innerHTML = null;

            // faire methode refresh game pour l'utiliser dans le retour des actions
            if (data == "WAITING") {

            }
            else if (data == "LAST_GAME_WON") { }
            else if (data == "LAST_GAME_WON") { }
            else {
                refreshGame(data);
            }

            setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel
        })
}

const refreshGame = (data) => {
    let hand = document.querySelector("#card-container");
    hand.innerHTML = null;
    let opponent = document.querySelector("#opponent");
    opponent.innerHTML = null;
    
    let board = document.querySelector("#boardCardContainer");
    board.innerHTML = null;
    
    let isCardSelected = null;
    let boardCardOpponent = document.querySelector("#boardOpponentContainer");
    // boardCardOpponent .innerHTML = null;
   
    
    
    let main = null;
main = data.hand;
let boardCards = null;
boardCards = data.board;
let boardOpponent = null;
boardOpponent = data.opponent.board;
let opponentHandSize = null;
opponentHandSize = data.opponent.handSize;
        
        main.forEach(element => {
            let carte = makeCard(element, element.id);
            hand.append(carte);
            
            carte.onclick = () => {
                // play
                let formData = new FormData();
                formData.append("type", "PLAY");
                formData.append("uid", element.uid);
                formData.append("id", element.id);
                fetch("ajax-state.php", {   
                    method: "POST",
                    body: formData      
                })
                    .then(response => response.json())
                    .then(data => {
            
                    
                    });
            };
        })
   


    for (let i = 0; i < opponentHandSize; i++) {
        let carte = makeCard(0, 102);
        opponent.append(carte);
    }
    
    imageOpp.onclick = () => {
        if (isCardSelected != null) {
            attack(isCardSelected, 0);
            isCardSelected = null;
        }
    };
    let opponentHealth = data.opponent.hp;
    opponent.append(opponentHealth);
    let opponentMp = data.opponent.mp;
    opponent.append(opponentMp);
    let opponentRemainingCards = data.opponent.remainingCardsCount;
    opponent.append(opponentRemainingCards);
    boardCards.forEach(element => {
        let carte = makeCard(element, element.id);
        board.append(carte);
        carte.onclick = () => {
            console.log("click");
            carte.classList.add("isSelected");
            isCardSelected = element.uid;
        };
    })
    boardOpponent.forEach(element => {
        let carte = makeCard(element, element.id);
        boardCardOpponent.append(carte);
        carte.onclick = () => {
            if (isCardSelected != null) {
                attack(isCardSelected, element.uid);
                isCardSelected = null;

            }
        };
    })

}
// methode de construction de carte pour eviter la repetition
const makeCard = (element, imageId) => {

    let carte = document.createElement("div");

    let container = document.createElement("div");
    if (element != 0) {
        let img = document.createElement("img");
        img.alt = "carte";
        img.style = "width:100%";
        img.src = cardImage(imageId);
        carte.classList.add("card");
        // si la carte peut etre jouée
        if (element.state == "idle") {
            carte.classList.add("playableCard");
        }
        container.classList.add("container");
        let name = document.createElement("h4");
        let textName = element.id;
        let bold = document.createElement("b");
        let info = document.createElement("p");
        element.mechanics.forEach(e => {
            if (e == "taunt") {
                // image taunt
            }
            else if (e == "charge") {
                // image charge
            }
            else if (e == " stealth ") {
                // 
            }
            else if (e == "confused ") {

            }
        })
        let textTnfo = element.mechanics;
        let hp = document.createElement("div");
        hp.innerText = element.hp;
        hp.classList.add("hp");
        let atk = document.createElement("div");
        atk.innerText = element.atk;
        atk.classList.add("atk");
        let cost = document.createElement("div");
        cost.innerHTML = element.cost;
        cost.classList.add("cost");
        // let baseHP = element.baseHP;
        info.append(textTnfo);
        bold.append(textName);
        name.append(bold);
        container.append(name);
        container.append(info);
        container.append(hp);
        container.append(atk);
        container.append(cost);
        carte.append(img);
        // container.append(baseHP);
    }
    else {
        carte.classList.add("cardEnemy");
        carte.style.backgroundImage = "../img/cardback.png";

    }

    carte.append(container);
    return carte
}
//retourne une image pour la carte selon le id
const cardImage = (id) => {
    // console.log(id);
    let image;
    let cheminImage;
    //  pour l'implementation futur du hero selection screen
    if (id.length < 2) {
        cheminImage = "img/Cartes/";
    }
    else {
        cheminImage = "img/CartesNum/";
    }
    if (id <= 34) {
        image = cheminImage + id.toString() + ".png";
    }
    else if (id > 34 && id <= 68) {
        image = cheminImage + (id - 34).toString() + ".png";
    }
    else if (id > 68 && id <= 101) {
        image = cheminImage + (id - 68).toString() + ".png";
    }
    else {
        image = "img/cardback.png";

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
            refreshGame(data);
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
            refreshGame(data);
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
            refreshGame(data);
        });
}
const quitGame = () => {
    window.location.href = "Lobby.php";
}

const attack = (uidCarteMain, uidTarget) => {
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
            refreshGame(data);
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






            
    // //     <script>
    // // 	node.setAttribute("data-card-location", "hand");

    // // </script>

    // // <div id="deck" data-card-location="hand" data-543=""></div>

    // // regarder si les cartes dans le ajax sont dans la main sinon la créé et l'ajouter ,
    // // si la carte est deja la , regarder si ses stats ont changer et les modifs au besoin
    // // regarder si la main a plus de carte que le ajax si oui, faire remove child 
    // if (hand.childElementCount <= main.length) {
    //     main.forEach(element => {
    //         // si elle exite
    //         let carteCourante = hand.querySelectorAll("data-uid");
    //         carteCourante.forEach(e => {
    //             if (e == element) {
    //                 console.log("allo");
    //             }
    //             else {
    //                 let carte = makeCard(element, element.id);
    //                 carte.setAttribute("data-card-location", "hand");
    //                 carte.setAttribute("data-id", element.id);
    //                 hand.append(carte);

    //                 carte.onclick = () => {
    //                     // play
    //                     let formData = new FormData();
    //                     formData.append("type", "PLAY");
    //                     formData.append("uid", element.uid);
    //                     formData.append("id", element.id);
    //                     fetch("ajax-state.php", {
    //                         method: "POST",
    //                         body: formData
    //                     })
    //                         .then(response => response.json())
    //                         .then(data => {

    //                         });

    //                 };
    //             }
    //         })
    //     })





    // }
    // else if (hand.childElementCount > main.length) {
    //     main.forEach(element => {
    //         if (hand.querySelectorAll("data-id") == element) {
    //             console.log("allo");

    //         } else {
    //             hand.removeChild(hand.querySelectorAll("data-id"));
    //         }
    //     })
    // }