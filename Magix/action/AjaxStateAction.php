<?php
require_once("action/CommonAction.php");

class AjaxStateAction extends CommonAction
{

	public function __construct()
	{
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction()
	{
		$result = "";
		if(!empty($_POST["type"])){
			if ($_POST["type"] == "HERO_POWER") {
				$data = [];
				$data["key"] = $_SESSION["key"];
				$data["type"] = "HERO_POWER";
				$result = parent::callAPI("games/action", $data);
			}
			else if ($_POST["type"] == "END_TURN") {
				$data = [];
				$data["key"] = $_SESSION["key"];
				$data["type"] = "END_TURN";
				$result = parent::callAPI("games/action", $data);
			}
			else if ($_POST["type"] == "SURRENDER") {
				$data = [];
				$data["key"] = $_SESSION["key"];
				$data["type"] = "SURRENDER";
				$result = parent::callAPI("games/action", $data);
			}
			
		}
		 else {
			$data = [];
			$data["key"] = $_SESSION["key"];
			$result = parent::callAPI("games/state", $data);
		}
		return compact("result");
	}
}
