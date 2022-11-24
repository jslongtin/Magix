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
		$error = "";
		
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
			else if ($_POST["type"] == "BD"){
				$result = StatsCardsDAO::getPopularite();
			}
			else if ($_POST["type"] == "icon"){
				$result = $_SESSION["heroChoisi"];
			}
		}
		// if(is_string($result)){
		// 	$error =  $result; 
		// }
		// if($result == "INVALID_KEY"){
		// }
		// if($result == "INVALID_ACTION"){
		// }
		// if($result == "ACTION_IS_NOT_AN_OBJECT"){
		// }
		// if($result == "NOT_ENOUGH_ENERGY"){
		// }
		// if($result == "BOARD_IS_FULL "){
		// }
		// if($result == "CARD_NOT_IN_HAND"){
		// }
		// if($result == "CARD_IS_SLEEPING"){
		// }
		// if($result == "MUST_ATTACK_TAUNT_FIRST"){
		// }
		// if($result == "OPPONENT_CARD_NOT_FOUND"){
		// }
		// if($result == "OPPONENT_CARD_HAS_STEALTH"){
		// }
		// if($result == "CARD_NOT_FOUND"){
		// }
		// if($result == "ERROR_PROCESSING_ACTION"){
		// }
		// if($result == "INTERNAL_ACTION_ERROR"){
		// }
		// if($result == "HERO_POWER_ALREADY_USED"){
		// }
		
		
		else {
			$data["key"] = $_SESSION["key"];
			$result = parent::callAPI("games/state", $data);
		}

		return compact("result");
	}
}
