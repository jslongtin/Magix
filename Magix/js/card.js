

// methode de construction de carte pour eviter la repetition
const makeCard = (element, imageId ) => {
    let img = document.createElement("img");
    img.alt = "carte";
    img.style = "width:100%";
    img.src = cardImage(imageId);
    let carte = document.createElement("div");
    
    let container = document.createElement("div");
    if (element != 0){
        carte.classList.add("card");
        // si la carte peut etre jouée
        if (element.state == "idle"){
            carte.classList.add("playableCard");
        }
    container.classList.add("container");
    let name = document.createElement("h4");
    let textName = element.id;
    let bold = document.createElement("b");
    let info = document.createElement("p");
    element.mechanics.forEach(e => {
        if ( e == "taunt"){
            // image taunt
        }
        else if ( e == "charge"){
            // image charge
        }
        else if ( e == " stealth "){
            // 
        }
        else if ( e == "confused "){
            
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
    // container.append(baseHP);
    }
    else{
        carte.classList.add("cardEnemy");
      
    }
    carte.append(img);
    carte.append(container);
    return carte
}
//retourne une image pour la carte selon le id
const cardImage= (id) => {
    // console.log(id);
    let image;
    let cheminImage;
    //  pour l'implementation futur du hero selection screen
     if (id.length < 2 ){
        cheminImage = "img/Cartes/";
     }
     else{
        cheminImage = "img/CartesNum/";
     }
    if (id<=34){
     image =  cheminImage + id.toString() +".png";
    }
    else if (id>34 && id <= 68){
        image =  cheminImage + (id-34).toString() +".png";
    }
    else if (id> 68 && id <= 101){
        image =  cheminImage + (id-68).toString() +".png";
    }
    else {
        image =  "img/cardback.png";
        
    }
    return image;
}
export default makeCard;