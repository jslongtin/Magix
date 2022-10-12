<?php
    require_once("action/DeckAction.php");

    $action = new DeckAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<div id="deck">
    <div class="stats"></div>
    <button name="deck" onclick="modifierDeck()">Modifier son deck</button>
    <form action="" method="post">
        <button name="retour" type="submit">Retour</button>
    </form>
    
    <iframe  id="deckAPI"  src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"] ?>">
    </iframe>
 
    
    </div>
<?php
    require_once("partial/footer.php");