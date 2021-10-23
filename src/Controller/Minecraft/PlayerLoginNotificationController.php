<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish\Controller\Minecraft;

use Iamyukihiro\Archerfish\Service\Discord\DiscordBotClient;

class PlayerLoginNotificationController
{
    private DiscordBotClient $discordBotClient;

    public function __construct(DiscordBotClient $discordBotClient)
    {
        $this->discordBotClient = $discordBotClient;
    }

    public function index(string $minecraftServerMessage)
    {
        $this->discordBotClient->sendMessage($minecraftServerMessage);
    }
}
