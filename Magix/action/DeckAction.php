<?php
    require_once("action/CommonAction.php");

    class DeckAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
        // if (isset($_POST["Deck"])) {
        //     modfierDeck();
        // }
        if (isset($_POST["retour"])){
            header("location:Lobby.php");
            exit;
        }
    }
}