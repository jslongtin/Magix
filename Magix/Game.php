<?php
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<script defer src="js/game.js"></script>
<div id="game">

  <div id="opponent">
    <div id="opponentHand"></div>
  </div>
  <div id="board">
    <div id="gameInfo">
      <div id="timer"></div>
      <div id="turn"></div>
    </div>
    <div id="boardOpponentContainer"></div>
    <div id="boardCardContainer"></div>
  </div>
  <div id="player">
    <div id="info">
      <div id="message"></div>

      <!-- health bar -->
      <div id="healthBar">
        <div id="vies">0</div>
        <!-- <progress id="health" value="100" max="100"> </progress> -->
      </div>
      <div id="mana"></div>

      <div id="remaining"></div>
    </div>
    <div id="card-container"></div>
    <div id="action-buttons">
      <button name="heroPower" onclick="heroPower()">Hero Power</button>
      <button name="endTurn" onclick="endTurn()">End Turn</button>
      <button name="surrender" onclick="surrender()">Surrender</button>
      <button name="quitter" onclick="quitGame()">Quitter</button>
    </div>
  </div>
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
