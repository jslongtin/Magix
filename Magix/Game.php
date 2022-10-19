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

<!-- health bar -->
<div class="health">
  <div class="gridBar">

  </div>

  <div class="count">
    <h1></h1>
  </div>
</div>

<div class="emptyHealth">
  <div class="emptyBar">
  </div>
  <div class="spacer"></div>
</div>



</div>
<?php
    require_once("partial/footer.php");

    