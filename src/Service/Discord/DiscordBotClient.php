<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish\Service\Discord;

use GuzzleHttp\Client as httpClient;

class DiscordBotClient
{
    public function __construct(
        private int $channelId,
        private string $botToken,
        private httpClient $httpClient
    ) {
    }

    public function sendMessage(string $message): void
    {
        $this->httpClient->post(
            'https://discord.com/api/channels/' . $this->channelId . '/messages',
            [
                'headers' => [
                    'Authorization' => 'Bot ' . $this->botToken,
                ],
                'form_params' => ['content' => $message],
            ]
        );
    }
}
