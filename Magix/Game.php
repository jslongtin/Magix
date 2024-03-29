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
      <div id="nameOpp"></div>
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
      <div id="buttons">
      <button id="chatGameToggle" type="submit" onclick="toggleChat()">Toggle chat</button>
      <button id="legendToggleBTN" type="submit" onclick="toggleLegend()">Legend</button>
      </div>
      <div id="message"></div>
    </div>
    <div id="boardOpponentContainer"></div>
    <div id="boardCardContainer"></div>
  </div>

  <div id="player">
    <div id="info">
      <div id="legend">
        Hero power legend
        <p><b>Warrior</b>: Spawn a 1/1 taunt minion</p>
        <p><b>Priest</b>: Give a random friendly minion +2 HP</p>
        <p><b>Hunter</b> : Draw 1 card</p>
        <p><b>Warlock</b>: Leech 2 HP from the opponent's hero</p>
        <p><b>DemonHunter</b>: Deal 1 HP to the left+right most minions. 2 HP if 1 minion or 3 HP to the hero if no minion</p>
        <p><b>Rogue</b>: Spawn a 1/1 minion with charge and stealth</p>
        <p><b>Paladin</b>: Spawn a 0/1 minion that randomly gives +1/+1 to a friendly minion at the start of your turn</p>
        <p><b>Shaman</b>: Spawn a 0/1 minion that deals 2 HP to the opponent's hero at the end of your turn</p>
        <p><b>Druid</b>: Spawn a 1/1 minion, restore 2 HP to your hero</p>
        <p><b>Mage</b>: Randomly deal 3 HP to enemies</p>
      </div>
      <div id="playerIcon"></div>
      <div>
        <div id="class"></div>
        <div id="healthBar">
          <div id="vies">0</div>
        </div>
        <div id="mana"></div>

        <div id="remaining"></div>
      </div>
    </div>

    <div id="card-container"></div>
    <div id="action-buttons">
      <button name="heroPower" onclick="heroPower()" type="submit">Hero Power</button>
      <button name="endTurn" onclick="endTurn()" type="submit">End Turn</button>
      <button name="surrender" onclick="surrender()" type="submit">Surrender</button>
      <button id="quitter" name="quitter" onclick="quitGame()" type="submit">Quitter</button>
    </div>

  </div>

</div>
<?php
require_once("partial/footer.php");
