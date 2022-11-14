<?php
require_once("action/CommonAction.php");
require_once("action/DAO/StatsCardsDAO.php");

class AjaxStateAction extends CommonAction
{

	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction()
	{
		$result = "";
		$data = [];
		
		if(!empty($_POST["type"])){
			if ($_POST["type"] == "HERO_POWER") {
				$data["key"] = $_SESSION["key"];
				$data["type"] = "HERO_POWER";
				$result = parent::callAPI("games/action", $data);
			}
			else if ($_POST["type"] == "END_TURN") {
				
				$data["key"] = $_SESSION["key"];
				$data["type"] = "END_TURN";
				$result = parent::callAPI("games/action", $data);
			}
			else if ($_POST["type"] == "SURRENDER") {
				
				$data["key"] = $_SESSION["key"];
				$data["type"] = "SURRENDER";
				$result = parent::callAPI("games/action", $data);
			}
			else if ($_POST["type"] == "PLAY") {
				$data["key"] = $_SESSION["key"];
				$data["type"] = "PLAY";
				$data["uid"] = $_POST["uid"];
				$result = parent::callAPI("games/action", $data);
				$add = StatsCardsDAO::addCardPlayed($_POST["id"]);
			}
			else if ($_POST["type"] == "ATTACK") {
				$data["key"] = $_SESSION["key"];
				$data["type"] = "ATTACK";
				$data["uid"] = $_POST["uid"];
				$data["targetuid"] = $_POST["targetuid"];
				$result = parent::callAPI("games/action", $data);
			}
		}
		else {
			$data["key"] = $_SESSION["key"];
			$result = parent::callAPI("games/state", $data);
		}
		return compact("result");
	}
}
