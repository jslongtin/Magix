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
</div>
<?php
    require_once("partial/footer.php");