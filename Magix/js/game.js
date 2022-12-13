
let myHand = [];
let opponantHand = [];
let myBoard = [];
let opponentBoard = [];
let mana = 0;
let count = 0;
let isCardSelected = null;
let hand = document.querySelector("#card-container");
let opponent = document.querySelector("#opponent");
let messages = document.querySelector("#message");

const state = () => {
    fetch("ajax-state.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            if (data == "WAITING") {
                messages.style.display = "block";
                messages.innerHTML = data;
            }
            else if (data == "LAST_GAME_WON") {
                messages.style.display = "block";
                messages.innerHTML = "VICTOIRE";
                messages.setAttribute("id", "messagesFin");

            }
            else if (data == "LAST_GAME_LOST") {
                messages.style.display = "block";
                messages.innerHTML = "DEFAITE";
                messages.setAttribute("id", "messagesFin");
            }
            else {
                if (count == 0) {
                    count++;
                    messages.style.display = "none";
                    let playerImage = document.querySelector("#playerIcon");
                    playerImage.innerHTML = null;

                    let opponentImage = document.querySelector("#opponentIcon");
                    opponentImage.innerHTML = null;
                    let opponentIcon = document.createElement("img");
                    console.log(data);
                    if (data.opponent.heroClass.includes("Warlock")) {
                        opponentIcon.src = "img/Cartes/Moira.png";
                    }
                    else if (data.opponent.heroClass.includes("Demonhunter")) {
                        opponentIcon.src = "img/Cartes/Reaper.png";
                    }
                    else if (data.opponent.heroClass.includes("Druid")) {
                        opponentIcon.src = "img/Cartes/Zenyatta.png";
                    }
                    else if (data.opponent.heroClass.includes("Paladin")) {
                        opponentIcon.src = "img/Cartes/Reinhardt.png";
                    }
                    else if (data.opponent.heroClass.includes("Warrior")) {
                        opponentIcon.src = "img/Cartes/Soldier76.png";
                    }
                    else if (data.opponent.heroClass.includes("Hunter")) {
                        opponentIcon.src = "img/Cartes/Hanzo.png";
                    }
                    else if (data.opponent.heroClass.includes("Rogue")) {
                        opponentIcon.src = "img/Cartes/Genji.png";
                    }
                    else if (data.opponent.heroClass.includes("Priest")) {
                        opponentIcon.src = "img/Cartes/Mercy.png";
                    }
                    else if (data.opponent.heroClass.includes("Shaman")) {
                        opponentIcon.src = "img/Cartes/Kiriko.png";
                    }
                    else if (data.opponent.heroClass.includes("Mage")) {
                        opponentIcon.src = "img/Cartes/Mei.png";
                    }
                    else { opponentIcon.src = "img/Cartes/Reaper.png"; }


                    opponentIcon.classList.add("img");

                    opponentImage.append(opponentIcon);
                    let playerIcon = document.createElement("img");
                    let formData = new FormData();
                    formData.append("type", "icon");
                    fetch("ajax-state.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            playerIcon.src = "img/Cartes/" + data + ".png";
                        });

                    playerIcon.alt = "playerIcon";
                    playerIcon.classList.add("img");
                    playerImage.append(playerIcon);
                    opponentIcon.onclick = () => {
                        if (isCardSelected != null) {
                            attack(isCardSelected, 0);
                            isCardSelected = null;
                        }
                    };
                }
                let classname = document.querySelector("#class").innerHTML = "class: " + data.heroClass;
                let healthbar = document.querySelector("#vies").innerHTML = "hp: " + data.hp;
                let timer = document.querySelector("#timerValue").innerHTML = data.remainingTurnTime;
                let manaSelect = document.querySelector("#mana").innerHTML = "mana: " + data.mp;
                let turn = document.querySelector("#turn").innerHTML = data.yourTurn == true ? "Your turn" : "Enemy turn";
                let remainingCards = document.querySelector("#remaining").innerHTML = "cartes restantes: " + data.remainingCardsCount;

                refreshGame(data);
            }
            setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel
        })
}
// Refresh genral avec des conditions pour chaques sections si modifications dans le JSON
let refreshGame = (data) => {
    if (typeof data != "object") {
        messages.style.display = "block";
        messages.setAttribute("id", "messageErreurs");
        messages.innerHTML = data;
        setTimeout(() => {
            messages.style.display = "none";
            messages.removeAttribute("id", "messageErreurs");
        }, 2000);
    }
    else {
        if (JSON.stringify(data.hand) != JSON.stringify(myHand) || mana != data.mp) {
            hand.innerHTML = null;
            mana = data.mp;
            let main = data.hand;
            main.forEach(element => {
                let carte = makeCard(element, element.id);
                if (element.cost <= data.mp) {
                    carte.classList.add("playableCard")
                }
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
                            refreshGame(data)
                        });
                };
            })
            myHand = data.hand
        }
        if (JSON.stringify(data.opponent.handSize) != JSON.stringify(opponantHand)) {
            let opponentCards = document.querySelector("#opponentCards");
            opponentCards.innerHTML = null;
            let opponentHandSize = data.opponent.handSize;
            for (let i = 0; i < opponentHandSize; i++) {
                let carte = makeCard(0, 102);
                opponentCards.append(carte);
            }
            opponantHand = data.opponent.handSize
        }
        if (JSON.stringify(data.board) != JSON.stringify(myBoard)) {

            let board = document.querySelector("#boardCardContainer");
            board.innerHTML = null;
            let boardCards = null;
            boardCards = data.board;
            boardCards.forEach(element => {
                let carte = makeCard(element, element.id);
                board.append(carte);
                carte.onclick = () => {

                    carte.classList.add("isSelected");
                    isCardSelected = element.uid;
                };
            })
            myBoard = data.board
        }
        if (JSON.stringify(data.opponent.board) != JSON.stringify(opponentBoard)) {

            let boardOpponent = null;
            boardOpponent = data.opponent.board;
            let boardCardOpponent = document.querySelector("#boardOpponentContainer");
            boardCardOpponent.innerHTML = null;
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
            opponentBoard = data.opponent.board
        }

         

        let opponentInfos = document.querySelector("#opponentInfo");
        let opponentclass = document.querySelector("#classOpponent");
        let opponentHealth = document.querySelector("#hpOpponent");
        let opponentMp = document.querySelector("#manaOpponent");
        let nomOpponent = document.querySelector("#nameOpp");
        nomOpponent.innerHTML = null;
        nomOpponent.innerHTML = "Username :" + data.opponent.username;
        let opponentRemainingCards = document.querySelector("#remainingCardsOpponent");
        opponentclass.innerHTML = null;
        opponentHealth.innerHTML = null;
        opponentMp.innerHTML = null;
        opponentRemainingCards.innerHTML = null;
        opponentclass.innerHTML = "class :" + data.opponent.heroClass;
        opponentHealth.innerHTML = "hp :" + data.opponent.hp;
        opponentMp.innerHTML = "mana :" + data.opponent.mp;
        opponentRemainingCards.innerHTML = "Cartes restantes :" + data.opponent.remainingCardsCount;

    }
}
// methode de construction de carte pour eviter la repetition
const makeCard = (element, imageId) => {
    let carte = document.createElement("div");
    let container = document.createElement("div");
    if (element != 0) {
        let img = document.createElement("div");

        img.classList.add("imgCard");
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

        if (element.mechanics.includes("Taunt")) {
            img.style.backgroundImage = "url(img/Cartes/Tracer.png)";
        }
        else if (element.mechanics.includes("Charge")) {
            img.style.backgroundImage = "url(img/Cartes/Reinhardt.png)";
        }
        else if (element.mechanics.includes("Stealth")) {
            img.style.backgroundImage = "url(img/Cartes/Sombra.png)";
        }
        else if (element.mechanics.includes("Confused")) {
            img.style.backgroundImage = "url(img/Cartes/Junkrat.png)";
        }
        else {
            img.style.backgroundImage = "url(" + cardImage(imageId) + ")";
        }

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
        info.append(textTnfo);
        bold.append(textName);
        name.append(bold);
        container.append(info);
        carte.append(hp);
        carte.append(atk);
        carte.append(cost);
        carte.append(img);
        if (element.state == "SLEEP") {
            let sleep = document.createElement("div");
            sleep.classList.add("sleep")
            carte.append(sleep)
        }
    }
    else {
        carte.classList.add("cardEnemy");
    }
    carte.append(container);
    return carte
}

//retourne une image pour la carte selon le id
const cardImage = (id) => {
    let image;
    let cheminImage = "img/CartesNum/";

    if (id <= 31) {
        image = cheminImage + id.toString() + ".png";
    }
    else if (id > 31 && id <= 62) {
        image = cheminImage + (id - 31).toString() + ".png";
    }
    else if (id > 62 && id <= 93) {
        image = cheminImage + (id - 62).toString() + ".png";
    }
    else if (id > 93 && id <= 101) {
        image = cheminImage + (id - 93).toString() + ".png";
    }
    else if (id == 102) {
        image = "img/cardback.png";
    }
    else {
        // carte generique
        image = "img/Cartes/omnic.jpg";
    }
    return image;
}

const heroPower = () => {
    let formData = new FormData();
    formData.append("type", "HERO_POWER");
    fetch("ajax-state.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {

            refreshGame(data);
        });
}

const endTurn = () => {
    let formData = new FormData();
    formData.append("type", "END_TURN");
    fetch("ajax-state.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            refreshGame(data);
        });
}

const surrender = () => {
    let formData = new FormData();
    formData.append("type", "SURRENDER");
    fetch("ajax-state.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {

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
    fetch("ajax-state.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            refreshGame(data);

        });
}

window.addEventListener("load", () => {
    setTimeout(state, 1000); // Appel initial (attendre 1 seconde)
});


