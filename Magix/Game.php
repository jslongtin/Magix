<?php
    require_once("action/GameAction.php");

    $action = new GameAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<script defer src="js/game.js"></script>

<div id="game">

</div>
<?php
    require_once("partial/footer.php");