<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<iframe style="width:700px;height:240px;" 
        src="https://magix.apps-de-cours.com/server/#/chat/<?=$_SESSION["key"]?>">
</iframe>

<?php
    require_once("partial/footer.php");