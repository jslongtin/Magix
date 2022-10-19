<?php
    require_once("action/CommonAction.php");
 

    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            
            if (isset($_POST["Quitter"])){
                header("location:Lobby.php");
                exit;
            }
        }
    }