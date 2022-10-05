<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/AnswerDAO.php");

    class IndexAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $data = [];
            $key = $_SESSION["key"];
            $data["username"] = "Name_Hidden";
            $data["password"] = "Biotech1";

            $result = parent::callAPI("signin", $data);

            if ($result == "INVALID_USERNAME_PASSWORD") {
                // message erreur
            }
            else {
                // Pour voir les informations retournées : var_dump($result);exit;
                $key = $result->key;//(mettre la cle en session)
                
            }

        }
    }