<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use Iamyukihiro\Archerfish\Application\DependencyInjection\PlayerLoginNotificationContainer;

switch ($_SERVER['REQUEST_URI']) {
    case '/send-minecraft-server-message':
        (new PlayerLoginNotificationContainer())->inject();
        break;
    default:
        echo '';
        break;
}
