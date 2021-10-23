<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish\Tests\Service\Discord;

use GuzzleHttp\Client as httpClient;
use Iamyukihiro\Archerfish\Service\Discord\DiscordBotClient;
use PHPUnit\Framework\TestCase;

use function assert;

class DiscordBotClientTest extends TestCase
{
    public function test_sendMessage(): void
    {
        $httpClientP = $this->prophesize(httpClient::class);

        $channelId = 000000;
        $botToken = 'dummy';
        $message = 'Test';

        $uri = 'https://discord.com/api/channels/' . $channelId . '/messages';
        $options = [
            'headers' => [
                'Authorization' => 'Bot ' . $botToken,
            ],
            'form_params' => ['content' => $message],
        ];
        $httpClientP->post($uri, $options)->shouldBeCalled();

        $httpClient = $httpClientP->reveal();
        assert($httpClient instanceof httpClient);

        $SUT = $this->getSUT($channelId, $botToken, $httpClient);
        $SUT->sendMessage($message);
    }

    private function getSUT(int $channelId, string $botToken, httpClient $httpClient): DiscordBotClient
    {
        return new DiscordBotClient($channelId, $botToken, $httpClient);
    }
}
