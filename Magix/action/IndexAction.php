<?php
require_once("action/CommonAction.php");


class IndexAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
    }

    protected function executeAction()
    {
        $connectionError = false;
        if (isset($_POST["Username"]) && isset($_POST["Password"])) {
            $data = [];
            $data["username"] = $_POST["Username"];
            $data["password"] = $_POST["Password"];

            $result = parent::callAPI("signin", $data);

            if ($result == "INVALID_USERNAME_PASSWORD") {
                $connectionError = true;
            } else {
                // Pour voir les informations retournées : var_dump($result);exit;
                $key = $result->key;
                //(mettre la cle en session)
                $_SESSION["key"] = $key;
                $_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
                header("location:Lobby.php");
                exit;
            }
        }
        return compact("connectionError");
    }
}
