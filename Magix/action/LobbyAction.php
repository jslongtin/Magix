<?php
    require_once("action/CommonAction.php");

    class LobbyAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $deconnectionError = false;
            if(isset($_POST["deconnexion"])) {
            $data = [];
            $data["key"] = $_SESSION["key"];

            $result = parent::callAPI("signout", $data);

            if ($result == "INVALID_KEY") {
                $deconnectionError = true;
            } 
            else {
                $_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
                header("location:Index.php");
                exit;
            }
            }
            else if(isset($_POST["jouer"])){

            }
            else if(isset($_POST["pratique"])){

            }
            else if(isset($_POST["deck"])){
                header("location:Deck.php");
                exit;
            }
            
        return compact("deconnectionError");
        }
    }