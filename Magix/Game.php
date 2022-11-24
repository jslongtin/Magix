<?php
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<script defer src="js/game.js"></script>

<div id="game">
  <iframe id="chatGame"  style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
    </iframe>
  <div id="opponent">
    <div id="opponentInfo"></div>
    <div id="opponentCards"></div>
    <div id="opponentIcon"></div>
  </div>

  <div id="board">
    <div id="gameInfo">
      <div id="timer"></div>
      <div id="turn"></div>
      <button id="chatGameToggle" type="submit">Toggle chat</button>
    </div>
    <div id="boardOpponentContainer"></div>
    <div id="boardCardContainer"></div>
  </div>

  <div id="player">
    <div id="info">
      <!-- health bar -->
      <div id="healthBar">
        <div id="vies">0</div>
        <!-- <progress id="health" value="100" max="100"> </progress> -->
      </div>
      <div id="mana"></div>

      <div id="remaining"></div>
    </div>
    <div id="card-container"></div>
    <div id="playerIcon"></div>
    <div id="action-buttons">
      <button name="heroPower" onclick="heroPower()" type="submit">Hero Power</button>
      <button name="endTurn" onclick="endTurn()" type="submit">End Turn</button>
      <button name="surrender" onclick="surrender()" type="submit">Surrender</button>
      <button name="quitter" onclick="quitGame()" type="submit">Quitter</button>
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
