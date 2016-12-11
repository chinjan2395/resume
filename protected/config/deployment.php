<?php
defined("APP_DEPLOYMENT") or define("APP_DEPLOYMENT", "dev.php");
defined("APP_ENVIRONMENT") or define("APP_ENVIRONMENT", "windows"); // linux || windows
defined("APP_SUBFOLDER_URL") or define("APP_SUBFOLDER_URL", "/webapp"); // eventualmente lasciare vuoto
defined("APP_SERVER_HOST") or define("APP_SERVER_HOST", $_SERVER['SERVER_NAME']);
defined("APP_FULL_BASE_URL") or define("APP_FULL_BASE_URL", "http://".APP_SERVER_HOST.APP_SUBFOLDER_URL);
