<?php
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>

<script defer src="js/game.js"></script>

<div id="game">
  <div id="opponent">
    <div id="opponentInfo">
      <div id="classOpponent"></div>
      <div id="hpOpponent"></div>
      <div id="manaOpponent"></div>
      <div id="remainingCardsOpponent"></div>
    </div>
    <div id="opponentIcon"></div>
    <div id="opponentCards"></div>
  </div>

  <div id="board">
    <div id="gameInfo">
      <iframe id="chatGame" style="width:700px;height:562px;bottom:1px" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
      </iframe>
      <div id="timer">
        <div id="timerValue"></div>
        <div class="overwatch-loader" id="timerAnim">
          <svg class="overwatch-logo" viewbox="0 0 1000 1000">
            <svg xmlns="http://www.w3.org/2000/svg">
              <circle cx="50%" cy="50%" r="300" fill="#fff" />
            </svg>
          </svg>
          <svg class="circularCW" viewbox="0 0 1000 1000">
            <circle class="path" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
          </svg>
          <svg class="circularCCW" viewbox="0 0 1000 1000" style="animation-duration: 1.5s">
            <circle class="path2" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
          </svg>
          <svg class="circularCW" viewbox="0 0 1000 1000">
            <circle class="path3" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
          </svg>
          <svg class="circularCW" viewbox="0 0 1000 1000">
            <circle class="path4" cx="500" cy="500" r="355" stroke="#fa9c1e" fill="none" />
          </svg>
          <svg class="circularCW" viewbox="0 0 1000 1000">
            <circle class="path5" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
          </svg>
          <svg class="circularCW" viewbox="0 0 1000 1000">
            <circle class="path6" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
          </svg>
          <svg class="circularCCW" viewbox="0 0 1000 1000">
            <circle class="path7" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
          </svg>
          <svg class="circularCCW" viewbox="0 0 1000 1000" style="animation-timing-function: ease-in-out">
            <circle class="path8" cx="500" cy="500" r="420" stroke="#fff" fill="none" />
          </svg>
        </div>

      </div>
      <div id="turn"></div>
      <button id="chatGameToggle" type="submit" onclick="toggleChat()">Toggle chat</button>
      <div id="message"></div>
    </div>
    <div id="boardOpponentContainer"></div>
    <div id="boardCardContainer"></div>
  </div>

  <div id="player">
    <div id="info">
      <div id="playerIcon"></div>
      <div>
        <!-- health bar -->
        <div id="healthBar">
          <div id="vies">0</div>
          <!-- <progress id="health" value="100" max="100"> </progress> -->
        </div >
        <div id="mana"></div>

        <div id="remaining"></div>
      </div>
    </div>

    <div id="card-container"></div>
    <div id="action-buttons">
      <button name="heroPower" onclick="heroPower()" type="submit">Hero Power</button>
      <button name="endTurn" onclick="endTurn()" type="submit">End Turn</button>
      <button name="surrender" onclick="surrender()" type="submit">Surrender</button>
      <button name="quitter" onclick="quitGame()" type="submit">Quitter</button>
    </div>

  </div>



</div>
<?php
require_once("partial/footer.php");
