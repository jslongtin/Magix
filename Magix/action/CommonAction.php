<?php
session_start();
require_once("action/constants.php");


abstract class CommonAction
{
    protected static $VISIBILITY_PUBLIC = 0;
    protected static $VISIBILITY_MEMBER = 1;
    protected static $VISIBILITY_MODERATOR = 2;
    protected static $VISIBILITY_ADMIN = 3;

    private $pageVisibility;

    public function __construct($pageVisibility)
    {
        $this->pageVisibility = $pageVisibility;
    }

    public function execute()
    {
        if (!empty($_GET["logout"])) {
            session_unset();
            session_destroy();
            session_start();
        }

        if (empty($_SESSION["visibility"])) {
            $_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
        }

        if ($this->pageVisibility > $_SESSION["visibility"]) {
            header("location:index.php");
            exit;
        }

        $data = $this->executeAction();

        // Variable nécessaire dans plusieurs vues (ex: header/footer)
        $data["username"] = $_SESSION["username"] ?? "invité";
        $data["isConnected"] = $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;

        return $data; // Retourne à la vue
    }
    
    /**
     * data = array('key1' => 'value1', 'key2' => 'value2');
     */
    public function callAPI($service, array $data)
    {
        $apiURL = "https://magix.apps-de-cours.com/api/" . $service;

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($apiURL, false, $context);

        if (strpos($result, "<br") !== false) {
            var_dump($result);
            exit;
        }

        return json_decode($result);
    }


    // Template method (design pattern)
    protected abstract function executeAction();
}
