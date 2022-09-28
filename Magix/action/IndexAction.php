<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/AnswerDAO.php");

    class Action extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {

        }
    }