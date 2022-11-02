<?php
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<script defer src="js/game.js"></script>
<div id="game">


    <div id="enemy"></div>
    <div id="board">
        <div id="action-buttons">
            <div id="message"></div>
            <button name="heroPower" onclick="heroPower()">Hero Power</button>
            <button name="endTurn" onclick="endTurn()">End Turn</button>
            <button name="surrender" onclick="surrender()">Surrender</button>
            <button name="quitter" onclick="quitGame()">Quitter</button>
            <div id="timer"></div>
            <!-- health bar -->
            <div id="healthBar">
                <div id="vies">0</div>
                <progress id="health" value="100" max="100"> </progress>
            </div>
        </div>
    </div>
    <div id="card-container"></div>
    <!-- card exemple -->
    <!-- <div class="card">
  <img  alt="Carte" src="img/Cartes/1664932350_837161.png" style="width:100%">
  <div class="container">
    <h4><b>Name</b></h4>
    <p>infos</p>
  </div>
</div> -->


</div>
<?php
require_once("partial/footer.php");
