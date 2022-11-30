<?php
require_once("action/CommonAction.php");
require_once("action/DAO/StatsCardsDAO.php");
class DeckAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        $result = "";
        if (isset($_POST["retour"])) {
            header("location:Lobby.php");
            exit;
        } else if (isset($_POST["clear"])) {
            $result = StatsCardsDAO::clear();
        }
    }
}
