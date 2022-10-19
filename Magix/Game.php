<?php
    require_once("action/GameAction.php");

    $action = new GameAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<script defer src="js/game.js"></script>
<div id="game">
<div id="message"></div>
<form action="" method="post">
    <button name="Quitter" type="submit">Quitter</button>
</form>

<div id="timer"></div>


<!-- health bar -->
<div id="healthBar">
<div id="vies">0</div>
<progress id="health" value="100" max="100"> </progress>
</div>

<!-- card exemple -->
<div class="card">
  <img src="img_avatar.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4>
    <p>Architect & Engineer</p>
  </div>
</div>


</div>
<?php
    require_once("partial/footer.php");

    