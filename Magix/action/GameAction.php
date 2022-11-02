<?php
    require_once("action/CommonAction.php");
 

    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            
            if (isset($_POST["quitter"])){
                header("location:Lobby.php");
                exit;
            }
            else if(isset($_POST["endTurn"])){
                $data = [];
                $data["key"] = $_SESSION["key"];
                $data["type"] = "END_TURN";
                $result = parent::callAPI("games/action", $data);
            }
            else if(isset($_POST["surrender"])){
                $data = [];
                $data["key"] = $_SESSION["key"];
                $data["type"] = "SURRENDER";
                $result = parent::callAPI("games/action", $data);
            }
            else if(isset($_POST["heroPower"])){
                $data = [];
                $data["key"] = $_SESSION["key"];
                $data["type"] = "HERO_POWER";
                $result = parent::callAPI("games/action", $data);
            }
            
        }
    }