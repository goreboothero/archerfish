<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish\Application\DependencyInjection;

use Iamyukihiro\Archerfish\Controller\Minecraft\PlayerLoginNotificationController;
use Iamyukihiro\Archerfish\Service\Discord\DiscordBotClient;
use GuzzleHttp\Client as httpClient;

class PlayerLoginNotificationContainer
{
    public function boot(): void
    {
        if (in_array('minecraft-server-message', $_REQUEST)) {
            throw new \RuntimeException('minecraft-server-messageが含まれていません');
        }

        $discordBotClient = new DiscordBotClient(000000, 'dummy-token', new httpClient());
        (new PlayerLoginNotificationController($discordBotClient))->index($_REQUEST['minecraft-server-message']);
    }
}
