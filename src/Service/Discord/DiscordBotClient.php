<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish\Service\Discord;

use GuzzleHttp\Client as httpClient;

class DiscordBotClient
{
    public function __construct(
        private int $discordChannelId,
        private string $discordBotToken,
        private httpClient $httpClient
    ) {
    }

    public function sendMessage(string $message): void
    {
        $this->httpClient->post(
            'https://discord.com/api/channels/' . $this->discordChannelId . '/messages',
            [
                'headers' => [
                    'Authorization' => 'Bot ' . $this->discordBotToken,
                ],
                'form_params' => ['content' => $message],
            ]
        );
    }
}
