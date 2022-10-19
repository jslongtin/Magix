<?php
require_once("action/CommonAction.php");

class LobbyAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        $deconnectionError = false;
        $KeyError = false;
        $TypeError = false;
        $DeckError = false;

        if (isset($_POST["deconnexion"])) {
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
        } else if (isset($_POST["jouer"])) {
            $data = [];
            $data["key"] = $_SESSION["key"];
            $data["type"] = "PVP";
            $data["mode"] = "STANDARD";


            $result = parent::callAPI("games/auto-match", $data);

            if ($result == "INVALID_KEY") {
                $KeyError = true;
            }
            if ($result == "INVALID_GAME_TYPE") {
                $TypeError = true;
            }
            if ($result == "DECK_INCOMPLETE") {
                $DeckError = true;
            } else {
                header("location:Game.php");
                exit;
            }
        } 
        else if (isset($_POST["pratique"])) {
            $data = [];
            $data["key"] = $_SESSION["key"];
            $data["type"] = "TRAINING";
            $data["mode"] = "STANDARD";


            $result = parent::callAPI("games/auto-match", $data);

            if ($result == "INVALID_KEY") {
                $KeyError = true;
            }
            if ($result == "INVALID_GAME_TYPE") {
                $TypeError = true;
            }
            if ($result == "DECK_INCOMPLETE") {
                $DeckError = true;
            } 
            else {
                header("location:Game.php");
                exit;
            }
        } 
        else if (isset($_POST["deck"])) {
            header("location:Deck.php");
            exit;
        }

        return compact("deconnectionError", "KeyError","TypeError" , "DeckError");
    }
}
