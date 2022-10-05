<?php
    require_once("action/DeckAction.php");

    $action = new DeckAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>

<?php
    require_once("partial/footer.php");